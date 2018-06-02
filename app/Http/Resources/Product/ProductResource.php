<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductResource extends Resource
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
            'title' => $this->title,
            'text' => $this->intro_text,
            'detail' => $this->detail,
            'href' => [
                'link' => route('emp.index',$this->id)
            ]
        ];
    }
}
