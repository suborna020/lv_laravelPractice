<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name'=>$this->name,
            'description'=>$this->detail, //we can change the name also
            'price'=>$this->price,
            'stock'=>$this->stock == 0 ? 'Out of stock': $this->stock,
            'discount'=>$this->discount,
            'totalPrice'=> round((1- ($this->discount/100)) * $this->price,2),
            // (1-(discount/100)) * productPrice
            'rating'=>$this->reviews->count()>0 ?  round($this->reviews->sum('star')/$this->reviews->count(),2):'No rating Yet',
            // $this->reviews= product modal page's function 
            // 1ta Product er rating hobe product tir sob user er deya star er total sum avarage (product modal er reviews function theke star column er sum avarage )
            //round= doshomik number transfer to a single digit
            'href'=>[
                'reviews'=> route('reviews.index',$this->id)
                // reviews.index=route name 

            ]


        ];
    }
}
