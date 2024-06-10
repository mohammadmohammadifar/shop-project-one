<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory,Sluggable;

    protected $guarded=[];
    protected $table = 'products';


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getStatusAttribute($status){
        return $status ==1 ? 'active' : 'disactive';
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function getQuantityCheckAttribute()
    {
        return $this->variations()->where('quantity', '>', 0)->first() ?? 0;
    }

    public function brands()
    {
        return $this->belongsTo(Brand::class);
    }

    public function getSalePriceAttribute()
    {
        return $this->variations()->where('quantity' ,'>',0)->where('sale_price','!=',0)->where('data_on_sale_time','>', Carbon::now())->where('data_on_sale_time','<',Carbon::now())->frst() ?? false;
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'product_tag');
    }
    public function variations()
    {
        return $this->hasMany(ProductVariation::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'product_attributes')->withPivot('value');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

}



