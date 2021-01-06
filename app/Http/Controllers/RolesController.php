<?php

namespace App\Http\Controllers;

use App\Role;
use App\UserGroup;
use App\UserPermission;
use App\UserPermissionRole;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('roles.index')->with([
            'roles' => Role::exceptRoot()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$userPermissions = UserPermission::parent()->with('children')->orderBy('name','asc')->get();

        return view('roles.create')->with([
	        'userPermissions' => $userPermissions,
	        'userGroups' => UserGroup::exceptRoot()->get()
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $role = Role::create($request->all());

	    $permissionReads = (array) $request->permission_read;
	    $permissionWrites = (array) $request->permission_write;
	    $permissionDeletes = (array) $request->permission_delete;

	    if ($request->permission_id) {
	        foreach ($request->permission_id as $permissionId) {
		        $canRead = in_array($permissionId, $permissionReads);
		        $canWrite = in_array($permissionId, $permissionWrites);
		        $canDelete = in_array($permissionId, $permissionDeletes);

		        UserPermissionRole::create([
			        'permission_id' => $permissionId,
			        'role_id' => $role->id,
			        'read' => $canRead,
			        'write' => $canWrite,
			        'delete' => $canDelete,
		        ]);
	        }
        }

        toast('success', 'Role has been created');

	    return redirect()->route('roles.edit', $role->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$role = Role::with('permission', 'permission.children')->findOrFail($id);
	    $userPermissions = UserPermission::parent()->with('children')->orderBy('name','asc')->get();

        return view('roles.edit')->with([
            'role' => $role,
            'userPermissions' => $userPermissions,
	        'userGroups' => UserGroup::exceptRoot()->get()
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
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $this->validate($request, [
            'name' => 'required'
        ]);

	    $role->update($request->all());

        UserPermissionRole::where('role_id' , $role->id)->delete();

	    $permissionReads = (array) $request->permission_read;
	    $permissionWrites = (array) $request->permission_write;
	    $permissionDeletes = (array) $request->permission_delete;

	    foreach ($request->permission_id as $i => $permissionId) {
		    $canRead = in_array($permissionId, $permissionReads);
		    $canWrite = in_array($permissionId, $permissionWrites);
		    $canDelete = in_array($permissionId, $permissionDeletes);

            UserPermissionRole::create([
                'permission_id' => $permissionId,
	            'role_id' => $role->id,
	            'read' => $canRead,
	            'write' => $canWrite,
	            'delete' => $canDelete,
            ]);
        }

        toast('success', 'Role has been updated');

        return redirect()->back();
    }

	public function trash()
    {
        return view('roles.trash')->with([
            'roles' => Role::Trash()->where('id', '!=', 1)->get()
        ]);
    }

	/**
	 * Remove a role
	 *
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function remove($id)
	{
		$role = Role::findOrFail($id);

		$role->update([ 'delete' => 1 ]);
		toast('success', 'Role has been removed');

		return redirect()->back();
	}

	public function restore($id)
    {
        if (!$id) {
            return redirect()->back()->with([
                'message' => 'ID Error',
                'message_type' => 'error'
            ]);
        }

        Role::findOrFail($id)->update([
            'deleted' => 0
        ]);

        return redirect()->back()->with([
            'message' => 'Role has been restored'
        ]);
    }

    public function emptyTrash()
    {
        Role::where('deleted', 1)->delete();

        return redirect()->back()->with([
            'message' => 'Trash has been emptied'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$id) {
            return redirect()->back()->with([
                'message' => 'ID Error',
                'message_type' => 'error'
            ]);
        }

        Role::findOrFail($id)->delete();

        return redirect()->back()->with([
            'message' => 'Role has been deleted'
        ]);
    }
}
