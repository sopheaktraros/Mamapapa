<?php

namespace App\Http\Resources;

use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerDepositBalanceDataTableResource extends JsonResource {

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request) {

        $delete = "";
        if(hasPermission('customer_deposit_balance', 'delete')){
            $delete = Form::open(['route' => ['customer-deposit-balances.destroy', $this->id], 'method' => 'delete', 'class' => 'd-inline'])
                . "<button type='submit' class='btn btn-default btn-sm action-delete delete' 
                        data-title='Delete' data-toggle='tooltip' data-placement='top' 
                        style='border: 1px solid #ef0b0b;'>
                        <i class='far text-danger fa-trash'></i>
                </button>"
                . Form::close();
        }

        $edit = "";
        if(hasPermission('customer_deposit_balance', 'write')){
            $edit = "<a href='" . route('customer-deposit-balances.edit', $this->id) . "' 
                        class='btn btn-default btn-sm' style='border: 1px solid #227fc1;' 
                        data-title='Edit' data-toggle='tooltip' data-placement='top'>
                        <i class='far fa-edit text-primary'></i>
                    </a>&nbsp;";
        }

        $show = "";
        if(hasPermission('customer_deposit_balance', 'write')){
            $show = "<a href='" . url('customer-deposit-balances/' . $this->id . '/receipt') . "'
                        class='btn btn-default btn-sm' style='border: 1px solid #227fc1;'
                        data-title='Print Invoice' data-toggle='tooltip' data-placement='top'>
                        <i class='far fa-print text-primary'></i>
                    </a>&nbsp;";
        }

        return [
            'id' => $this->id,
            'date' => date('d-m-Y', strtotime($this->date)),
            't_code' => $this->transaction_code,
            'customer' => $this->customer->name,
            'customer_phone' => $this->customer->phone,
            'amount' => $this->amount,
            'remark' => $this->remark,
            'status' => "<small class='text-white p-1 " . ($this->active ? "bg-success" : "bg-warning") . "'>"
                    . ($this->active ? "Active" : "Inactive")
                    . "</small>",
            'action' =>  $edit .  $show . $delete
        ];
    }
}
