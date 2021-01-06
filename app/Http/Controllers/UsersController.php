<?php

namespace App\Http\Controllers;

use App\AuditTrails\UsersAuditTrail;
use App\Http\Resources\UserDatatableResource;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class UsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('users.index');
	}

	public function getTableData(Request $request) {
		$query = User::with('role')->exceptRoot()->notDelete();

		$count = $query->count();
        $perPage = \request()->length > 0 ? \request()->length : 100000;
        $data = $query->limit($perPage)->offset(\request()->start)->get();
        $users = UserDatatableResource::collection($data);
        return DataTables::of($users)
            ->setTotalRecords($count)
            ->setFilteredRecords($count)
            ->skipPaging()
            ->rawColumns(['status', 'action'])
            ->toJson();

		// $users = UserDatatableResource::collection($users);
		// return DataTables::of($users)->rawColumns(['status', 'action'])->make();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('users.create')->with([
			'roles' => Role::exceptRoot()->orderBy('id')->get(),
			'user' => []
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 * @throws \Illuminate\Validation\ValidationException
	 */
	public function store(Request $request) {
		$this->validate($request, [
			'name' => 'required',
			'username' => 'required',
			'password' => 'required|min:6',
			'confirm_password' => 'required|same:password|min:6',
			'role_id' => 'required'
		]);

		$data = $request->all();

		$branchId = Auth::user()->branch_id;
		if (atLeastGroup('System Administrator') && $request->branch_id) {
			$branchId = $request->branch_id;
		}

		$data['branch_id'] = $branchId;
		$data['password'] = bcrypt($request->password);
        $data['active'] = $request->active ? $request->active : 0;

		User::create($data);

		toast('success', 'User has been created');

		return redirect()->back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$user = User::findOrFail($id);

		return view('users.edit')->with([
			'roles' => Role::exceptRoot()->active()->get(),
			'user' => $user
		]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 * @throws \Illuminate\Validation\ValidationException
	 */
	public function update(Request $request, $id) {
		$user = User::findOrFail($id);

		$validate = [
			'name' => 'required',
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

        $data['active'] = $request->active ? $request->active : 0;

		$user->update($data);

		toast('success', 'User has been updated');

		return redirect()->back();
	}

	/**
	 * Remove a user or move a user to trash
	 *
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id) {
		$user = User::findOrFail($id);

		$user->update([ 'delete' => 1 ]);
		toast('success', 'User has been deleted');

		return redirect()->back();
	}


	/**
	 * View removed users
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function trash() {
		return view('users.trash')->with([
			'users' => User::with('role')->Trash()->where('id', '!=', 1)->get()
		]);
	}

	/**
	 * Restore users from trash
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function restore($id) {
		if ( ! $id) {
			return redirect()->back()->with([
				'message' => 'ID Error',
				'message_type' => 'error'
			]);
		}

		User::findOrFail($id)->update([
			'deleted' => 0
		]);

		return redirect()->back()->with([
			'message' => 'User has been restored'
		]);
	}

	/**
	 * Clear all trash
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function emptyTrash() {
		User::where('deleted', 1)->delete();

		return redirect()->back()->with([
			'message' => 'Trash has been emptied'
		]);
	}

}
