<?php

namespace App\Http\Resources;

use App\ProductCategory;
use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductCategoryDatatableResource extends JsonResource {

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request) {

        $edit = "";
        if(hasPermission('product_category', 'write')){
            $edit =	"<a class='btn btn-default btn-sm' style='border: 1px solid #227fc1;' 
                        data-title='Edit' data-toggle='tooltip' data-placement='top'  
                        href='" . route('product-categories.edit', $this->id) . "'>
                        <i class='far fa-edit text-primary'></i>
                    </a>&nbsp;";
        }

        $show = "";
        if(hasPermission('product_category', 'read')){
            $show = "<a href='" . route('product-categories.show', $this->id) . "'
                        class='btn btn-default btn-sm' style='border: 1px solid #227fc1;' 
                        data-title='Show' data-toggle='tooltip' data-placement='top'>
                        <i class='far fa-eye text-primary'></i>
                    </a>&nbsp;";
        }

        $delete = "";
        if(hasPermission('product_category', 'delete')){
            $delete = Form::open(['route' => ['product-categories.destroy', $this->id], 'method' => 'delete', 'class' => 'd-inline'])
                . "<button type='submit' class='btn btn-default btn-sm action-delete delete' 
                        data-title='Delete' data-toggle='tooltip' data-placement='top' 
                        style='border: 1px solid #ef0b0b;'>
                        <i class='far text-danger fa-trash'></i>
                </button>"
                . Form::close();
        }

        $parent = ProductCategory::where('id', $this->parent_id)->active()->notDelete()->pluck('name');

        return [
            'id' => $this->id,
            'name' => $this->name,
            'parent' => $parent,
            'remark' => $this->remark,
            'status' => "<small class='text-white p-1 " . ($this->active ? "bg-success" : "bg-warning") . "'>"
                . ($this->active ? "Active" : "Inactive")
                . "</small>",
            'action' => $edit . $delete
        ];
    }
}
