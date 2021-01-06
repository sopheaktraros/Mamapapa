<?php

namespace App\Http\Resources;

use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerOrderReportDataTableResource extends JsonResource
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
                    . ( $this->order->active == 0 ? "bg-warning" : "")
                    . ( $this->order->active == 1 ? "bg-secondary" : "") 
                    . ( $this->order->active == 2 ? "bg-primary" : "") 
                    . ( $this->order->active == 3 ? "bg-info" : "")
                    . ( $this->order->active == 4 ? "bg-success" : "") . "'>"
                
                    . ( $this->order->active == 0 ?  "Suspend" : "")
                    . ( $this->order->active == 1 ? "Pending" : "")
                    . ( $this->order->active == 2 ?  "Paid" : "")
                    . ( $this->order->active == 3 ?  "Success Payment" : "")
                    . ( $this->order->active == 4 ?  "Done" : "")
                . "</small>";

        return [
            'id' => $this->id,
            'buying_date' => date('d-m-Y', strtotime($this->order->buying_date)),
            'customer_name' => optional($this->order->customer)->name,
            'trainer_name' => optional($this->order->customer->trainer)->name,
            'purchase_order_number' => $this->order->purchase_order_number,
            'tracking_number' => $this->tracking_number,
            'product_category' => optional($this->category)->name,
            'qty' => $this->qty,
            'price' =>  sprintf('¥%s', $this->price),
            'total' => sprintf('¥%s', $this->total),
            'cds' => sprintf('¥%s', $this->china_domistic_shipping),
            'sub_total_china' => sprintf('¥%s', $this->sub_total_china),
            'exchange_rate' =>  $this->exchange_rate,
            'handing_fee' => sprintf('%s%%', $this->handing_fee),
            'sub_total_usd' => sprintf('$%s', $this->sub_total_usd),
            'total_handing_fee' => sprintf('$%s', $this->total_handing_fee),
            'amount_total' => sprintf('$%s', $this->amount_total, 2),  
            'status' => $status,
        ];
    }
}
