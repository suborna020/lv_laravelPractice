<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;


class ProductCollection extends JsonResource
// ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'name'=>$this->name,
            'discount'=>$this->discount,
            'totalPrice'=> round((1- ($this->discount/100)) * $this->price,2),
            // (1-(discount/100)) * productPrice
            'rating'=>$this->reviews->count()>0 ?  round($this->reviews->sum('star')/$this->reviews->count(),2):'No rating Yet',
            // $this->reviews= product modal page's function 
            // 1ta Product er rating hobe product tir sob user er deya star er total sum avarage (product modal er reviews function theke star column er sum avarage )
            //round= doshomik number transfer to a single digit
            'href'=>[
                'link'=> route('products.show',$this->id)
                // reviews.index=route name 

            ]
        ];
    }
}
