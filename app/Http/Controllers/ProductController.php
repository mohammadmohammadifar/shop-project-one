<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
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
        $brands = Brand::all();
        $categories = Category::where('parent_id', '!=', 0)->get();
        $attributeId = Attribute::all();
        $categoryId = Category::all();
        return view('admin.pages.products.create', compact('brands', 'categories', 'attributeId', 'categoryId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // $requesف->validate([

        // ]);

        try {
            DB::beginTransaction();

            $productimage = new ProductImageController();
            $fileNameImage = $productimage->upload($request->primary_image, $request->images);

            $product = Product::create([
                'name' => $request->name,
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'primary_image' => $fileNameImage['fileNamePrimaryImage'],
                'description' => $request->description,
                'status' => $request->status,
                'delivery_amount' => $request->delivery_amount,
                'delivery_amount_per_product' => $request->delivery_amount_per_product
            ]);

            foreach ($fileNameImage['fileNameImage'] as $image) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $image
                ]);
            }

            // productAttribute
            $productAttribute = new ProductAttributeController();
            $productAttribute->store($request->product_attributes, $product);


            // productVariation
            $category = Category::find($request->category_id);
            $attributeId = $category->attributes()->wherePivot('is_variation', 1)->first()->id;
            $ProductVaritionCintroll = new ProductVariationController();
            $ProductVaritionCintroll->store($request->variation_values, $attributeId, $product);

            // tags
            $product->tags()->attach($request->tag_ids);



            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('error', $ex->getMessage());
            return redirect()->back();
        }

        alert()->success('thanks', 'product is creat');
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
