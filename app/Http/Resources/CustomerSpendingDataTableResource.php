<?php

namespace App\Http\Resources;

use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerSpendingDatatableResource extends JsonResource {

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request) {

        $spending = "";
        if($this->spend_for == 1) {
            $spending = "Product";
        }else if($this->spend_for == 2){
            $spending = "Over Sea Fee";
        }else if($this->spend_for == 3){
            $spending = "Delivery";
        }else if($this->spend_for == 3){
            $spending = "Other";
        }

        return [
            'id' => $this->id,
            'date' => date('d-m-Y / H:i A', strtotime($this->created_at)),
            't_code' => $this->transaction_code,
            'customer' => $this->customer->name,
            'customer_phone' => $this->customer->phone,
            'amount' => $this->amount,
            'remark' => $this->remark,
            'spend_for' => $spending,
        ];
    }
}
