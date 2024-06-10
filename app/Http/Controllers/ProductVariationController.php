<?php

namespace App\Http\Controllers;

use App\Models\ProductVariation;
use Illuminate\Http\Request;

class ProductVariationController extends Controller
{
    public function store($variations,$attributeId,$product)
    {
        // dd($variations,$attributeId,$product);
        $counter=count($variations['value']);
        for($i=0;$i<$counter;$i++) {
            ProductVariation::create([
                'variation_id'=>$attributeId,
                'product_id'=>$product->id,
                'value'=>$variations['value'][$i],
                'price'=>$variations['price'][$i],
                'quantity'=>$variations['quantity'][$i],
                'sku'=>$variations['sku'][$i],
            ]);
        }
    }
}
