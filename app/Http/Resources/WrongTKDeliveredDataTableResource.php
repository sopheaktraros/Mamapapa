<?php

namespace App\Http\Resources;

use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class WrongTKDeliveredDataTableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $edit = "";
        if(hasPermission('wrong_tk_stock', 'write')){
            if($this->printed == 0){
                $edit = "<a class='btn btn-default btn-sm' style='border: 1px solid #227fc1;' 
                            href='" . route('wrong-tk-delivered.edit', $this->id) . "'>
                            <i class='far fa-edit text-primary'></i>
                        </a>&nbsp;";
            }
        }

        $print = "";
        if(hasPermission('wrong_tk_stock', 'write')){    
            $print = "&nbsp;<a href='" . url('wrong-tk-delivered/' . $this->id . '/invoice') . "'
                        class='btn btn-default btn-sm' style='border: 1px solid #227fc1;'>
                        <i class='far fa-print text-primary'></i>
                    </a>";
        }

        $show = "";
        if(hasPermission('wrong_tk_stock', 'read')){
            $show = "<a class='btn btn-default btn-sm' style='border: 1px solid #227fc1;'  
                        href='" . route('wrong-tk-delivered.show', $this->id) . "'>
                        <i class='far fa-eye text-primary'></i>
                    </a>";
        }

        return [
            'id' => $this->id,
            'order_detail_id' => $this->orderDetails->id,
            'buying_date' => date('d-m-Y', strtotime($this->updated_at)),
            'customer_name' => $this->orderDetails->order->customer->name,
            'customer_phone' => rtrim($this->orderDetails->order->customer->phone, '_'),
            'purchase_order_number' => $this->orderDetails->order->purchase_order_number,
            'box_number' => $this->box_number,
            'barcode' => $this->orderDetails->barcode,
            'box_unit' => $this->box_unit,
            'width' => $this->width,
            'unleash' => $this->unleash,
            'height' => $this->height,
            'overall' => $this->overall,
            'price_cbm' => $this->price_cbm,
            'amount_total' => sprintf('$%s', $this->amount_total),
            'verify_status' => "<small class='text-white p-1 " 
                        . ($this->verify_status == 0 ? "bg-warning" : "") 
                        . ($this->verify_status == 1 ? "bg-success" : "") 
                        . ($this->verify_status == 2 ? "bg-danger" : "") . "'>"
                        . ($this->verify_status == 0 ? "Not yet verify" : "")
                        . ($this->verify_status == 1 ? "Verified" : "")
                        . ($this->verify_status == 2 ? "Wrong Trucking Number" : "")
	                    . "</small>",
            'status' => "<small class='text-white p-1 " . ($this->printed ? "bg-success" : "bg-warning") . "'>"
            . ($this->printed ? "Got It" : "Did Got It")
            . "</small>",
	        'action' => $edit . $show . $print      
        ];
    }
}
