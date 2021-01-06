<?php

namespace App\Http\Resources;

use App\OrderDetail;
use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class CashOutSummaryDatatableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {   
    
        $paid = "";
        if($this->payment_status == 0){
            if(hasPermission('cash_out', 'write')){
            $paid = Form::open(['route' => ['cashout-paid', $this->id], 'method' => 'post', 'class' => 'd-inline delete'])
                . "<button data-title='Paid' data-toggle='tooltip' data-placement='top' style='border: 1px solid #227fc1' 
                        type='submit' class='btn btn-default btn-sm'>
                        <i class='fas fa-money-check-alt text-primary'></i>
                </button>"
            . Form::close();
            }
        }

        $status = "<small class='text-white p-1 "
            . ( $this->active == 0 ? "bg-warning" : "")
            . ( $this->active == 1 ? "bg-success" : "") ."'>"
            . ( $this->active == 0 ?  "Inactive" : "") 
            . ( $this->active == 1 ? "Active" : "")
            . "</small>";

        $paymentStatus = "<small class='text-white p-1 "
            . ( $this->payment_status == 0 ? "bg-danger" : "")
            . ( $this->payment_status == 1 ? "bg-success" : "") ."'>"
            . ( $this->payment_status == 0 ?  "Not yet paid" : "") 
            . ( $this->payment_status == 1 ? "Paid" : "")
            . "</small>";
        
        return [
			'id' => $this->id,
            'date' =>  date('d-m-Y / h:i A', strtotime($this->created_at)),
            'po_number' => $this->po_number,
            'product' => $this->product_name,
            'price' =>  $this->price,
            'bargain_price' =>  $this->bargain_price,
            'amount' => $this->amount,
            'amount_usd' => $this->amount_usd,
            'status' => $status,
            'payment_status' => $paymentStatus,
            'audited_by' => $this->user->name,
	        'action' => $paid              
        ];
    }
}
