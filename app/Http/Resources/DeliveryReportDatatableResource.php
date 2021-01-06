<?php

namespace App\Http\Resources;

use App\DeliveryMan;
use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Session;

class DeliveryReportDatatableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $print = '';
        if(hasPermission('delivery', 'write')){
            $print = "<a href='" . url('delivery/print', $this->id) . "'><i class='far fa-print text-primary'></i></a>&nbsp;";
        }

        $readonly = '';
        if($this->status == 0){
            $status = '<small class="text-white p-1 bg-secondary">Padding</small>';
        }elseif($this->status == 1){
            $status = '<small class="text-white p-1 bg-warning">Shipping</small>';
            $readonly = 'true';
        } elseif($this->status == 2){
            $status = '<small class="text-white p-1 bg-success">Done</small>';
            $readonly = 'true';
        }else if($this->status == 3){
            $status = '<small class="text-white p-1 bg-danger">Return</small>';
        } else {
            $status = '<small class="text-white p-1 bg-primary">Paid</small>';
        }

        $subTotal = (float) $this->price - ((float) $this->packing + (float) $this->fee_from_sender + (float) $this->tax);

        return [
            'customer' => $this->customer->name,
			'product_name' => $this->product_name,
            'qty' => $this->qty,
            'delivery_man_code' => $this->delivery_man_code,
			'trucking_number' => $this->trucking_number,
            'price' => '$'. number_format($this->price, 2),
            'packing' => '$' . number_format($this->packing, 2),
            'fee_from_sender' => '$' . number_format($this->fee_from_sender, 2),
            'fee_from_receiver' => '$'. number_format($this->fee_from_receiver, 2),
            'tax' => '$' . number_format($this->tax, 2),
            'sub_total' => '$' . number_format($subTotal, 2),
            'total' => '$' . number_format($this->total, 2),
			'shipping_date' => date('d-m-Y', strtotime($this->shipping_date)),
            'address' => $this->address,
	        'status' => $status,
        ];
    }
}
