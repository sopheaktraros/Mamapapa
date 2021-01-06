<?php

namespace App\Http\Resources;

use App\OrderDetail;
use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class PendingPaymentDatatableResource extends JsonResource
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
        if(hasPermission('pending_payment', 'read')){
            $show = "<a href='" . route('pending-payments.show', $this->id) . "'
                        class='btn btn-default btn-sm' style='border: 1px solid #227fc1;' 
                        data-title='Show' data-toggle='tooltip' data-placement='top'>
                        <i class='far fa-eye text-primary'></i>
                    </a>";
        }

        $deliveryBy = "<small class='text-white p-1 "
                . ( $this->delivery_by != null ? "bg-secondary" : "") . "'>"
                . ( $this->delivery_by == 1 ? "Air VIP / (2 - 3 day)" : "")
                . ( $this->delivery_by == 2 ?  "Air Simple / (3 - 6 day)" : "")
                . ( $this->delivery_by == 3 ?  "Land / (4 - 8 day)" : "")
                . ( $this->delivery_by == 4 ?  "Sea / (10 - 15 day)" : "")
                . "</small>";


        $status = "<small data-title='$this->remark' data-toggle='tooltip' data-placement='left' 
                class='text-white p-1 " . ($this->active == 2 ? "bg-primary" : "bg-success") . "'>"
                . ( $this->active == 2 ? "Pending Payment" : "Done")
                . "</small>";

        $date = date('d-m-Y / H:i A', strtotime($this->paid_date));
        $productItems = "";
        $orderDetails = OrderDetail::where('order_id', $this->id)->get();
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

        $chinaPoNumber = "";
        $truckingNumber = "";
        $webSiteName = "";
        if(hasPermission('pending_payment', 'write')){
            $chinaPoNumber .= '<input type="hidden" name="order_id_hidden[]" class="order-id-hidden" value="'. $this->id .'">' .
                            '<input type="text" name="china_po_number[]" class="form-control-sm china-po-number" value="'. $this->china_po_number .'" disabled="disabled">';
            $truckingNumber .= '<input type="text" name="trucking_number[]" class="form-control-sm trucking-number" value="'. $this->trucking_number .'" disabled="disabled">'; 
            $webSiteName .= '<input type="text" name="website_name[]" class="form-control-sm website-name" value="'. $this->website_name .'" disabled="disabled">'; 
        }
        
        return [
			'id' => $this->id,
            'pending_payment_date' => $date,
            'buying_date' => date('d-m-Y', strtotime($this->buying_date)),
            'transfer_date' => date('d-m-Y / H:i A', strtotime($this->created_at)),
            'purchase_order_number' => $this->purchase_order_number,
            'website_name' => $webSiteName,
            'china_po_number' => $chinaPoNumber,
            'trucking_number' => $truckingNumber,
            'customer_id' => $this->customer_id,
            'customer' => optional($this->customer)->name . '-' . str_replace(' ', '', rtrim($this->customer->phone, '_')),
            'website' => $this->website,
            'product_name' => $this->product_name,
            'product_item' => $productItems,
            'cds' =>  $this->china_domistic_shipping,
            'total_handing_fee' => '$ ' . $this->total_handing_fee,
            'sub_total' => '$ ' . $this->sub_total,
            'sub_total_china' => '¥ ' . $this->sub_total_china,
            'cds' => $this->china_domistic_shipping ? '$ ' . $this->china_domistic_shipping : '' ,
            'amount' =>  '$ ' . $this->amount_total,
            'status' => $status,
            'problem_status' => $this->active,
            'be_ordered_status' => $this->be_ordered_status,
            'delivery_by' => $deliveryBy,
            'auditor' => $this->audited_by,
            'bargain_status' => $this->bargain_status,
            'remark' => $this->remark,
	        'action' => $show           
        ];
    }
}
