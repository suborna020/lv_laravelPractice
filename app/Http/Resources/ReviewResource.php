<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            
            'product_id'=>$this->product_id,

            'customer'=>$this->customer,
            'body'=>$this->review, //we can change the name also
            'star'=>$this->star
        ];
    }
}
