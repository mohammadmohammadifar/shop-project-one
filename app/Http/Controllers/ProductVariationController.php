<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductVariationController extends Controller
{
    public function store($variation,$attribute,$product)
    {
        $counter=count($variation['value']);
        for($i=0,$i<$counter,$i++){
            ProductVariation::create([

            ]);
        }
    }
}
