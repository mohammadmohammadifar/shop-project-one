<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $guarded=[];

    // public function getTypeAttribute($type)
    // {
    //     return $type == 1 ? 'amount' : 'percentage';
    // }
}
