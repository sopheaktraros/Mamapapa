<?php

namespace App\Http\Resources;

use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentDataTableResource extends JsonResource {

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request) {

        $edit = "";
        if(hasPermission('payment', 'write')){
            $edit =	"<a class='btn btn-default btn-sm' style='border: 1px solid #227fc1;' 
                        data-title='Edit' data-toggle='tooltip' data-placement='top' 
                        href='" . route('payments.edit', $this->id) . "'>
                        <i class='far fa-edit text-primary'></i>
                    </a>&nbsp;";
        }

        $delete = "";
        if(hasPermission('payment', 'delete')){
            $delete = Form::open(['route' => ['payments.destroy', $this->id], 'method' => 'delete', 'class' => 'd-inline'])
                . "<button type='submit' class='btn btn-default btn-sm action-delete delete' style='border: 1px solid #ef0b0b;' 
                           data-title='Delete' data-toggle='tooltip' data-placement='top'>
						   <i class='far text-danger fa-trash'></i>
				   </button>"
                . Form::close();
        }

        return [
            'id' => $this->id,
            'date' => $this->date,
            'customer_name' => $this->customer->name,
            'customer_phone' => $this->customer->phone,
            'po_number' => $this->po_number,
            'bank' => $this->bank,
            'amount' => $this->amount,
            'status' => "<small class='text-white p-1 " . ($this->active ? "bg-success" : "bg-warning") . "'>"
                . ($this->active ? "Active" : "Inactive")
                . "</small>",
            'action' => $edit . $delete
        ];
    }
}
