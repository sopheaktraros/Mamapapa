<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductImportDataTableResource extends JsonResource
{
    public function toArray($request)
    {
        $edit = "";
        
        if(hasPermission('product', 'write')){
            $edit = "<a class='btn btn-default btn-sm update-product-import' 
                        style='border: 1px solid #227fc1;' 
                        href='#edit-product-import-modal' data-toggle='modal'
                        data-product='". $this->product->id ."'
                        data-product-item='". $this->productItem->id ."'
                        data-cost='". $this->cost ."' 
                        data-qty='". $this->qty ."' 
                        data-supplier='". $this->supplier_name ."' 
                        data-import-product-id='". $this->id ."' >

                        <i class='far fa-edit text-primary'></i>
                    </a>&nbsp;";
        }

        return [
            'id' => $this->product->id,
            'created_at' => date('d-m-Y', strtotime($this->created_at)),
            'qty' => $this->qty,
            'cost' => $this->cost,
            'supplier_name' => $this->supplier_name,
            'action'=> $edit
        ];
    }
}