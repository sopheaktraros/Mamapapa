<?php

namespace App\Http\Resources;

use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductDataTableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $import = "";
        if(hasPermission('product', 'write')){
           $import = "<a class='btn btn-default btn-sm product-import' style='border: 1px solid #227fc1;'
                       href='#product-import-modal' data-toggle='modal' data-backdrop='static' data-keyboard='false'
                       data-product='".$this->id."'>
                       <i class='fas fa-download text-primary'></i>
                     </a>&nbsp;";
        }

        $edit = "";
        if(hasPermission('product', 'write')){
           $edit = "<a class='btn btn-default btn-sm' style='border: 1px solid #227fc1;'
                       data-title='Edit' data-toggle='tooltip' data-placement='left'
                       href='" . route('products.edit', $this->id) . "'>
                       <i class='far fa-edit text-primary'></i>
                   </a>&nbsp;";
        }

        $show = "";
        if(hasPermission('product', 'read')){
           $show = "<a class='btn btn-default btn-sm' style='border: 1px solid #227fc1;'
                       data-title='Show' data-toggle='tooltip' data-placement='left'
                       href='" . route('products.show', $this->id) . "'>
                       <i class='far fa-eye text-primary'></i>
                   </a>&nbsp;";
        }

        // $print = "";
        // if(hasPermission('product', 'write')){    
        //     $print = "<a href='" . url('products/print', $this->id) . "'
        //                 class='btn btn-default btn-sm btn-print-sku' style='border: 1px solid #227fc1;'
        //                 data-title='Print SKU' data-toggle='tooltip' data-placement='top'>
        //                 <i class='far fa-print text-primary'></i>
        //             </a>&nbsp;";
        // }

        $delete = "";
        if(hasPermission('product', 'delete')){
            $delete = Form::open(['route' => ['products.destroy', $this->id], 'method' => 'delete', 'class' => 'd-inline'])
                    . "<button type='submit' class='btn btn-default btn-sm action-delete delete' style='border: 1px solid #ef0b0b;' 
                            data-title='Delete' data-toggle='tooltip' data-placement='left'>
                            <i class='far text-danger fa-trash'></i>
                        </button>"
                    . Form::close();
        }


        return [
            'id' => $this->id,
            'product_code' => $this->code,
            'product_name' => $this->name_en,
            'product_brand' => $this->brand ? $this->brand->name_en : 'N/A',
            'product_category' => $this->category->name,
            'discount' =>optional($this->productDiscount)->discount,
            'status' => "<small class='text-white p-1 " . ($this->active ? "bg-success" : "bg-warning") . "'>"
            . ($this->active ? "Active" : "Inactive")
            . "</small>",
	        'action' => $import . $edit . $show . $delete 
        ];
    }
}
