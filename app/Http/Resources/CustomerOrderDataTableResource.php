<?php

namespace App\Http\Resources;

use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerOrderDataTableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // $edit = "";
        // if(hasPermission('own_verify', 'write')){
        //     $edit = "<a href='" . route('customer-orders.edit', $this->id) . "' 
        //                 class='btn btn-default btn-sm' style='border: 1px solid #227fc1;' 
        //                 data-title='Edit' data-toggle='tooltip' data-placement='top'>
        //                 <i class='far fa-edit text-primary'></i>
        //             </a>&nbsp;";
        // }

        $show = "";
        if(hasPermission('own_order_verify', 'read')){
            $show = "<a href='" . route('customer-orders.show', $this->id) . "'
                        class='btn btn-default btn-sm' style='border: 1px solid #227fc1;' 
                        data-title='Show' data-toggle='tooltip' data-placement='top'>
                        <i class='far fa-eye text-primary'></i>
                    </a>&nbsp;";
        }
            
        $print = "";
        if(hasPermission('own_order_verify', 'write')){    
            if($this->barcode != null){
                $print = "<a href='" . url('customer-orders/print', $this->id) . "'
                            class='btn btn-default btn-sm' style='border: 1px solid #227fc1;'
                            data-title='Print Barcode' data-toggle='tooltip' data-placement='top'>
                            <i class='far fa-print text-primary'></i>
                        </a>&nbsp;";
            }
        }
        
        $status = "<small class='text-white p-1 bg-primary'>"
            . ( $this->status == 0 ?  "Pending" : "") 
            . ( $this->status == 1 ? "Verified" : "")
            . ( $this->status == 2 ?  "Send to Cambodia" : "")
            . ( $this->status == 3 ?  "Arrived Cambodia" : "")
            . ( $this->status == 4 ?  "Can Open" : "")
            . ( $this->status == 5 ?  "Paid Oversea" : "")
            . ( $this->status == 6 ?  "Delivery" : "")
            . ( $this->status == 7 ?  "Completed" : "")
            . "</small>";
        
        
        $shippingBy = "<small class='text-white p-1 "
                    . ( $this->shipping_by != null ? "bg-primary" : "") . "'>"
                    . ( $this->shipping_by == 1 ? "Air VIP / (2 - 3 day)" : "")
                    . ( $this->shipping_by == 2 ?  "Air Simple / (3 - 6 day)" : "")
                    . ( $this->shipping_by == 3 ?  "Land / (4 - 8 day)" : "")
                    . ( $this->shipping_by == 4 ?  "Sea / (10 - 15 day)" : "")
                    . "</small>";
        
        $verifyDate = "";
        if($this->verify_date != ""){
            $verifyDate = date('d-m-Y H:iA', strtotime($this->verify_date));
        }

        return [
            'id' => $this->id,
            'verify_tracking_number' => $this->verify_tracking_number,
            'tracking_number' => $this->tracking_number,
            'date' => date('d-m-Y H:iA', strtotime($this->date)),
            'verify_date' => $verifyDate,
            'po_number' => $this->po_number,
            'customer' => $this->customer->name . '-'. rtrim($this->customer->phone, '_'), 
            'verify_status' => $status,
            'verify_status_val' => $this->status,
            'receiving' => $this->receiving,
            'shipping_by' => $shippingBy,
	        'action' => $show . $print
        ];
    }
}
