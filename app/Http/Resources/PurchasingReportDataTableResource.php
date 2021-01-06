<?php

namespace App\Http\Resources;

use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class PurchasingReportDataTableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {   
        $status = "<small class='text-white p-1 "
                    . ( $this->active == 0 ? "bg-warning" : "")
                    . ( $this->active == 1 ? "bg-secondary" : "") 
                    . ( $this->active == 2 ? "bg-primary" : "") 
                    . ( $this->active == 3 ? "bg-info" : "")
                    . ( $this->active == 4 ? "bg-success" : "") 
                    . ( $this->active == 5 ? "bg-danger" : "") 
                    . ( $this->active == 6 ? "bg-danger" : "") . "'>"
                    . ( $this->active == 0 ?  "Suspend" : "")
                    . ( $this->active == 1 ? "Pending" : "")
                    . ( $this->active == 2 ?  "Paid" : "")
                    . ( $this->active == 3 ?  "Success Payment" : "")
                    . ( $this->active == 4 ?  "Done" : "")
                    . ( $this->active == 5 ?  "Problem" : "")
                    . ( $this->active == 6 ?  "Return" : "")
                    . "</small>";
        
        $date = date('d-m-Y', strtotime($this->buying_date));
        if(request()->active == 0){
            $date = date('d-m-Y', strtotime($this->buying_date));
        }else if(request()->active == 1){
            $date = date('d-m-Y', strtotime($this->buying_date));
        }else if(request()->active == 2){
            $date = $this->paid_date ? date('d-m-Y', strtotime($this->paid_date)): '';
        }else if (request()->active == 3){
            $date = $this->success_payment_date ? date('d-m-Y', strtotime($this->success_payment_date)) : '';
        }else if(request()->active == 4){
            $date = $this->done_date ? date('d-m-Y', strtotime($this->done_date)) : '';
        }
        
        return [
            'id' => $this->id,
            'buying_date' => $date,
            'customer_name' => $this->customer->name,
            'product' => $this->product_name,
            'purchase_order_number' => $this->purchase_order_number,
            'china_po_number' => $this->china_po_number,
            'trucking_number' => $this->trucking_number,
            'sub_total' => $this->total,
            'cds' => $this->china_domistic_shipping,
            'sub_total' => $this->sub_total,
            'total_handing_fee' => $this->total_handing_fee,
            'amount_total' => $this->amount_total,  
            'status' => $status,
        ];
    }
}
