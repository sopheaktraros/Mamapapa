<?php

namespace App\Http\Resources;

use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class CouponDataTableResource extends JsonResource {

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request) {

        $edit = "";
        if(hasPermission('coupon', 'write')){
            $edit =	"<a class='btn btn-default btn-sm' style='border: 1px solid #227fc1;' 
                        data-title='Edit' data-toggle='tooltip' data-placement='top'  
                        href='" . route('coupons.edit', $this->id) . "'>
                        <i class='far fa-edit text-primary'></i>
                    </a>&nbsp;";
        }

        $delete = "";
        if(hasPermission('coupon', 'delete')){
            $delete = Form::open(['route' => ['coupons.destroy', $this->id], 'method' => 'delete', 'class' => 'd-inline'])
                . "<button type='submit' class='btn btn-default btn-sm action-delete delete' 
                        data-title='Delete' data-toggle='tooltip' data-placement='top' 
                        style='border: 1px solid #ef0b0b;'>
                        <i class='far text-danger fa-trash'></i>
                </button>"
                . Form::close();
        }

        return [
            'id' => $this->id,
            'code' => $this->code,
            'amount' => '$'. number_format($this->amount, 2),
            'expiry_date' => date('d-m-Y', strtotime($this->expiry_date)),
            'remark' => $this->remark,
            'status' => "<small class='text-white p-1 " . ($this->active ? "bg-success" : "bg-warning") . "'>"
                . ($this->active ? "Active" : "Inactive")
                . "</small>",
            'action' => $edit . $delete
        ];
    }
}
