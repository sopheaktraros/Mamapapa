<?php

namespace App\Http\Resources;

use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class AuditorWithdrawDataTableResource extends JsonResource {

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request) {

        // $approve = "";
        // if($this->status == ""){
        //     if(hasPermission('auditor_withdraw', 'edit')){
        //         $approve = Form::open(['route' => ['withdraws-approve', $this->id], 'method' => 'post', 'class' => 'd-inline'])
        //             . "<button type='submit' class='btn btn-default btn-sm action-delete delete' 
        //                     data-title='Approve' data-toggle='tooltip' data-placement='top' 
        //                     style='border: 1px solid #227fc1;'>
        //                     <i class='fas fa-pen text-primary'></i>
        //             </button>"
        //             . Form::close();
        //     }
        // }

        // $reject = "";
        // if($this->status == ""){
        //     if(hasPermission('auditor_withdraw', 'edit')){
        //         $reject = "<a class='btn btn-default btn-sm reject' style='border: 1px solid red;'
        //                         href='#reject-modal' data-toggle='modal' data-backdrop='static' data-keyboard='false'
        //                         data-id='".$this->id."'>
        //                         <i class='fas fa-undo-alt text-danger'></i>
        //                     </a>&nbsp;";
        //     }
        // }

        $delete = "";
        if(hasPermission('auditor_withdraw', 'delete')){
            $delete = Form::open(['route' => ['auditor-withdraws.destroy', $this->id], 'method' => 'delete', 'class' => 'd-inline'])
                . "<button type='submit' class='btn btn-default btn-sm action-delete delete' 
                        data-title='Delete' data-toggle='tooltip' data-placement='top' 
                        style='border: 1px solid #ef0b0b;'>
                        <i class='far text-danger fa-trash'></i>
                </button>"
                . Form::close();
        }

        return [
            'id' => $this->id,
            'date' => date('d-m-Y/H:i A', strtotime($this->created_at)),
            'user' => $this->user->name,
            't_code' => $this->transaction_code,
            'amount' => '$ '. $this->amount,
            'remark' => $this->remark,
            'status' => "<small class='text-white p-1 " . ($this->status == "2" ? "bg-success" : "bg-warning") . "'>"
                    . ($this->status == "2" ? "Approved" : "Rejected")
                    . "</small>",
            'action' =>  $delete
        ];
    }
}
