<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasFactory;

    protected $appends=['peercentage_sal'];
    protected $guarded=[];

    public function getPercentageSaleAttribute()
    {
        return $this->is_sale ? ($this->price - $this->sale_price /$this->price) * 100 : null;
    }
}
