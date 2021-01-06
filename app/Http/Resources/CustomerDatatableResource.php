<?php

namespace App\Http\Resources;

use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;
use App\CustomerTransactionBalance;

class CustomerDatatableResource extends JsonResource {

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request) {

        $edit = "";
        if(hasPermission('customers', 'write')){
            $edit =	"<a class='btn btn-default btn-sm' style='border: 1px solid #227fc1;' 
                        data-title='Edit' data-toggle='tooltip' data-placement='top' 
                        href='" . route('customers.edit', $this->id) . "'>
                        <i class='far fa-edit text-primary'></i>
                    </a>&nbsp;";
        }

        $show = "";
        if(hasPermission('customers', 'read')){
        $show =	"<a class='btn btn-default btn-sm' style='border: 1px solid #227fc1;' 
                    data-title='Show' data-toggle='tooltip' data-placement='top' 
                    href='" . route('customers.show', $this->id) . "'>
                    <i class='far fa-eye text-primary'></i>
                </a>&nbsp;";
        }

        $delete = "";
        if(hasPermission('customers', 'delete')){
        $delete = Form::open(['route' => ['customers.destroy', $this->id], 'method' => 'delete', 'class' => 'd-inline'])
            . "<button data-title='Delete' data-toggle='tooltip' data-placement='top' style='border: 1px solid #ef0b0b;' 
                       type='submit' class='btn btn-default btn-sm action-delete delete'>
				       <i class='far text-danger fa-trash'></i>
			  </button>"
            . Form::close();
        }

        $totalWithdraw = CustomerTransactionBalance::withdraw()->where('customer_id', $this->id)->sum('amount');
        $totalDeposit = CustomerTransactionBalance::deposit()->where('customer_id', $this->id)->sum('amount');
        $totalSpending = CustomerTransactionBalance::spending()->where('customer_id', $this->id)->sum('amount');

        return [
            'id' => $this->id,
            'name' => $this->name,
            'trainer' => optional($this->trainer)->name,
            'phone' => rtrim($this->phone,'_'),
            'date_sign_up' => date('d-M-Y' , strtotime($this->date_sign_up)),
            'address' => $this->address,
            'remark' => $this->remark,
            'balance' => '$' . $this->balance,
            'total_withdraw' => '$' . $totalWithdraw,
            'total_deposit' => '$' . $totalDeposit,
            'total_spending' => '$' . $totalSpending,
            'status' => "<small class='text-white p-1 " . ($this->active ? "bg-success" : "bg-warning") . "'>"
                . ($this->active ? "Active" : "Inactive")
                . "</small>",
            'action' => $edit . $show . $delete
        ];
    }
}
