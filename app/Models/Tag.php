<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded=[];
    protected $table = 'tags';


    public function products()
    {
        return $this->belongsToMany(Product::class,'product_tag');
    }
}
