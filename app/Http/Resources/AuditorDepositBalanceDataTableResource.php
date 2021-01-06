<?php

namespace App\Http\Resources;

use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class AuditorDepositBalanceDataTableResource extends JsonResource {

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request) {

        $delete = "";
        if($this->status != ""){
            if(hasPermission('auditor_deposit_balance', 'delete')){
                $delete = Form::open(['route' => ['auditor-deposit-balances.destroy', $this->id], 'method' => 'delete', 'class' => 'd-inline'])
                    . "<button type='submit' class='btn btn-default btn-sm action-delete delete' 
                            data-title='Delete' data-toggle='tooltip' data-placement='top' 
                            style='border: 1px solid #ef0b0b;'>
                            <i class='far text-danger fa-trash'></i>
                    </button>"
                    . Form::close();
            }
        }

        $edit = "";
        if($this->status != ""){
            if(hasPermission('auditor_deposit_balance', 'write')){
                $edit = "<a href='" . route('auditor-deposit-balances.edit', $this->id) . "' 
                            class='btn btn-default btn-sm' style='border: 1px solid #227fc1;' 
                            data-title='Edit' data-toggle='tooltip' data-placement='top'>
                            <i class='far fa-edit text-primary'></i>
                        </a>&nbsp;";
            }
        }

        $approve = "";
        if($this->status == ""){
            if(hasPermission('auditor_deposit_balance', 'edit')){
                $approve = Form::open(['route' => ['deposit-balance-approve', $this->id], 'method' => 'post', 'class' => 'd-inline'])
                    . "<button type='submit' class='btn btn-default btn-sm action-delete delete' 
                            data-title='Approve' data-toggle='tooltip' data-placement='top' 
                            style='border: 1px solid #227fc1;'>
                            <i class='fas fa-pen text-primary'></i>
                    </button>"
                    . Form::close();
            }
        }

        $reject = "";
        if($this->status == ""){
            if(hasPermission('auditor_deposit_balance', 'edit')){
                $reject = "<a class='btn btn-default btn-sm auditor-reject' style='border: 1px solid red;'
                                href='#reject-modal' data-toggle='modal' data-backdrop='static' data-keyboard='false'
                                data-id='".$this->id."'>
                                <i class='fas fa-undo-alt text-danger'></i>
                            </a>&nbsp;";
            }
        }

        // $show = "";
        // if(hasPermission('auditor_deposit_balance', 'write')){
        //     $show = "<a href='" . url('customer-deposit-balances/' . $this->id . '/receipt') . "'
        //                 class='btn btn-default btn-sm' style='border: 1px solid #227fc1;'
        //                 data-title='Print Invoice' data-toggle='tooltip' data-placement='top'>
        //                 <i class='far fa-print text-primary'></i>
        //             </a>&nbsp;";
        // }

        return [
            'id' => $this->id,
            'date' => date('d-m-Y/H:i A', strtotime($this->created_at)),
            't_code' => $this->transaction_code,
            'user' => $this->user->name,
            'amount' => '$ ' . $this->amount,
            'remark' => $this->remark,
            'status' => "<small class='text-white p-1 "
                    . ($this->status == "1" ? "bg-warning" : "") 
                    . ($this->status == "2" ? "bg-success" : "") . "'>"
                    . ($this->status == "1" ? "Rejected" : "")
                    . ($this->status == "2" ? "Approved" : "")
                    . "</small>",
            'action' => $reject . $approve . $edit . $delete
        ];
    }
}
