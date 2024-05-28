<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory , Sluggable;

    protected $guarded=[];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getAttributeIsActive($is_active){

        return $is_active==1 ? 'active' : 'dis_active';

    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
