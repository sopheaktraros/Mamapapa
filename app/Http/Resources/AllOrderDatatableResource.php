<?php

namespace App\Http\Resources;

use App\OrderDetail;
use App\User;
use App\ReceivingProduct;
use App\CustomerOrderList;
use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class AllOrderDatatableResource extends JsonResource
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
        if(hasPermission('all_order', 'read')){
            $show = "<a href='" . route('all-orders.show', $this->id) . "'
                        class='btn btn-default btn-sm' style='border: 1px solid #227fc1;' 
                        data-title='Show' data-toggle='tooltip' data-placement='top'>
                        <i class='far fa-eye text-primary'></i>
                    </a>";
        }

        $refund = "";
        if(hasPermission('request_refund', 'write')){
            if($this->request_refund_status == "1" && $this->active != 7){
                $refund = "<a href='#'  data-toggle='modal' data-target='#request-refund-modal'
                                class='btn btn-default btn-sm btn-refund' style='border: 1px solid #227fc1;' 
                                data-title='Refund' data-toggle='tooltip' data-placement='top'>
                                <i class='fas fa-check-circle text-primary'></i>
                            </a>";
            }
        }

        $deliveryBy = "<small class='text-white p-1 "
                . ( $this->delivery_by != null ? "bg-secondary" : "") . "'>"
                . ( $this->delivery_by == 1 ? "Air VIP / (2 - 3 day)" : "")
                . ( $this->delivery_by == 2 ?  "Air Simple / (3 - 6 day)" : "")
                . ( $this->delivery_by == 3 ?  "Land / (4 - 8 day)" : "")
                . ( $this->delivery_by == 4 ?  "Sea / (10 - 15 day)" : "")
                . "</small>";

        $status = "<small data-title='$this->remark' data-toggle='tooltip' data-placement='left' 
                class='text-white p-1 bg-primary'>"
                . ( $this->active == 1 ? "Pending Audit" : "")
                . ( $this->active == 2 ? "Pending Payment" : "")
                . ( $this->active == 3 ? "Be Ordered" : "")
                . ( $this->active == 4 ? "Success Payment" : "")
                . ( $this->active == 5 ? "Close Order" : "")
                . ( $this->active == 6 ? "Canceled" : "")
                . ( $this->active == 7 ? "Refund Order" : "")
                . ( $this->active == 8 ? "Out of Stock" : "")
                . ( $this->active == 9 ? "Verified" : "")
                . ( $this->active == 10 ? "Send to Cambodai" : "")
                . ( $this->active == 11 ? "Arrived Cambodia" : "")
                . ( $this->active == 12 ? "Can Open" : "")
                . ( $this->active == 13 ? "Paid Oversea Fee" : "")
                . ( $this->active == 14 ? "Delivering" : "")
                . ( $this->active == 15 ? "Got it" : "")
                . "</small>";

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

        $overseaFee = ReceivingProduct::where('order_id', $this->id)->value('amount_total');
        $totalAmount = CustomerOrderList::where('po_number', $this->purchase_order_number)->value('total');

        return [
			'id' => $this->id,
            'done_date' => $this->done_date ? date('d-m-Y / H:i A', strtotime($this->done_date)) : "",
            'be_order_date' => $this->success_payment_date ? date('d-m-Y / H:i A', strtotime($this->success_payment_date)) : "",
            'pending_payment_date' => $this->paid_date ? date('d-m-Y / H:i A', strtotime($this->paid_date)) : "",
            'buying_date' => $this->buying_date ? date('d-m-Y', strtotime($this->buying_date)) : "",
            'transfer_date' => $this->created_at ? date('d-m-Y / H:i A', strtotime($this->created_at)) : "",
            'purchase_order_number' => $this->purchase_order_number,
            'website_name' => $this->website_name,
            'china_po_number' => $this->china_po_number,
            'trucking_number' => $this->trucking_number,
            'customer_id' => $this->customer_id,
            'customer' => optional($this->customer)->name . '-' . str_replace(' ', '', rtrim($this->customer->phone, '_')),
            'website' => $this->website,
            'product_name' => $this->product_name,
            'product_item' => $productItems,
            'sub_total_china' => '¥ ' . $this->sub_total_china,
            'total_handing_fee' => '$ '. $this->total_handing_fee,
            'sub_total' => '$ '. $this->sub_total,
            'cds' => $this->china_domistic_shipping ? '$ '. $this->china_domistic_shipping : "",
            'amount' =>  '$ '. $this->amount_total,
            'status' => $status,
            'problem_status' => $this->active,
            'delivery_by' => $deliveryBy,
            'oversea_fee' => $overseaFee ? '$'. $overseaFee : "",
            'auditor' => $this->audited_by,
            'pending_payment_status' => $this->pending_payment_status,
            'request_refund_status' => $this->request_refund_status && $this->active != 7 ? "<small class='text-white bg-danger blink p-1'>Request Refund<small>" : "",
            'request_refund' => $this->request_refund_status,
            'remark' => $this->remark,
            'total_amount' => '$ ' . $totalAmount,
            'total_amount_val' => $totalAmount,
	        'action' =>  $refund . ' ' . $show           
        ];
    }
}
