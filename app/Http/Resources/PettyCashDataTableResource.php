<?php

namespace App\Http\Resources;

use Collective\Html\FormFacade as Form;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class PettyCashDataTableResource extends JsonResource {

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request) {

        $edit = "";
        // if(Auth::User()->id == 1){
            if(hasPermission('petty_cash', 'write')){
                $edit =	"<a class='btn btn-default btn-sm' style='border: 1px solid #227fc1;' 
                            data-title='Edit' data-toggle='tooltip' data-placement='top' 
                            href='" . route('petty-cashes.edit', $this->id) . "'>
                            <i class='far fa-edit text-primary'></i>
                        </a>&nbsp;";
            }
        // }

        $delete = "";
        // if(Auth::User()->id == 1){
            if(hasPermission('petty_cash', 'delete')){
                $delete = Form::open(['route' => ['petty-cashes.destroy', $this->id], 'method' => 'delete', 'class' => 'd-inline'])
                    . "<button type='submit' class='btn btn-default btn-sm action-delete delete' style='border: 1px solid #ef0b0b;' 
                            data-title='Delete' data-toggle='tooltip' data-placement='top'>
                            <i class='far text-danger fa-trash'></i>
                    </button>"
                    . Form::close();
            }
        // }

        return [
            'id' => $this->id,
            'date' => date('d-m-Y', strtotime($this->pettyCash->date)),
            'amount' => sprintf('$%s', $this->total),
            'title' => $this->title,
            'qty' => $this->qty,
            'price' => sprintf('$%s', $this->price),
            'description' => $this->description,
            'status' => "<small class='text-white p-1 " . ($this->pettyCash->active ? "bg-success" : "bg-warning") . "'>"
                . ($this->pettyCash->active ? "Active" : "Inactive")
                . "</small>",
            'action' => $edit . $delete
        ];
    }
}
