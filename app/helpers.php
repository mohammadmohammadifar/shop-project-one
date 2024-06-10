<?php

use App\Models\City;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Province;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;

function generateFileName($name)
{
    $year= Carbon::now()->year;
    $month= Carbon::now()->month;
    $day= Carbon::now()->day;
    $hour= Carbon::now()->hour;
    $second= Carbon::now()->second;

    return $year . '_' . $month . '_' . $day . '_' . $hour . '_' . $second . '_' . $name;
}

function checkCoupon($code)
{
    $coupon=Coupon::where('code',$code)->where('expired_at','>',Carbon::now())->first();

    if(Order::where('user_id',auth()->check())->where('coupon_id', $coupon->id)->where('payment_status',1)->exist()){
        return ['error' => 'before used'];
    }

    if($coupon->getRawOriginal('type')== 'amount'){
        session(['coupon',['code' => $coupon->code, 'amount'=>$coupon->amount]]);
    }else{

    }
    return ['success'=>'thank you youre code is ok'];
}


// میزان تخفیف
function cartTotalSaleAmount()
{
    $cartTotalSaleAmount=0;
    foreach (Cart::getContent() as $item) {
    $cartTotalSaleAmount += $item->quantity * ($item->attributes->price - $item->attributes->sale_price);
    }

    return $cartTotalSaleAmount;
}

// هزینه ارسال
function cartTotalDeliveryAmount()
{
    $cartTotalDeliveryAmount=0;
    foreach (Cart::getContent() as $item) {
    $cartTotalDeliveryAmount += $item->quantity * $item->delivery_amount ;
    }

    return $cartTotalDeliveryAmount;
}
