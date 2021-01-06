<?php

namespace App\Http\Resources;

use App\DeliveryMan;
use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Session;

class DeliveryDatatableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $edit = '';
        if (hasPermission('delivery_pending', 'write')) {
            $edit = "<a class='btn btn-default btn-sm' style='border: 1px solid #227fc1;' 
                        data-toggle='tooltip' data-placement='top'  data-title='Edit'
                        href='" . route('delivery.edit', $this->id) . "'>
                        <i class='far fa-edit text-primary'></i>
                    </a>&nbsp;";
        }

        $print = '';
        if (hasPermission('delivery_pending', 'write')) {
            $print = "<a class='btn btn-default btn-sm' style='border: 1px solid #227fc1;'
                         data-toggle='tooltip' data-placement='top'  data-title='Print Barcode'
                         target='_blank' href='" . url('delivery/print', $this->id) . "'>
                         <i class='far fa-print text-primary'></i>
                     </a>&nbsp;";
        }

        $delete = '';
        if (hasPermission('delivery_pending', 'delete')) {
            $delete = Form::open(['route' => ['delivery.destroy', $this->id], 'method' => 'delete', 'class' => 'd-inline'])
                . "<button type='submit' class='btn btn-default btn-sm action-delete delete' style='border: 1px solid #ef0b0b;' 
                           data-title='Delete' data-toggle='tooltip' data-placement='top'>
                           <i class='far text-danger fa-trash'></i>
                   </button>"
                . Form::close();
        }

        $checkbox = "";
        if(hasPermission('delivery_pending', 'write')){
            $checkbox = '<div class="custom-control custom-checkbox" style="margin-left:5px">
                            <input data-id="' . $this->id . '" id="' . $this->id . '" type="checkbox" class="custom-control-input product-check" name="delivery_checked[' . $this->id . ']" value="' . $this->id . '">
                            <label class="custom-control-label" for="' . $this->id . '"></label>
                            <input type="hidden" class="update-return-reason" value="' . $this->return_reason  . '">
                            <input type="hidden" class="trucking-number" value="' . $this->trucking_number . '">
                        </div>';
        }

        $readonly = '';
        if ($this->status == 0) {
            $status = '<small class="text-white p-1 bg-secondary">Pending</small>';
        } elseif ($this->status == 2) {
            $status = '<small class="text-white p-1 bg-success">Done</small>';
            $readonly = 'true';
        } else if($this->status == 3){
            $status = '<small class="text-white p-1 bg-danger">Return</small>';
        } else if($this->status == 4){
            $status = '<small class="text-white p-1 bg-primary">Shipping</small>';
        }

        $deliveryman = DeliveryMan::activated()->get();
        $option = '<option value="">-- D-Man-ID--</option>';

        foreach ($deliveryman as $man) {
            if ($man->code == $this->delivery_man_code) {
                $option .= '<option selected value="' . $man->code . '">' . $man->code . '</option>';
            } else {
                $option .= '<option value="' . $man->code . '">' . $man->code . '</option>';
            }
        }

        $selectDeliveryman = "";
        $inputDeliveryman = "";
        if(hasPermission('delivery_pending', 'write')){
            $selectDeliveryman = '<select class="form-control-sm deliveryman_select_code" name="deliveryman_code[' . $this->id . ']">' . $option . '</select>';
            $inputDeliveryman = '<input readonly=' . $readonly . ' type="text" name="deliveryman_code[' . $this->id . ']" class="form-control-sm deliveryman_input_code" value=' . $this->delivery_man_code . '>';
        }

        $subTotal = 0;
        $packingSender = $this->packing_from == 1 ? (float) $this->packing_from_sender : 0;
        $feeSender = $this->shipping_fee_from == 1 ? (float) $this->fee_from_sender : 0;
        $taxSender = $this->taxi_from == 1 ? (float) $this->taxi_from_sender : 0;
        $totalSerceice = $packingSender +  $feeSender + $taxSender;
        $subTotal = ((float) $this->price - $totalSerceice);

        $shippingDate = "";
        if($this->shipping_date){
            $shippingDate .= '<input type="search" class="form-control-sm datepicker shipping-date"
                        name="shipping_date[' . $this->id . ']" placeholder="Shipping Date" 
                        value="' . date('M-d-Y', strtotime($this->shipping_date)) .'" autocomplete="off">';
        }else{
            $shippingDate .= '<input type="search" class="form-control-sm datepicker shipping-date"
                    name="shipping_date[' . $this->id . ']" placeholder="Shipping Date" 
                    value="" autocomplete="off">';
        }

        return [
            'checkbox' => $checkbox,
            'customer' => $this->customer->name,
            'product_name' => $this->product_name,
            'qty' => $this->qty,
            'delivery_man_code' => (!$readonly ? $selectDeliveryman : $inputDeliveryman),
            'trucking_number' => $this->trucking_number,
            'price' => '$ ' . number_format($this->price, 2),
            'packing_sender' => $this->packing_from_sender ? '$ ' . number_format($this->packing_from_sender, 2) : "",
            'packing_receiver' => $this->packing_from_receiver ? '$ ' . number_format($this->packing_from_receiver, 2) : "",
            'fee_from_sender' => $this->fee_from_sender ? '$ ' . number_format($this->fee_from_sender, 2) : "",
            'fee_from_receiver' => $this->fee_from_receiver ? '$ ' . number_format($this->fee_from_receiver, 2) : "",
            'receiver_phone' => rtrim($this->receiver_phone, '_'),
            'taxi_sender' => $this->taxi_from_sender ? '$ ' . number_format($this->taxi_from_sender, 2) : "",
            'taxi_receiver' => $this->taxi_from_receiver ? '$ ' . number_format($this->taxi_from_receiver, 2) : "",
            'sub_total' => '$ ' . number_format($subTotal, 2),
            'total' => '$ ' . number_format($this->total, 2),
            'shipping_date' => $shippingDate,
            'address' => $this->location->name_en . '- $' .$this->location->price,
            'remark' => $this->remark,
            'status' => $status,
            'return_reason' => $this->return_reason,
            'action' => (!$readonly ? $edit : '') . $print . (!$readonly ? $delete : '')
        ];
    }
}
