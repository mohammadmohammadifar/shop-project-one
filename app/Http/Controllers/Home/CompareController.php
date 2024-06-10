<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    // public function add(Request $request, Product $product)
    // {
    //     // dd($product);
    //     if (session()->has('compareProduct')) {
    //         if (in_array($product->id, session()->get('compareProduct'))) {
    //             alert()->error('thank you', 'before add');
    //             return redirect()->route('home.compare.index');
    //         } else {
    //             session()->push('compareProduct', [$product->id]);
    //             alert()->success('thank you', 'product add to compare');
    //             return redirect()->back();
    //         }
    //     } else {
    //         dd(session(['compareProduct' => [$product->id]]));

    //         alert()->success('thank you', 'product add to compare');
    //         return redirect()->back();
    //     }
    // }

    public function add(Request $request, Product $product)
    {
        if (session()->has('compareProduct')) {
            if (in_array($product->id, session()->get('compareProduct'))) {
                alert()->error('Thank you', 'Product already added');
                return redirect()->route('home.compare.index');
            } else {
                session()->push('compareProduct', $product->id);
                alert()->success('Thank you', 'Product added to compare');
                return redirect()->back();
            }
        } else {
            session(['compareProduct' => [$product->id]]);
            alert()->success('Thank you', 'Product added to compare');
            return redirect()->route('home.compare.index');
        }
    }


    public function index()
    {
        if (session()->has('compareProduct')) {
            $products = Product::findOrFail(session()->get('compareProduct'));
            // dd($products);
            return view('front.pages.compare', compact('products'));
        } else {
            alert()->success('dear', 'please insert product for compare');
            return redirect()->back();
        }
    }

    public function remove($productId)
    {
        if (session()->has('compareProduct')) {
            foreach (session()->get('compareProduct') as $key => $item) {
                if($item == $productId){
                    session()->pull('compareProduct' . $key);
                }
            }
            if(session()->get('compareProduct') == []){
                session()->forget('compareproduct');
            }
        }else{
            alert()->error('thank you', 'please insert compare product');
            return redirect()->back();
        }
    }
}
