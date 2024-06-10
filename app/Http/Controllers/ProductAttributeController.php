<?php

namespace App\Http\Controllers;

use App\Models\productAttribute;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function store($attributes, $product)
    {
        foreach($attributes as $key=>$value)
        {
            productAttribute::create([
                'attribute_id'=>$key,
                'product_id'=>$product->id,
                'value'=>$value,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
