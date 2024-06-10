<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductImageController extends Controller
{
    public function upload($primaryImage,$images)
    {
        $fileNamePrimaryImage=generateFileName($primaryImage->getClientOriginalName());
        $fileNamePrimaryImagereplace=str_replace(' ', '_', $fileNamePrimaryImage);
        $primaryImage->move(public_path(env('UPLOAD_IMAGE')), $fileNamePrimaryImagereplace);

        $fileNameImages=[];
        foreach($images as $image)
        {
            $fileNameImage=generateFileName($image->getClientOriginalName());
            $fileNameImagereplace=str_replace(' ', '_', $fileNameImage);
            $image->move(public_path(env('UPLOAD_IMAGE')), $fileNameImagereplace);
            array_push($fileNameImages,$fileNameImage);
        }

        return ['fileNamePrimaryImagereplace'=>$fileNamePrimaryImage,'fileNameImagereplace'=>$fileNameImages ];

    }

    public function image(Product $product)
    {
        return view('admin.pages.products.updateImage', compact('product'));
    }

    public function setPrimary(Request $request, Product $product)
    {
        $request->validate([
            'image_id'=>'required|exists:product_images,id'
        ]);

        $productImage=ProductImage::findOrFail($request->image_id);

        $product->update([
            'primary_image'=>$productImage->image
        ]);
        alert()->success('Thank you', 'your image is update');
        return redirect()->back();
    }
}
