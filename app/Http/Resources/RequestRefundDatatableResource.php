<?php

namespace App\Http\Resources;

use App\CustomerOrderList;
use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class RequestRefundDatatableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        
        $approve = "";
        if(hasPermission('request_refund', 'write')){
            if($this->status == null){
                $approve = "<form action='" . route('request-refund-approve', $this->id) . "' method='get' class='d-inline delete'>
                                <button type='submit'
                                class='btn btn-default btn-sm' style='border: 1px solid #227fc1;' 
                                data-title='Approve' data-toggle='tooltip' data-placement='top'>
                                <i class='fas fa-check-circle text-primary'></i>
                                </button>
                            </form>";
            }
        }

        $reject = "";
        if(hasPermission('request_refund', 'write')){
            if($this->status == null){
                $reject = "<form action='" . route('request-refund-reject', $this->id) . "' method='get' class='d-inline delete'>
                            <button type='submit'
                            class='btn btn-default btn-sm' style='border: 1px solid red;' 
                            data-title='Reject' data-toggle='tooltip' data-placement='top'>
                            <i class='fas fa-times-circle text-danger'></i>
                            </button>
                        </form>";
            }
        }

        $date = date('d-m-Y / H:i A', strtotime($this->approve_date));

        $shippingFee = CustomerOrderList::where('po_number', $this->po_number)->value('location_price');
        $linkProduct = CustomerOrderList::where('po_number', $this->po_number)->value('website');

        $dataShippingFee = $shippingFee + 0.25;

        $status = "";
        if($this->status == ""){
            $status = "";
        }else if($this->status == 1){
            $status = "Approved";
        }else if($this->status == 1){
            $status = "Rejected";
        }

        return [
			'id' => $this->id,
            'refund_date' => $date,
            'date' => date('d-m-Y / H:i A', strtotime($this->date)),
            'po_number' => $this->po_number,
            'customer_id' => $this->customer_id,
            'customer' => optional($this->customer)->name . '-' . str_replace(' ', '', rtrim($this->customer->phone, '_')),
            'website' => $linkProduct,
            'shipping_fee' => '$ ' . $dataShippingFee,
            'status' => $status,
            'request_reason' => $this->reason,
	        'action' => $approve . ' ' . $reject       
        ];
    }
}
