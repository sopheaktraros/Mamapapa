<?php

namespace App\Http\Resources;

use Collective\Html\FormFacade as Form;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerReportDataTableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {   
        return [
			'id' => $this->id,
            'date_sign_up' => date('d-m-Y', strtotime($this->date_sign_up)),
            'customer_name' => $this->name,
            'customer_phone' => $this->phone,
            'trainer' => $this->trainer->name,
            'email' => $this->email,
            'address' => $this->address,
        ];
    }
}
