<?php

namespace App\Http\Resources;

use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductReportDataTableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {   
        return [
            'id' => $this->id,
            'buying_date' => date('d-m-Y', strtotime($this->updated_at)),
            'customer_name' => $this->order->customer->name,
            'purchase_order_number' => $this->order->purchase_order_number,
            'china_po_number' => $this->order->china_po_number,
            'trucking_number' => $this->order->trucking_number,
            'product' => $this->order->product_name,
            'box_number' => $this->box_number,  
            'box_unit' => $this->box_unit,  
            'width' => $this->width,
            'unleash' => $this->unleash,
            'height' => $this->height,
            'overall' => $this->overall, 
            'price_cbm' => $this->price_cbm, 
            'amount' => $this->amount_total,
            'status' => "<small class='text-white p-1 " . ($this->printed ? "bg-success" : "bg-warning") . "'>"
                            . ($this->printed ? "Got It" : "Did Got It") . 
                        "</small>",         
        ];
    }
}
