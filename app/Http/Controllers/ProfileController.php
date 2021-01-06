<?php

namespace App\Http\Controllers;
use App\AuditorTransactionBalance;
use App\Http\Resources\AuditorDepositBalanceDataTableResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myId = Auth::user()->id;
        $profile = User::findOrFail($myId);
        return view('user-profile.index')->with([
            'profile' => $profile,
        ]);
    }

    public function getTableData() {
        $auditorDepositBalances = AuditorTransactionBalance::where(function($q){
            if (\request()->date_from && request()->date_to) {
                $q->where('date', '>=', date('Y-m-d', strtotime(request()->date_from)));
                $q->where('date', '<=', date('Y-m-d', strtotime(request()->date_to)));
            } elseif (\request()->date_from) {
                $q->where('date', '>=', date('Y-m-d', strtotime(request()->date_from)));
            } elseif (\request()->date_to) {
                $q->where('date', '<=', date('Y-m-d', strtotime(request()->date_to)));
            }

            if(\request()->amount){
                $q->where('amount', 'LIKE', '%' . request()->amount . '%');
            }
        })->notDelete()->orderBy('id','desc')->deposit()->auditor()->get();
        $auditorDepositBalances = AuditorDepositBalanceDataTableResource::collection($auditorDepositBalances);
        return DataTables::of($auditorDepositBalances)->rawColumns(['action', 'status'])->make();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('user-profile.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validate = [];

        $data = $request->except('password');
		if ($request->password) {
			$validate['password'] = 'required|min:6';
			$validate['confirm_password'] = 'required|same:password|min:6';
			$data = $request->all();
        }

        $this->validate($request, $validate);
        
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
            $data['remember_token'] = str_random(40) . time();
		}

        $user = User::findOrFail($id);
        $user->update($data);

        toast('success', 'Profile has been updated.');
        return redirect()->route('user-profile.index');
    }

    public function requestBalance($id, Request $request){
        $data = $request->all();
        $data['date'] = date('Y-m-d');
        $data['active'] = 1;
        $data['user_id'] = $request->user_id;
        $data['transaction_code'] = auditorTransactionCode();
        $data['amount'] = $request->amount;
        $data['action'] = 1;
        AuditorTransactionBalance::create($data);
        toast('success', 'Successfully!.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
