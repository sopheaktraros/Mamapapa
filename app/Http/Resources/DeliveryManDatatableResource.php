<?php

namespace App\Http\Resources;

use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class DeliveryManDatatableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $edit = '';
        if(hasPermission('delivery_man', 'write')){
            $edit = "<a href='" . route('deliveryman.edit', $this->id) . "' 
                        class='btn btn-default btn-sm' style='border: 1px solid #227fc1;'
                        data-title='Edit' data-toggle='tooltip' data-placement='top'>
                        <i class='far fa-edit text-primary'></i>
                    </a>&nbsp;";
        }

        $delete = '';
        if(hasPermission('delivery_man', 'delete')){
            $delete = Form::open(['route' => ['deliveryman.destroy', $this->id], 'method' => 'delete', 'class' => 'd-inline'])
                    . "<button type='submit' class='btn btn-default btn-sm action-delete delete' style='border: 1px solid #ef0b0b;'
                               data-title='Delete' data-toggle='tooltip' data-placement='top'>
                               <i class='far text-danger fa-trash'></i>
                       </button>"
                    . Form::close();
        }

        return [
			'id' => $this->id,
            'code' => $this->code,
			'name' => $this->name,
			'phone' => rtrim($this->phone, '_'),
			'address' => $this->address,
	        'status' => "<small class='text-white p-1 " . ($this->active ? "bg-success" : "bg-warning") . "'>"
	                    . ($this->active ? "Active" : "Inactive")
	                    . "</small>",
	        'action' => $edit . $delete
        ];
    }
}
