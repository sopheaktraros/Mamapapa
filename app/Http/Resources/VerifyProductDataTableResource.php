<?php

namespace App\Http\Resources;

use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class VerifyProductDataTableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $show = "";
        if(hasPermission('company_verify', 'read')){
            $show = "<a href='" . route('verify-products.show', $this->id) . "'
                        class='btn btn-default btn-sm' style='border: 1px solid #227fc1;' 
                        data-title='Show' data-toggle='tooltip' data-placement='top'>
                        <i class='far fa-eye text-primary'></i>
                    </a>";
        }
            
        $print = "";
        if(hasPermission('company_verify', 'write')){    
            if($this->barcode != null){
                $print = "&nbsp;<a href='" . url('verify-product/print', $this->id) . "'
                            class='btn btn-default btn-sm btn-print-barcode' target='_blank' style='border: 1px solid #227fc1;'
                            data-title='Print Barcode' data-toggle='tooltip' data-placement='top'>
                            <i class='far fa-print text-primary'></i>
                        </a>";
            }
        }

        $deliveryBy = "<small class='text-white p-1 "
                    . ( $this->delivery_by != null ? "bg-secondary" : "") . "'>"
                    . ( $this->delivery_by == 1 ? "Air VIP / (2 - 3 day)" : "")
                    . ( $this->delivery_by == 2 ?  "Air Simple / (3 - 6 day)" : "")
                    . ( $this->delivery_by == 3 ?  "Land / (4 - 8 day)" : "")
                    . ( $this->delivery_by == 4 ?  "Sea / (10 - 15 day)" : "")
                    . "</small>";
        
        $verifyStatus = "<small class='text-white p-1 "
                    . ( $this->verify_status == 1 ? "bg-success" : "")
                    . ( $this->verify_status == 0 ? "bg-warning" : "")
                    . ( $this->verify_status == 2 ? "bg-primary" : "")
                    . ( $this->verify_status == 3 ? "bg-danger" : "") . "'>"
                    . ( $this->verify_status == 1 ? "Verified" : "")
                    . ( $this->verify_status == 0 ?  "Not yet verify" : "")
                    . ( $this->verify_status == 2 ?  "Already send" : "")
                    . ( $this->verify_status == 3 ?  "Wrong TN" : "")
                    . "</small>";
        
        // $verifyTruckingNumber = "";
        // if(hasPermission('company_verify', 'write')){
        //     if($this->verify_tracking_number == null){
        //         $verifyTruckingNumber = "<input class='form-control form-control-sm verify-products' 
        //                                         type='text' size='6' name='verify_product' 
        //                                         id='verify-product " . ( $this->id ) . "'
        //                                         value=" . ($this->verify_tracking_number) . ">";
        //     }else{
                $verifyTruckingNumber = $this->verify_tracking_number;
        //     }
        // }
        
        $verifyDate = "";
        if($this->verify_status != 0){
            $verifyDate = date('d-m-Y/H:i A', strtotime($this->verify_date));
        }

        $truckingNumber = "";
        if(hasPermission('company_verify', 'write')){
            if($this->verify_status == 0){
                $truckingNumber .= '<input type="text" name="trucking_number_update[]" 
                                    class="form-control-sm trucking-number-update" 
                                    value="'. $this->trucking_number .'" disabled="disabled">
                                    <input type="hidden" name="trucking_number_hidden[]" 
                                    class="trucking-number-hidden" 
                                    value="'. $this->trucking_number .'">'; 
            }else{
                $truckingNumber .=  '<span>'. $this->trucking_number .'</span>
                                    <input type="hidden" name="trucking_number_hidden[]" 
                                    class="form-control-sm trucking-number-hidden" 
                                    value="'. $this->trucking_number .'" readonly>';
            }
        }

        return [
            'id' => $this->id,
            'po_number' => $this->purchase_order_number,
            'verify_tracking_number' => $verifyTruckingNumber,
            'tracking_number' => $truckingNumber,
            'buying_date' => date('d-m-Y', strtotime($this->buying_date)),
            'verify_date' => $verifyDate,
            'purchase_order_number' => $this->purchase_order_number,
            'china_po_number' => $this->china_po_number,
            'customer' => $this->customer->name . '-' . str_replace(' ', '', rtrim($this->customer->phone, '_')),
            'amount_total' => sprintf('$%s', $this->amount_total, 2),
            'verify_status' =>  $verifyStatus,
            'delivery_by' =>  $deliveryBy,
	        'action' => $show . $print 
        ];
    }
}
