<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CustomerTransactionBalance;
use App\Http\Resources\CustomerDatatableResource;
use App\Trainer;
use App\Exports\CustomerReportExport;
use File;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CustomersController extends Controller
{
    public function index()
    {
        return view('customers.index');
    }

    public function dashboard()
    {
        $totalWithdraw = CustomerTransactionBalance::withdraw()->sum('amount');
        $totalDeposit = CustomerTransactionBalance::deposit()->sum('amount');
        $totalSpending = CustomerTransactionBalance::spending()->sum('amount');
        $totalBalance = Customer::activated()->notDelete()->sum('balance');


        return view('customers.dashboard')->with([
            'totalWithdraw' => $totalWithdraw,
            'totalDeposit' => $totalDeposit,
            'totalSpending' => $totalSpending,
            'totalBalance' => $totalBalance
        ]);
    }


    public function getTableData(Request $request)
    {
        $query = Customer::where(function ($q) {
            if (($active = request()->active) != null) {
                if ($active == 1) {
                    $q->where('active', 1);
                } else if ($active == 0) {
                    $q->where('active', 0);
                }
            }
            if (request()->name) {
                $q->where('name', 'LIKE', '%' . request()->name . '%')->get();
            }
            if (request()->cus_id) {
                $q->where('id', request()->cus_id)->get();
            }
            if (request()->phone) {
                $q->where('phone', '=', rtrim(request()->phone, '_'));
            }
            if (request()->date_from && request()->date_to) {
                $q->where('date_sign_up', '>=', date('Y-m-d', strtotime(request()->date_from)));
                $q->where('date_sign_up', '<=', date('Y-m-d', strtotime(request()->date_to)));
            } elseif (request()->date_from) {
                $q->where('date_sign_up', '=', date('Y-m-d', strtotime(request()->date_from)));
            } elseif (request()->date_to) {
                $q->where('date_sign_up', '=', date('Y-m-d', strtotime(request()->date_to)));
            }

        })->notDelete()->orderBy('id', 'desc');

        $count = $query->count();
        $perPage = \request()->length > 0 ? \request()->length : 100000;
        $data = $query->limit($perPage)->offset(\request()->start)->get();
        $customers = CustomerDatatableResource::collection($data);
        return DataTables::of($customers)
            ->setTotalRecords($count)
            ->setFilteredRecords($count)
            ->skipPaging()
            ->rawColumns(['action', 'status'])
            ->toJson();

        // $customers = CustomerDatatableResource::collection($customers);
        // return Datatables::of($customers)->rawColumns(['status', 'action'])->make();
    }

    public function create()
    {
        return view('customers.create')->with([
            'trainers' => Trainer::notDelete()->activated()->get()
        ]);
    }

    public function store(Request $request)
    {
        $validate = [
			'name' => 'required',
            'phone' => 'required',
		];

        $data = $request->except('password');
		if ($request->password) {
			$validate['password'] = 'required|min:6';
			$validate['confirm_password'] = 'required|same:password|min:6';

			$data = $request->all();
        }

        $this->validate($request, $validate);
        
        if ($request->password) {
			$data['password'] = bcrypt($request->password);
		}

        $data = $request->all();
        $data['active'] = $request->active ? $request->active : 0;
        $data['phone'] = rtrim($request->phone, '_');
        $data['date_sign_up'] = date('Y-m-d', strtotime($request->date_sign_up));
        $data['password'] = bcrypt($request->password);

        if ($request->profile_image) {
            $data['image_profile'] = uploadImage($request->profile_image);
        }

        $customer = Customer::create($data);

        toast('success', 'customer has been created.');
        return redirect()->back()->with('customer_id', $customer->id);
    }

    public function edit($id)
    {
        return view('customers.edit')->with([
            'customer' => Customer::findOrFail($id),
            'trainers' => Trainer::notDelete()->activated()->get()
        ]);
    }

    public function update(Request $request, $id)
    {
        $validate = [
			'name' => 'required',
            'phone' => 'required',
            'username' => 'required',
		];

        $data = $request->except('password');
		if ($request->password) {
			$validate['password'] = 'required|min:6';
			$validate['confirm_password'] = 'required|same:password|min:6';

			$data = $request->all();
        }

        $this->validate($request, $validate);
        
        if ($request->password) {
			$data['password'] = bcrypt($request->password);
		}

        $data = $request->all();
        $data['active'] = $request->active ? $request->active : 0;
        $data['phone'] = rtrim($request->phone, '_');
        $data['date_sign_up'] = date('Y-m-d', strtotime($request->date_sign_up));
        $data['password'] = bcrypt($request->password);
        $data['remember_token'] = str_random(40) . time();


        $customer = Customer::findOrFail($id);

        $image = $customer->image_profile;

        if ($request->profile_image) {
            $data['image_profile'] = uploadImage($request->profile_image);

            if(File::exists($image))
            {
                File::delete($image);
            }
        }

        $customer->update($data);

        toast('success', 'Customer has been updated.');

        return redirect()->back();
    }

    public function show($id)
    {
        $totalWithdraw = CustomerTransactionBalance::withdraw()->where('customer_id', $id)->sum('amount');
        $totalDeposit = CustomerTransactionBalance::deposit()->where('customer_id', $id)->sum('amount');
        $totalSpending = CustomerTransactionBalance::spending()->where('customer_id', $id)->sum('amount');
        $totalBalance = Customer::activated()->notDelete()->findOrfail($id)->balance;

        return view('customers.show')->with([
            'customer' => Customer::with('trainer')->findOrFail($id),
            'totalWithdraw' => $totalWithdraw,
            'totalDeposit' => $totalDeposit,
            'totalSpending' => $totalSpending,
            'totalBalance' => $totalBalance
        ]);
    }

    public function exportCustomerReport(Request $request)
    {
        $date_from = $request->post('date_from');
        $date_to = $request->post('date_to');
        $name = $request->post('name');
        $phone = $request->post('phone');
        $po_number = $request->post('po_number');
        $active = $request->post('active');
        return (new CustomerReportExport(
            $date_from, 
            $date_to, 
            $name, $phone, 
            $po_number, 
            $active
        ))->download("CustomerReportExport.xlsx");
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update(['delete' => 1]);

        toast('success', 'Customer has been deleted.');
        return redirect()->back();
    }
}
