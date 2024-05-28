<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    public function upload($primaryImage,$images)
    {
        $fileNamePrimaryImage=generateFileName($primaryImage->getClientOriginalName());
        $primaryImage->move(public_path(env('UPLOAD_IMAGE')), $fileNamePrimaryImage);

        $fileNameImages=[];
        foreach($images as $image)
        {
            $fileNameImage=generateFileName($image->getClientOriginalName());
            $image->move(public_path(env('UPLOAD_IMAGE')), $fileNameImage);
            array_push($fileNameImages,$fileNameImage);
        }

        return ['fileNamePrimaryImage'=>$fileNameImage,'fileNameImages'=>$fileNameImages ];

    }
}
