<?php

namespace App\Http\Resources;

use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class WrongBarcodeReportDataTableResource extends JsonResource
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
                    . ( $this->active == 1 ? "bg-secondary" : "") 
                    . ( $this->active == 2 ? "bg-primary" : "") 
                    . ( $this->active == 3 ? "bg-info" : "")
                    . ( $this->active == 4 ? "bg-success" : "") . "'>"
                    . ( $this->active == 0 ?  "Suspend" : "")
                    . ( $this->active == 1 ? "Pending" : "")
                    . ( $this->active == 2 ?  "Paid" : "")
                    . ( $this->active == 3 ?  "Success Payment" : "")
                    . ( $this->active == 4 ?  "Done" : "") . 
                "</small>";

        return [
            'id' => $this->id,
            'buying_date' => date('d-m-Y', strtotime($this->buying_date)),
            'customer_name' => optional($this->customer)->name,
            'customer_phone' => optional($this->customer)->phone,
            'purchase_order_number' => $this->china_po_number,
            'trucking_number' => $this->trucking_number,
            'status' => $status,
        ];
    }
}
