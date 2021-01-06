<?php

namespace App\Http\Resources;
use App\CustomerOrderListDetail;
use App\ProductCriteria;

use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderedProductDataTableResource extends JsonResource {

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request) {

        $delete = "";
        if( $this->transfer_status == 0){
            if(hasPermission('ordered_product', 'delete')){
                $delete = Form::open(['route' => ['ordered-products.destroy', $this->id], 'method' => 'delete', 'class' => 'd-inline'])
                    . "<button type='submit' class='btn btn-default btn-sm action-delete delete' 
                            data-title='Delete' data-toggle='tooltip' data-placement='top' 
                            style='border: 1px solid #ef0b0b;'>
                            <i class='far text-danger fa-trash'></i>
                    </button>"
                    . Form::close();
            }
        }
        

        $status = "<small class='text-white p-1' style='"
                . ( $this->status == 1 ? 'background-color:red; border-radius:3px' : "" )
                . ( $this->status == 2 ? 'background-color:blue; border-radius:3px' : "" ) 
                . ( $this->status == 3 ? 'background-color:purple; border-radius:3px' : "" ) 
                . ( $this->status == 4 ? 'background-color:gold; border-radius:3px' : "" ) 
                . ( $this->status == 5 ? 'background-color:orange; border-radius:3px' : "" )
                . ( $this->status == 6 ? 'background-color:#09bb72; border-radius:3px' : "" ) 
                . ( $this->status == 7 ? 'background-color:navy; border-radius:3px' : "" )
                . ( $this->status == 8 ? 'background-color:violet; border-radius:3px' : "" ) 
                . ( $this->status == 9 ? 'background-color:#a50404; border-radius:3px' : "" ) 
                . ( $this->status == 10 ? 'background-color:#4e4a46; border-radius:3px' : "" ) 
                . ( $this->status == 11 ? 'background-color:rgba(122, 119, 177, 0.82); border-radius:3px' : "" )
                . ( $this->status == 12 ? 'background-color:rgb(180, 183, 0); border-radius:3px' : "" ) 
                . ( $this->status == 13 ? 'background-color:green; border-radius:3px' : "" ) . "'>"
                . ( $this->status == 1 ? "<span class='blink'>New Order</span>" : "") 
                . ( $this->status == 2 ? "Pending Audit" : "") 
                . ( $this->status == 3 ? "Pending Payment" : "")
                . ( $this->status == 4 ? "Be Ordered" : "")
                . ( $this->status == 5 ? "Product In Chinese Stock" : "")
                . ( $this->status == 6 ? "Shipping to Cambodai" : "")
                . ( $this->status == 7 ? "Arrived Cambodai" : "")
                . ( $this->status == 8 ? "Can Open" : "")
                . ( $this->status == 9 ? "Cancel" : "")
                . ( $this->status == 10 ? "Close Order" : "")
                . ( $this->status == 11 ? "Refunded" : "")
                . ( $this->status == 12 ? "Out of stock" : "")
                . ( $this->status == 13 ? "Complete" : "")
                . "</small>";

        $from = "<small class='text-white p-1  " . ($this->from == 1 ? "bg-success" : "bg-danger") . "'>"
                . ($this->from == 1 ? "Stock" : "China") 
                . "</small>";

        $orderedProductDetails = CustomerOrderListDetail::with('item')->where('customer_order_list_id', $this->id)->get();
        $productItems = CustomerOrderListDetail::where('customer_order_list_id', $this->id)->pluck('product_item_id');
        $productCriterias = ProductCriteria::whereIn('product_item_id', $productItems)->get();
     
        $item = '';
        if($this->from == 1){
            foreach($orderedProductDetails as $i => $orderedProductDetail){
                if($i > 0){
                    $item .= '</br><hr style="margin-top: 5px; margin-bottom: 5px;">';
                }
                $item .= '+ <b>Price:</b> $' . $orderedProductDetail->price . ' ' 
                        . '<b>Qty</b>:' . $orderedProductDetail->qty . ' ';
                            foreach($orderedProductDetail->item->criterias as $criteria){
                                $attribute = strtoupper($criteria->attribute);
                                if (preg_match('/(\.jpg|\.png|\.bmp)$/i',$criteria->attribute)) {
                                    $attribute = '<img src="'.url($criteria->attribute).'" 
                                                style="width:20px; height:20px"/>';
                                }

                                $item .= ' <b>' . $criteria->key_en . '</b>' . ': ' .  $attribute . ' ';
                            }
            }
        }else{
            foreach($orderedProductDetails as $i => $orderedProductDetail){
                if($i > 0){
                    $item .= '</br><hr style="margin-top: 5px; margin-bottom: 5px;">';
                }
                $propSkuNames = explode(';' ,$orderedProductDetail->prop_sku_name);
                $item .= '+ <b>Price</b>: $' . $orderedProductDetail->price . ' ' 
                        . '<b>Qty</b>:' . $orderedProductDetail->qty . '&nbsp;';
                            if($orderedProductDetail->prop_sku_name){
                                foreach($propSkuNames as $propSkuName){
                                    $propSku = explode(':',$propSkuName);
                                    $propSkuAttr = "";
                                  
                                        if(preg_match('/(\.jpg|\.png|\.bmp)$/i' ,$propSku[1])){
                                            $propSkuAttr = '<img src="'.url($propSku[1]).'" style="width:20px; height:20px"
                                                                data-title="' . $orderedProductDetail->property_value . '" data-toggle="tooltip" data-placement="top">';
                                        }else{
                                            $propSkuAttr = $propSku[1];
                                        }
                                   

                                    $item .= ' <b>' .  $propSku[0] . ' :</b> ' . $propSkuAttr . ' ';
                                }
                            }
            }
        }

        $product = $this->from == 1 ? $this->product->name_en : $this->product_name;
        
        return [
            'id' => $this->id,
            'date' => date('d-M-Y-H:iA', strtotime($this->date)),
            'po_number' => $this->po_number,
            'website_link' => $this->website,
            'customer' => $this->customer->name . '-' . str_replace(' ', '', $this->customer->phone),
            'customer_id' => $this->customer_id,
            'product_name' => $product,
            'product_item' => $item,
            'discount' => $this->discount . '%',
            'receiver' => $this->receiver_name . '-' . str_replace(' ', '', $this->phone),
            'location' => $this->location  . '-' . $this->location_price . ' $',
            'address' => 'Address: ' . $this->address,
            'from' => $from,
            'from_val' => $this->from,
            'total' =>'$' .$this->total,
            'status' => $status,
            'statusVal' => $this->status,
            'transferStatusVal' => $this->transfer_status,
            'action' => $delete,
        ];
    }
}
