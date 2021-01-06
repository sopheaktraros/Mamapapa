<?php

namespace App\Http\Resources;

use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class StaffBargainDatatableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $edit = "";
        if(hasPermission('bargaining', 'write')){
            $edit = "<a href='" . route('staff-bargains.edit', $this->id) . "' 
                        class='btn btn-default btn-sm' style='border: 1px solid #227fc1;' 
                        data-title='Edit' data-toggle='tooltip' data-placement='top'>
                        <i class='far fa-edit text-primary'></i>
                    </a>&nbsp;";
        }
         
        $delete = "";
        if(hasPermission('bargaining', 'delete')){
            $delete = Form::open(['route' => ['staff-bargains.destroy', $this->id], 'method' => 'delete', 'class' => 'd-inline'])
                    . "<button type='submit' class='btn btn-default btn-sm action-delete delete' style='border: 1px solid #ef0b0b;' 
                            data-title='Delete' data-toggle='tooltip' data-placement='top'>
                            <i class='far text-danger fa-trash'></i>
                        </button>"
                    . Form::close();
        }

        $status = "<small class='text-white p-1 "
            . ( $this->active == 0 ? "bg-warning" : "")
            . ( $this->active == 1 ? "bg-success" : "") ."'>"
            . ( $this->active == 0 ?  "Inactive" : "") 
            . ( $this->active == 1 ? "Active" : "")
            . "</small>";
        
        return [
			'id' => $this->id,
            'date' =>  date('d-m-Y / h:i A', strtotime($this->created_at)),
            'po_number' => $this->po_number,
            'product' => $this->product_name,
            'price' =>  $this->price,
            'bargain_price' =>  $this->bargain_price,
            'amount' => $this->amount,
            'status' => $status,
            'audited_by' => $this->user->name,
	        'action' => $edit . $delete              
        ];
    }
}
