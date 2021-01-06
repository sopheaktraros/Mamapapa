<?php

namespace App\Http\Resources;

use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class OwnOrderReceivingDataTableResource extends JsonResource
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
        if(hasPermission('own_order_receiving', 'read')){
            $show = "<a href='" . route('own-order-receiving.show', $this->id) . "'
                        data-title='Show' data-toggle='tooltip' data-placement='top'
                        class='btn btn-default btn-sm' style='border: 1px solid #227fc1;'>
                        <i class='far fa-eye text-primary'></i>
                    </a>&nbsp;";
        }

        return [
            'id' => $this->id,
            'shipping_from_china_id' => $this->shipping_from_china_id,
            'date' => date('d-m-Y H:iA', strtotime($this->created_at)),
            'po_number' => $this->shippingFromChina->po_number,
            'box_number' => $this->box_number,
            'barcode' => $this->shippingFromChina->barcode,
            'box_unit' => $this->box_unit,
            'width' => $this->width,
            'unleash' => $this->unleash,
            'height' => $this->height,
            'overall' => $this->overall,
            'price_cbm' => $this->price_cbm ? $this->price_cbm : setting('price_cbm'),
            'amount_total' => $this->amount_total,
            'verify_status' => "<small class='text-white p-1 " 
                        . ($this->verify_status == 0 ? "bg-danger" : "") 
                        . ($this->verify_status == 1 ? "bg-success" : "") . "'>"
                        . ($this->verify_status == 0 ? "Not verify" : "")
                        . ($this->verify_status == 1 ? "Verified" : "")
                        . "</small>",
            'verify_status_val' => $this->verify_status,
            'status' => $this->status,
	        'action' => $show        
        ];
    }
}
