<?php

namespace App\Http\Resources;

use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class ReceivingProductByAirDataTableResource extends JsonResource
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
        if(hasPermission('company_receiving_by_air', 'read')){
            $show = "<a href='" . route('receiving-product-by-airs.show', $this->id) . "'
                        data-title='Show' data-toggle='tooltip' data-placement='top'
                        class='btn btn-default btn-sm' style='border: 1px solid #227fc1;'>
                        <i class='far fa-eye text-primary'></i>
                    </a>&nbsp;";
        }

        $boxNumber = "";
        if(hasPermission('company_receiving_by_air', 'write')){
            if($this->box_number == null){
                $boxNumber = "<input class='form-control form-control-sm verify-barcode' 
                                 type='text' size='6' name='box_number[]'>";
            }else{
                $boxNumber = $this->box_number;
            }
        }

        return [
            'id' => $this->id,
            'order_id' => $this->order_id,
            'buying_date' => date('d-m-Y/H:iA', strtotime($this->created_at)),
            'purchase_order_number' => $this->order->purchase_order_number,
            'china_po_number' => $this->order->china_po_number,
            'box_number' => $boxNumber,
            'barcode' => $this->order->barcode,
            'box_unit' => $this->box_unit,
            'weight' => $this->weight,
            'price_cbm' => $this->price_cbm ? $this->price_cbm : setting('weight_price'),
            'amount_total' => $this->amount_total,
            'verify_status' => "<small class='text-white p-1 " 
                        . ($this->verify_status == 0 ? "bg-warning" : "") 
                        . ($this->verify_status == 1 ? "bg-success" : "") 
                        . ($this->verify_status == 2 ? "bg-danger" : "") . "'>"
                        . ($this->verify_status == 0 ? "Not verify" : "")
                        . ($this->verify_status == 1 ? "Verified" : "")
                        . ($this->verify_status == 2 ? "Wrong Barcode" : "")
                        . "</small>",
            'verify_status_val' => $this->verify_status,
            'status' => $this->status,
	        'action' => $show        
        ];
    }
}
