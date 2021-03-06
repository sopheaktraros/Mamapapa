<?php

namespace App\Http\Resources;
use App\OrderStock;
use App\OrderStockDetail;
use App\ProductCriteria;
use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class StockBeOrderedDatatableResource extends JsonResource
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
        if(hasPermission('stock_be_ordered', 'read')){
            $show = "<a href='" . route('stock-be-orders.show', $this->id) . "'
                        class='btn btn-default btn-sm' style='border: 1px solid #227fc1;' 
                        data-title='Show' data-toggle='tooltip' data-placement='top'>
                        <i class='far fa-eye text-primary'></i>
                    </a>";
        }
     
        $paid = "<small class='text-white p-1 "
                . ( $this->paid == 0 ? "bg-warning" : "")
                . ( $this->paid == 1 ? "bg-primary" : "") ."'>"
                . ( $this->paid == 0 ?  "Not Yet Paid" : "") 
                . ( $this->paid == 1 ?  "Paid" : "")
                . "</small>";
        
        
        $auditedBy = "<small class='text-white p-1 "
                . ( $this->auditor != null ? "bg-info" : "") . "'>"
                . ( $this->auditor == 1 ? "Vicheka" : "")
                . ( $this->auditor == 2 ?  "Panha" : "")
                . ( $this->auditor == 3 ?  "Kheng" : "")
                . "</small>";

        $orderedProductDetails = OrderStockDetail::with('item')->where('order_stock_id', $this->id)->get();
        $productItems = OrderStockDetail::where('order_stock_id', $this->id)->pluck('product_item_id');
        $productCriterias = ProductCriteria::whereIn('product_item_id', $productItems)->get();
        
        $item = '';
        foreach($orderedProductDetails as $i => $orderedProductDetail){
            if($i > 0){
                $item .= '</br><hr style="margin-top: 5px; margin-bottom: 5px;">';
            }
            $item .= '+ <b>Price:</b> $' . $orderedProductDetail->price . ' ' 
                    . '<b>Qty</b>:' . $orderedProductDetail->qty . ' ';
                        foreach($orderedProductDetail->item->criterias as $criteria){
                            $attribute = strtoupper($criteria->attribute);
                            if (preg_match('/(\.jpg|\.png|\.bmp)$/i',$criteria->attribute)) {
                                $attribute = '<img src="'.url($criteria->attribute).'" style="width:20px; height:20px"/>';
                            }

                            $item .= ' <b>' . $criteria->key_en . '</b>' . ': ' .  $attribute . ' ';
                        }
        }

        $product = $this->product->name_en;

        $status = "<small data-title='$this->remark' data-toggle='tooltip' data-placement='left' 
            class='text-white p-1 " . ($this->status == 3 ? "bg-primary" : "bg-success") . "'>"
            . ( $this->status == 3 ? "Be Ordered" : "Done")
            . "</small>";
                
        return [
			'id' => $this->id,
            'be_order_date' => date('d-m-Y / H:i A', strtotime($this->success_payment_date)),
            'pending_payment_date' => date('d-m-Y / H:i A', strtotime($this->paid_date)),
            'buying_date' => date('d-m-Y', strtotime($this->date)),
            'transfer_date' => date('d-m-Y / H:i A', strtotime($this->created_at)),
            'po_number' => $this->po_number,
            'customer' => $this->customer->name . '-' . str_replace(' ', '', rtrim($this->customer->phone, '_')),
            'product_name' => $product,
            'product_item' => $item,
            'discount' => number_format($this->discount, 2) . '%', 
            'receiver' =>  $this->receiver_name . '-' . str_replace(' ', '', rtrim($this->phone, '_')),
            'location' =>  $this->location . '-$' .$this->location_price,
            'address' => $this->address,
            'total' => '$' . $this->total,
            'status' => $status,
            'statusVal' => $this->status,
            'done_status' => $this->done_status,
            'refund_order_status' => $this->refund_order_status,
            'remark' => $this->remark,
            'auditor' => $auditedBy,
	        'action' =>  $show              
        ];
    }
}
