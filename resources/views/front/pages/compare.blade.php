@extends('front.layouts.index')

@section('content')


<!--Page Header-->
<section id="main-banner-page" class="position-relative page-header cart-header section-nav-smooth parallax">
    <div class="overlay overlay-dark opacity-5 z-index-1"></div>
    <div class="container">
        <div class="row shift-tole">
            <div class="col-lg-8 offset-lg-2">
                <div class="page-titles whitecolor text-center padding_top padding_bottom">
                    <h2 class="font-xlight">یک فروشگاه</h2>
                    <h2 class="font-bold">خلاقانه بسازید</h2>
                    <h2 class="font-xlight">در بازار</h2>
                    <h3 class="font-light pt-2">بهترین قالب چند منظوره</h3>
                </div>
            </div>
        </div>
        <div class="gradient-bg title-wrap">
            <div class="row">
                <div class="col-lg-12 col-md-12 whitecolor">
                    <h3 class="float-end">سبد خرید</h3>
                    <ul class="breadcrumb top10 bottom10 float-start">
                        <li class="breadcrumb-item hover-light"><a href="index.html">خانه</a></li>
                        <li class="breadcrumb-item hover-light">سبد خرید</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Page Header ends -->
<!--Shopping Cart-->
<section id="shop" class="padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 cart_table wow fadeInUp" data-wow-delay="300ms">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="darkcolor">محصول</th>
                            <th class="darkcolor ">قیمت</th>
                            <th class="darkcolor">تعداد</th>
                            <th class="darkcolor">جمع</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                        <tr>
                            <td>
                                <div class="d-table">
                                    <div class="d-block d-lg-table-cell">
                                        <a class="shopping-product" href="shop-detail.html"><img src="{{ env('UPLOAD_IMAGE') . $product->primary_image }}" alt="product"></a>
                                    </div>
                                    <div class="d-block d-lg-table-cell">
                                        <h4 class="darkcolor product-name"><a href="shop-detail.html">{{ $product->name }}</a></h4>
                                        <p>ما کامل ترین ها را در کشور ارائه می دهیم
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h4 class="default-color text-center">@if ($product->quantity_check)
                                    {{$product->quantity_check->price}}
                                @else
                                    dont have
                                @endif</h4>
                            </td>
                            <td class="text-center">
                                <div class="quote text-center">
                                    <label for="quantity1" class="d-none"></label>
                                    <input type="text" placeholder="1" class="quote" id="quantity1">
                                </div>
                            </td>
                            <td>
                                <h4 class="darkcolor text-center">130,000</h4>
                            </td>
                            <td class="text-center"><a class="btn-close" href="{{ route('home.compare.remove', $product->id) }}"><i class="fas fa-times"></i></a></td>
                        </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="apply_coupon">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 coupon">
                            <form action="{{ route() }}" class="findus form-inline bottom15 margin10">
                                <div class="form-group">
                                    <label for="coupin1" class="d-none"></label>
                                    <input type="text" placeholder="کد تخفیف" class="form-control" name="coupon" id="coupin1">
                                </div>
                                <button type="submit" class="button gradient-btn">اعمال کد</button>
                            </form>
                        </div>
                        <div class="col-md-6 col-sm-12 coupon d-sm-flex d-block justify-content-between align-self-center">
                            <a href="#." class="button btn-primary mb-sm-0 bottom15">بروز رسانی</a>
                            <a href="#." class="button btn-dark margin10">پرداخت</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 col-sm-12 wow fadeInLeft" data-wow-delay="300ms">
                <div class="totals margin_tophalf">
                    <h3 class="bottom25 font-light2">محاسبه حمل و نقل
                        :</h3>
                    <form class="findus">
                        <div class="form-group">
                            <label class="select form-control">
                                <select name="country" id="country">
                                    <option>آمریکا</option>
                                    <option>کانادا</option>
                                    <option>شیلی</option>
                                    <option>فرانسه</option>
                                </select>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="select form-control">
                                <select name="state" id="states">
                                    <option>آمریکا</option>
                                    <option>کانادا</option>
                                    <option>شیلی</option>
                                    <option>فرانسه</option>
                                </select>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="zip" class="d-none"></label>
                            <input type="text" class="form-control" placeholder="کدپستی" required id="zip">
                        </div>
                        <button type="button" class="button btn-primary">محاسبه</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-md-5 col-sm-12 wow fadeInUp margin_tophalf" data-wow-delay="400ms">
                <div class="totals margin_topalf h-100">
                    <h3 class="bottom25 font-light2">مجموع سبد:</h3>
                    <table class="table table-responsive cart-total">
                        <tbody>
                        <tr class="w-100">
                            <td>جمع فرع :</td>
                            <td class="yellow_t text-end"><strong>260,000</strong></td>
                        </tr>
                        <tr>
                            <td>مالیات :</td>
                            <td class="yellow_t text-end"><strong>0</strong></td>
                        </tr>
                        <tr>
                            <td>حمل و نقل :</td>
                            <td class="yellow_t text-end"><strong>رایگان</strong></td>
                        </tr>
                        <tr>
                            <td>جمع کل :</td>
                            <td class="text-end"><strong>260,000</strong></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 wow fadeInRight" data-wow-delay="500ms">
                <div class="totals margin_tophalf">
                    <h3 class="bottom25 font-light2">اطلاعات شخصی
                        :</h3>
                    <form class="findus">
                        <div class="form-group">
                            <label class="select form-control">
                                <select name="country" id="cashMethod">
                                    <option>حواله بانکی</option>
                                    <option>نقدی</option>
                                    <option>پی پال</option>
                                    <option>بیت کوین</option>
                                    <option>ویزا</option>
                                </select>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="select form-control">
                                <select name="state" id="states1">
                                    <option>آمریکا</option>
                                    <option>کانادا</option>
                                    <option>شیلی</option>
                                    <option>فرانسه</option>
                                </select>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="emailOrder" class="d-none"></label>
                            <input type="email" class="form-control" placeholder="ایمیل" required id="emailOrder">
                        </div>
                        <button type="button" class="button btn-primary">سفارش</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Shopping Cart ends-->
<!-- Contact US -->
<section id="stayconnect" class="bglight position-relative">
    <div class="container">
        <div class="contactus-wrapp">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="heading-title wow fadeInUp text-center text-md-start" data-wow-delay="300ms">
                        <h3 class="darkcolor bottom20">با ما در ارتباط باشید</h3>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <form class="getin_form wow fadeInUp" data-wow-delay="400ms" onsubmit="return false;">
                        <div class="row">
                            <div class="col-md-12 col-sm-12" id="result"></div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <label for="userName" class="d-none"></label>
                                    <input class="form-control" type="text" placeholder="نام" required id="userName" name="userName">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <label for="companyName" class="d-none"></label>
                                    <input class="form-control" type="text" placeholder="شرکت"  id="companyName" name="companyName">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <label for="email" class="d-none"></label>
                                    <input class="form-control" type="email" placeholder="ایمیل" required id="email" name="email">
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <button type="submit" class="button gradient-btn w-100" id="submit_btn">اشتراک گذاری</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact US ends -->


@endsection
