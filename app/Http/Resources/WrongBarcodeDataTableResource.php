<?php

namespace App\Http\Resources;
use App\Customer;
use App\ProductCategory;
use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class WrongBarcodeDataTableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $edit = "";
        if(hasPermission('wrong_tk_verify', 'write')){
            $edit = "<a href='" . route('wrong-barcodes.edit', $this->id) . "' 
                        class='btn btn-default btn-sm' style='border: 1px solid #227fc1;' 
                        data-title='Edit' data-toggle='tooltip' data-placement='top'>
                        <i class='far fa-edit text-primary'></i>
                    </a>&nbsp;";
        }

        $show = "";
        if(hasPermission('wrong_tk_verify', 'read')){
            $show = "<a href='" . route('wrong-barcodes.show', $this->id) . "'
                        data-title='Show' data-toggle='tooltip' data-placement='top'
                        class='btn btn-default btn-sm' style='border: 1px solid #227fc1;'>
                        <i class='far fa-eye text-primary'></i>
                    </a>";
        }

        $print = "";
        if(hasPermission('wrong_tk_verify', 'write')){    
            if($this->barcode != null){
                $print = "&nbsp;<a href='" . url('wrong-barcodes/print', $this->id) . "'
                            class='btn btn-default btn-sm btn-print-barcode' style='border: 1px solid #227fc1;'
                            data-title='Print Barcode' data-toggle='tooltip' data-placement='top'>
                            <i class='far fa-print text-primary'></i>
                        </a>";
            }
        }

        $verifyTruckingNumber = "";
        if(hasPermission('wrong_tk_verify', 'write')){
            if($this->verify_tracking_number == null){
                $verifyTruckingNumber = "<input class='form-control form-control-sm verify-products' 
                                                type='text' size='6' name='verify_product' 
                                                id='verify-product " . ( $this->id ) . "'
                                                value=" . ($this->verify_tracking_number) . ">";
            }else{
                $verifyTruckingNumber = $this->verify_tracking_number;
            }
        }

        $verifyDate = "";
        if($this->verify_status != 0 && $this->verify_status != 3){
            $verifyDate = date('d-m-Y', strtotime($this->updated_at));
        }

        $customers = Customer::activated()->notDelete()->get();
        $option = '<option value="">-- Select Customer --</option>';

        foreach ($customers as $customer) {
            if ($customer->id == $this->customer_id) {
                $option .= '<option selected value="' . $customer->id . '">' . $customer->id . ' - ' . $customer->name . '</option>';
            } else {
                $option .= '<option value="' . $customer->id . '">' . $customer->id . ' - ' . $customer->name . '</option>';
            }
        }

        $selectCustomer = "";
        $selectCustomer = '<select class="form-control select2 narrow wrap" id="select-customer[' . $this->id . ']" name="customer_id[' . $this->id . ']">' . $option . '</select>';

        return [
            'id' => $this->id,
            'verify_trucking_number' => $verifyTruckingNumber,
            'trucking_number' => $this->trucking_number,
            'order_id' => sprintf('%06d', $this->id),
            'order_date' => date('d-m-Y', strtotime($this->buying_date)),
            'verify_date' => $verifyDate,
            'po_number' =>$this->china_po_number,
            'customer_name' => $selectCustomer,
            'customer_phone' =>  optional($this->customer)->phone,
            'amount' => sprintf('$%s', $this->amount_total),
            'verify_status' => "<small class='text-white p-1 " 
                        . ($this->verify_status == 0 ? "bg-warning" : "") 
                        . ($this->verify_status == 1 ? "bg-success" : "") 
                        . ($this->verify_status == 2 ? "bg-primary" : "") 
                        . ($this->verify_status == 3 ? "bg-danger" : "") . "'>"
                        . ($this->verify_status == 0 ? "Not yet verify" : "")
                        . ($this->verify_status == 1 ? "Verified" : "")
                        . ($this->verify_status == 2 ? "Already send" : "")
                        . ($this->verify_status == 3 ? "Wrong TN" : "")
	                    . "</small>",
            'status' => $this->status,
	        'action' =>  $print       
        ];
    }
}
