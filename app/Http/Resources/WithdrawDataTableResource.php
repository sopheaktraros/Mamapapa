<?php

namespace App\Http\Resources;

use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class WithdrawDataTableResource extends JsonResource {

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request) {

        $approve = "";
        if($this->status == ""){
            if(hasPermission('withdraw', 'edit')){
                $approve = Form::open(['route' => ['withdraws-approve', $this->id], 'method' => 'post', 'class' => 'd-inline'])
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
            if(hasPermission('withdraw', 'edit')){
                $reject = "<a class='btn btn-default btn-sm reject' style='border: 1px solid red;'
                                href='#reject-modal' data-toggle='modal' data-backdrop='static' data-keyboard='false'
                                data-id='".$this->id."'>
                                <i class='fas fa-undo-alt text-danger'></i>
                            </a>&nbsp;";
            }
        }

        $status = "";
        if($this->status != ""){
            $status = "<small class='text-white p-1 " 
                        . ($this->status == 1 ? "bg-danger" : "bg-success ") . "'>"
                        . ($this->status == 1 ? "Rejected" : "Approved")
                        . "</small>";
        }

        return [
            'id' => $this->id,
            'date' => date('d-m-Y', strtotime($this->date)),
            'customer' => $this->customer->name,
            't_code' => $this->transaction_code,
            'customer_phone' => $this->customer->phone,
            'amount' => $this->amount,
            'remark' => $this->remark,
            'status' => "<small class='text-white p-1 " . ($this->active ? "bg-success" : "bg-warning") . "'>"
                    . ($this->active ? "Active" : "Inactive")
                    . "</small>",
            'approve_status' =>  $status,
            'action' => $reject .' '. $approve
        ];
    }
}
