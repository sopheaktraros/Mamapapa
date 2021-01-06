<?php

namespace App\Http\Resources;

use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class OwnOrderDatatableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {    
        // $delete = "";
        // if(hasPermission('own_order_product', 'delete')){
        //     $delete = Form::open(['route' => ['own-orders.destroy', $this->id], 'method' => 'delete', 'class' => 'd-inline'])
        //             . "<button type='submit' class='btn btn-default btn-sm action-delete delete' style='border: 1px solid #ef0b0b;' 
        //                     data-title='Delete' data-toggle='tooltip' data-placement='top'>
        //                     <i class='far text-danger fa-trash'></i>
        //                 </button>"
        //             . Form::close();
        // }

        $show = "";
        if(hasPermission('own_order_product', 'read')){
            $show = "<a href='" . route('own-orders.show', $this->id) . "'
                        class='btn btn-default btn-sm' style='border: 1px solid #227fc1;' 
                        data-title='Show' data-toggle='tooltip' data-placement='top'>
                        <i class='far fa-eye text-primary'></i>
                    </a>&nbsp;";
        }

        $shippingBy = "<small class='text-white p-1 "
                . ( $this->shipping_by != null ? "bg-primary" : "") . "'>"
                . ( $this->shipping_by == 1 ? "Air VIP / (2 - 3 day)" : "")
                . ( $this->shipping_by == 2 ?  "Air Simple / (3 - 6 day)" : "")
                . ( $this->shipping_by == 3 ?  "Land / (4 - 8 day)" : "")
                . ( $this->shipping_by == 4 ?  "Sea / (10 - 15 day)" : "")
                . "</small>";

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
        
        $date = date('d-m-Y / H:iA', strtotime($this->date));
      
        return [
			'id' => $this->id,
            'date' => $date,
            'po_number' => $this->po_number,
            'tracking_number' => $this->tracking_number,
            'customer' => $this->customer->name . '-' . rtrim($this->customer->phone, '_'),
            'product' => $this->product,
            'price' => '¥'. $this->price,
            'qty' => $this->qty,
            'amount' => $this->amount_total,
            'shipping_by' => $shippingBy,
            'status' => $status,
	        'action' => $show              
        ];
    }
}
