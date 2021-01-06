<?php

namespace App\Http\Resources;
use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class AuditorDatatableResource extends JsonResource {
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return array
	 */
	public function toArray($request) {
		// $edit = '';
		// if(hasPermission('user', 'write')) {
		// 	$edit = "<a href='" . route('users.edit', $this->id) . "'
		// 				style='border: 1px solid #227fc1;' class='btn btn-default btn-sm' 
		// 				data-title='Edit' data-toggle='tooltip' data-placement='top'>
		// 				<i class='far fa-edit text-primary'></i>
		// 			</a>&nbsp;";
		// }

		// $delete = '';
		// if(hasPermission('user', 'delete')) {
		// 	$delete = Form::open(['route' => ['users.destroy', $this->id], 'method' => 'delete', 'class' => 'd-inline'])
		// 			  . "<button type='submit' class='btn btn-default btn-sm action-delete delete' style='border: 1px solid #ef0b0b;'
		// 			             data-title='Delete' data-toggle='tooltip' data-placement='top'>
        //                         <i class='far text-danger fa-trash'></i>
        //                     </button>"
		// 	          . Form::close();
		// }

		return [
			'id' => $this->id,
			'username' => $this->username,
			'name' => $this->name,
			'email' => $this->email,
			'role' => optional($this->role)->name,
			'status' => "<small class='text-white p-1 " . ($this->active ? "bg-success" : "bg-warning") . "'>"
			            . ($this->active ? "Active" : "Inactive")
			            . "</small>",
			'action' => ''
		];
	}
}
