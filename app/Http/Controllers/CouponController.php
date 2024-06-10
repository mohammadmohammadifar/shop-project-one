<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons=Coupon::orderByDesc('created_at')->paginate(10);
        return view ('admin.pages.coupons.index',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'name' => 'required',
        ]);

        Coupon::create([
            'name' => $request->name,
            'code' => mt_rand(0001, 9999),
            'type' => $request->type,
            'amount' => $request->amount,
            'percentage' => $request->percentage,
            'max_percentage_amount' => $request->max_percentage_amount,
            'expired_at' => $request->expired_at,
            'description' => $request->description
        ]);

        alert()->success('Thank you', 'Coupon is created');
        return redirect()->route('admin.coupons.index');
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

    public function checkCoupon(Request $request)
    {
        $request->validate([
            'code'=>'required'
        ]);

        if(!auth()->check()){
            alert()->error('Hi','Please login');
            return redirect()->back();
        }
        $resualt= checkCoupon ($request->coupon);

        if(array_key_exists('error', $resualt)){
            alert()->error($resualt['error'],'thank you');
        }else{
            alert()->success($resualt['success'],' thank you');
        }
    }
}
