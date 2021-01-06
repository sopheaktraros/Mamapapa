<?php

namespace App\Http\Resources;

use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class WrongTKOrderDatatableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $delete = "";
        if(hasPermission('wrong_tk_order', 'delete')){
            $delete = Form::open(['route' => ['wrong-tk-orders.destroy', $this->id], 'method' => 'delete', 'class' => 'd-inline'])
                    . "<button type='submit' class='btn btn-default btn-sm action-delete delete' style='border: 1px solid #ef0b0b;' 
                            data-title='Delete' data-toggle='tooltip' data-placement='top'>
                            <i class='far text-danger fa-trash'></i>
                        </button>"
                    . Form::close();
        }

        $show = "";
        if(hasPermission('wrong_tk_order', 'write')){
            $show = "<a href='" . url('wrong-tk-orders/' . $this->id . '/invoice') . "'
                        class='btn btn-default btn-sm' style='border: 1px solid #227fc1;'
                        data-title='Print Invoice' data-toggle='tooltip' data-placement='top'>
                        <i class='far fa-print text-primary'></i>
                    </a>&nbsp;";
        }

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
                    . ( $this->active == 4 ?  "Done" : "")
                    . "</small>";

        $date = date('d-m-Y', strtotime($this->buying_date));
        if(request()->active == 0){
            $date = date('d-m-Y', strtotime($this->buying_date));
        }else if(request()->active == 1){
            $date = date('d-m-Y', strtotime($this->buying_date));
        }else if(request()->active == 2){
            $date = $this->paid_date ? date('d-m-Y', strtotime($this->paid_date)): '';
        }else if (request()->active == 3){
            $date = $this->success_payment_date ? date('d-m-Y', strtotime($this->success_payment_date)) : '';
        }else if(request()->active == 4){
            $date = $this->done_date ? date('d-m-Y', strtotime($this->done_date)) : '';
        }
        
        return [
			'id' => $this->id,
            'buying_date' => $date,
            'purchase_order_number' => $this->china_po_number,
            'customer_name' => optional($this->customer)->name,
            'customer_phone' => rtrim(optional($this->customer)->phone, '_'),
            'customer_id' => $this->customer_id,
            'status' => $status,
	        'action' => $delete              
        ];
    }
}
