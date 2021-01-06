<?php

namespace App\Http\Resources;

use App\OrderDetail;
use App\Order;
use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class EndingBalanceDatatableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {   
        $status = "<small class='text-white p-1 "
            . ( $this->active == 0 ? "bg-warning" : "")
            . ( $this->active == 1 ? "bg-success" : "") ."'>"
            . ( $this->active == 0 ?  "Inactive" : "") 
            . ( $this->active == 1 ? "Active" : "")
            . "</small>";

        $orders = Order::where('purchase_order_number', $this->po_number)->get();
        $amountCashIn = 0;
        foreach($orders as $order){
            $amountCashIn = $order->amount_total;
        }

        $total = 0;
        $total = $amountCashIn - $this->amount_usd; 
        
        return [
			'id' => $this->id,
            'date' =>  date('d-m-Y / h:i A', strtotime($this->paid_date)),
            'po_number' => $this->po_number,
            'product' => $this->product_name,
            'amount_cashin' => '$ ' . $amountCashIn,
            'amount_cashout' => '$ ' . $this->amount_usd,
            'total' => '$ ' . $total,
            'status' => $status,
            'audited_by' => $this->user->name,      
        ];
    }
}
