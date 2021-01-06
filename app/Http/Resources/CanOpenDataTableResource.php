<?php

namespace App\Http\Resources;

use App\OrderDetail;
use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class CanOpenDataTableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $print = "";
        if(hasPermission('can_open', 'write')){    
            $print = "&nbsp;<a href='" . url('can-opens/' . $this->id . '/invoice') . "'
                        class='btn btn-default btn-sm' style='border: 1px solid #227fc1;'>
                        <i class='far fa-print text-primary'></i>
                    </a>";
        }

        $show = "";
        if(hasPermission('can_open', 'read')){
            $show = "<a class='btn btn-default btn-sm' style='border: 1px solid #227fc1;'  
                        href='" . route('can-opens.show', $this->id) . "'>
                        <i class='far fa-eye text-primary'></i>
                    </a>";
        }

        $deliveryBy = "<small class='text-white p-1 "
                    . ( $this->order->delivery_by != null ? "bg-secondary" : "") . "'>"
                    . ( $this->order->delivery_by == 1 ? "Air VIP / (2 - 3 day)" : "")
                    . ( $this->order->delivery_by == 2 ?  "Air Simple / (3 - 6 day)" : "")
                    . ( $this->order->delivery_by == 3 ?  "Land / (4 - 8 day)" : "")
                    . ( $this->order->delivery_by == 4 ?  "Sea / (10 - 15 day)" : "")
                    . "</small>";
        
        $productItems = "";
        $orderDetails = OrderDetail::where('order_id', $this->order_id)->get();
        foreach($orderDetails as $i => $orderDetail){
            if($i > 0){
                $productItems .= '</br><hr style="margin-top: 5px; margin-bottom: 5px;">';
            }
            $propSkuNames = explode(';' ,$orderDetail->prop_sku_name);
            $productItems .= '+ Price: $' . $orderDetail->price . ' ' . 'Qty: ' . $orderDetail->qty . ' ';
                    if($orderDetail->prop_sku_name){
                        foreach($propSkuNames as $propSkuName){
                            $propSku = explode(':',$propSkuName);
                            $propSkuAttr = "";
                            if(preg_match('/(\.jpg|\.png|\.bmp)$/i' ,$propSku[1])){
                                $propSkuAttr = '<img src="'.url($propSku[1]).'" style="width:20px; height:20px"
                                                data-title="' . $orderDetail->prop_sku_value . '" data-toggle="tooltip" data-placement="top">';
                            }else{
                                $propSkuAttr = $propSku[1];
                            }

                            $productItems .= '&nbsp;&nbsp;&nbsp;<b>' .  $propSku[0] . ' :</b> ' . $propSkuAttr . '&nbsp;';
                        }
                    }
        }

        return [
            'id' => $this->id,
            'order_id' => $this->order_id,
            'buying_date' => date('d-m-Y / H:i A', strtotime($this->can_open_date)),
            'customer' => $this->order->customer->name . '-' . str_replace(' ', '', rtrim($this->order->customer->phone, '_')),
            'purchase_order_number' => $this->order->purchase_order_number,
            'china_po_number' => $this->order->china_po_number,
            'website_name' => $this->order->website_name,
            'product_name' => $this->order->product_name,
            'product_item' => $productItems,
            'box_number' => $this->box_number,
            'barcode' => $this->order->barcode,
            'box_unit' => $this->box_unit,
            'width' => $this->width,
            'unleash' => $this->unleash,
            'height' => $this->height,
            'overall' => $this->order->delivery_by != 1 ? $this->overall : "",
            'weight' => $this->order->delivery_by == 1 ? $this->weight : "",
            'weight_price' => $this->order->delivery_by == 1 ? $this->price_cbm : "",
            'price_cbm' => $this->order->delivery_by != 1 ? $this->price_cbm : "",
            'amount_total' => sprintf('$%s', $this->amount_total),
            'product_status' => "<small class='text-white p-1 " 
                        . ($this->receiving_status == 1 ? "bg-info" : "") 
                        . ($this->receiving_status == 2 ? "bg-danger" : "") 
                        . ($this->receiving_status == 3 ? "bg-success" : "") . "'>"
                        . ($this->receiving_status == 1 ? "Order" : "")
                        . ($this->receiving_status == 2 ? "Wrong TK" : "")
                        . ($this->receiving_status == 3 ? "Own Order " : "")
                        . "</small>",
            'delivery_by' => $deliveryBy,
            'verify_status' => "<small class='text-white p-1 " 
                        . ($this->verify_status == 0 ? "bg-warning" : "") 
                        . ($this->verify_status == 1 ? "bg-success" : "") . "'>"
                        . ($this->verify_status == 0 ? "Not yet verify" : "")
                        . ($this->verify_status == 1 ? "Verified" : "")
	                    . "</small>",
            'status' => "<small class='text-white p-1 " 
                        . ($this->delivery_status == 0 ? "bg-danger" : "") 
                        . ($this->delivery_status == 1 ? "bg-primary" : "") 
                        . ($this->delivery_status == 2 ? "bg-info" : "") 
                        . ($this->delivery_status == 3 ? "bg-success" : "") . "'>"
                        . ($this->delivery_status == 0 ? "Can Open" : "")
                        . ($this->delivery_status == 1 ? "Paid" : "")
                        . ($this->delivery_status == 2 ? "Delivery" : "")
                        . ($this->delivery_status == 3 ? "Got it" : "")
                        . "</small>",
            'got_status' => $this->delivery_status,
	        'action' => $show . $print      
        ];
    }
}
