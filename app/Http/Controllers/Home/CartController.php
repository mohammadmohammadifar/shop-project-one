<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariation;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        // dd($request->all());

        $product = Product::findOrFail($request->product_id);
        $productVariation = ProductVariation::findOrFail(json_decode($request->variation)->id);

        if ($request->qytbutton > $productVariation->quantity) {
        }

        $rowId=$product->id .'_' . $productVariation->id ;

        if(Cart::get($rowId)){
        Cart::add(array(
            'id'=>$rowId,
            'name' => 'Product',
            'quantity'=>$request->qytbutton,
            // 'price'=> $productVariation->is_sale ? $productVariation->is_sale : $productVariation->price ,

        ));}else{

        }

    }

    public function index()
    {
        return view('home.cart.index');
    }
}
