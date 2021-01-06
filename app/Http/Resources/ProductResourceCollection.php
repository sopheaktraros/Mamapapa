<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductResourceCollection extends ResourceCollection
{
    private $auth, $page,$option;

    function __construct($resource, $page, $auth,$option = null)
    {
        parent::__construct($resource);
        $this->page = $page;
        $this->auth = $auth;
        $this->option = $option;
    }

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'auth' => $this->auth,
            'page' => $this->page,
            'deal_option' => $this->option
        ];
    }
}
