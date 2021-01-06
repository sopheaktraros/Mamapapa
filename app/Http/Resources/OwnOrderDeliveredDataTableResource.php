<?php

namespace App\Http\Resources;

use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class OwnOrderDeliveredDataTableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $show = "";
        if(hasPermission('own_order_instock', 'read')){
            $show = "<a class='btn btn-default btn-sm' style='border: 1px solid #227fc1;'  
                        href='" . route('own-order-delivered.show', $this->id) . "'>
                        <i class='far fa-eye text-primary'></i>
                    </a>";
        }

        $shippingBy = "<small class='text-white p-1 "
            . ( $this->shipping_by != null ? "bg-secondary" : "") . "'>"
            . ( $this->shipping_by == 1 ? "Air VIP / (2 - 3 day)" : "")
            . ( $this->shipping_by == 2 ?  "Air Simple / (3 - 6 day)" : "")
            . ( $this->shipping_by == 3 ?  "Land / (4 - 8 day)" : "")
            . ( $this->shipping_by == 4 ?  "Sea / (10 - 15 day)" : "")
            . "</small>";
        
        $status = "<small class='text-white p-1 bg-primary'>"
            . ( $this->shippingFromChina->status == 0 ?  "Pending" : "") 
            . ( $this->shippingFromChina->status == 1 ? "Verified" : "")
            . ( $this->shippingFromChina->status == 2 ?  "Send to Cambodia" : "")
            . ( $this->shippingFromChina->status == 3 ?  "Arrived Cambodia" : "")
            . ( $this->shippingFromChina->status == 4 ?  "Can Open" : "")
            . ( $this->shippingFromChina->status == 5 ?  "Paid Oversea" : "")
            . ( $this->shippingFromChina->status == 6 ?  "Delivery" : "")
            . ( $this->shippingFromChina->status == 7 ?  "Completed" : "")
            . "</small>";
        
        return [
            'id' => $this->id,
            'shipping_from_china_id' => $this->shipping_from_china_id,
            'instock_date' => date('d-m-Y/H:iA', strtotime($this->in_stock_date)),
            'customer' => $this->shippingFromChina->customer->name . '-' . str_replace(' ', '', rtrim($this->shippingFromChina->customer->phone, '_')),
            'po_number' => $this->shippingFromChina->po_number,
            'product' => $this->shippingFromChina->product,
            'box_number' => $this->box_number,
            'barcode' => $this->shippingFromChina->barcode,
            'box_unit' => $this->box_unit,
            'width' => $this->width,
            'unleash' => $this->unleash,
            'height' => $this->height,
            'overall' => $this->shipping_by != 1 ? $this->overall : "",
            'weight' => $this->shipping_by == 1 ? $this->weight : "",
            'weight_price' => $this->shipping_by == 1 ? $this->price_cbm : "",
            'price_cbm' => $this->shipping_by != 1 ? $this->price_cbm : "",
            'amount_total' => sprintf('$%s', $this->amount_total),
            'shipping_by' => $shippingBy,
            'status' => $status,
            'delivery_status' => $this->delivery_status,
	        'action' => $show     
        ];
    }
}
