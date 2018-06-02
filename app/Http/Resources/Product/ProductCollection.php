<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $id = $this->id;
        return [
            'title' => $this->title,
            'text' => $this->intro_text,
            'href' =>[
                'link' =>  route('sub.show', $id)

            ]
        ];
    }
}
