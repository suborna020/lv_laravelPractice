<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Product\ProductCollection;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductCollection::collection(Product::paginate(20));
    // collection= for multiple data collection

    }


    public function store(Request $request)
    {
        //
    }
// single product :: url/api/product/id 
    public function show(Product $product)
    {
        return new ProductResource($product);
        // new is for creating one perticular product instance 
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
