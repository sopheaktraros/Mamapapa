<?php

namespace App\Http\Resources;
use App\OrderStock;
use App\OrderStockDetail;
use App\ProductCriteria;
use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class StockOrderDatatableResource extends JsonResource
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
        if(hasPermission('stock_pending_audit', 'read')){
            $show = "<a href='" . route('stock-orders.show', $this->id) . "'
                        class='btn btn-default btn-sm' style='border: 1px solid #227fc1;' 
                        data-title='Show' data-toggle='tooltip' data-placement='top'>
                        <i class='far fa-eye text-primary'></i>
                    </a>";
        }

        $status = "<small data-title='$this->remark' data-toggle='tooltip' data-placement='left' 
            class='text-white p-1 " . ($this->status == 1 ? "bg-primary" : "bg-success") . "'>"
            . ( $this->status == 1 ? "Pending Audit" : "Done")
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

        return [
            'id' => $this->id,
            'order_date' => date('d-m-Y', strtotime($this->date)),
            'transfer_date' => date('d-m-Y / H:i A', strtotime($this->created_at)),
            'po_number' => $this->po_number,
            'customer' => $this->customer->name . '-' . str_replace(' ', '', rtrim($this->customer->phone, '_')),
            'product_name' => $product,
            'product_item' => $item,
            'discount' => number_format($this->discount, 2) .'%', 
            'receiver' =>  $this->receiver_name . '-' . str_replace(' ', '', rtrim($this->phone, '_')),
            'location' =>  $this->location . '-$' .$this->location_price,
            'address' => $this->address,
            'total' => '$' . $this->total,
            'statusVal' => $this->status,
            'status' => $status,
            'pending_payment_status' => $this->pending_payment_status,
            'remark' => $this->remark,
	        'action' =>  $show               
        ];
    }
}
