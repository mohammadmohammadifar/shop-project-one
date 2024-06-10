@extends('front.layouts.index')

@section('content')
    <section id="main-banner-page" class="position-relative page-header shop-header section-nav-smooth parallax">
        <div class="overlay overlay-dark opacity-6 z-index-1"></div>
        <div class="container">
            <div class="row shift-tole">
                <div class="col-lg-8 offset-lg-2">
                    <div class="page-titles whitecolor text-center padding_top padding_bottom">
                        <h2 class="font-xlight">بسازید</h2>
                        <h2 class="font-bold">صفحه خرید خلاقانه</h2>
                        <h2 class="font-xlight">در کسب و کار</h2>
                        <h3 class="font-light pt-2">بهترین قالب چند منظوره خلاقانه و اختلاف منظر</h3>
                    </div>
                </div>
            </div>
            <div class="gradient-bg title-wrap">
                <div class="row">
                    <div class="col-lg-12 col-md-12 whitecolor">
                        <h3 class="float-end">فروشگاه</h3>
                        <ul class="breadcrumb top10 bottom10 float-start">
                            <li class="breadcrumb-item hover-light"><a href="index.html">خانه</a></li>
                            <li class="breadcrumb-item hover-light">فروشگاه</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Page Header ends -->
    <!--Shopping-->
    <section id="our-shop" class="padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center wow fadeIn" data-wow-delay="300ms">
                    <h2 class="heading bottom30 darkcolor font-light2"> <span class="font-normal">فروشگاه </span>ما
                        <span class="divider-center"></span>
                    </h2>
                    <div class="col-md-8 offset-md-2-rtl heading_space">
                        <p>اگر شما یک طراح هستین و یا با طراحی های گرافیکی سروکار دارید به متن های برخورده اید که با نام
                            لورم ایپسوم شناخته می‌شوند.</p>
                    </div>
                </div>
                @foreach ($products as $product)
                <div class="col-lg-4 col-md-6 col-sm-6 wow fadeIn" data-wow-delay="300ms">
                    <div class="shopping-box bottom30">
                        <div class="image sale" data-sale="40">
                            <img src="{{ env('UPLOAD_IMAGE') . $product->primary_image }}" alt="shop">
                            <div class="overlay center-block">
                                <a class="opens" href="{{ route('home.details' , $product->id) }}" title="Add To Cart"><i
                                        class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <div class="shop-content text-center">
                            <h4 class="darkcolor"><a href="shop-detail.html">{{ $product->name }}</a></h4>
                            <p>{{ Str::limit($product->description, 1 , '...') }}</p>
                            <h4 class="price-product">
                                @if ($product->quantity_check)
                                    {{ number_format( $product->quantity_check->price , 3 , ',') }}
                                @else
                                    <p>ناموجود</p>
                                @endif
                               </h4>
                        </div>
                    </div>
                </div>
                @endforeach


                <div class="col-lg-12 col-md-12">
                    <ul class="pagination justify-content-center top20 wow fadeInUp" data-wow-delay="400ms">
                        <li class="page-item"><a class="page-link disabled" href="#."><i
                                    class="fa fa-angle-right"></i></a></li>
                        <li class="page-item active"><a class="page-link" href="#.">1</a></li>
                        <li class="page-item"><a class="page-link" href="#.">2</a></li>
                        <li class="page-item"><a class="page-link" href="#.">3</a></li>
                        <li class="page-item"><a class="page-link" href="#."><i class="fa fa-angle-left"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--Shopping ends-->
    <!-- Counters -->
    <section class="padding bg-shop-quote parallax">
        <div class="overlay overlay-dark opacity-6 z-index-0"></div>
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-md-8 offset-md-2-rtl">
                    <div class="quote-wrapper">
                        <h3>راحان سایت هنگام طراحی قالب سایت معمولا با این موضوع رو برو هستند که محتوای اصلی صفحات آماده
                            نیست. در نتیجه طرح کلی دید درستی.</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Counters ends-->
    <!--Trending Items in shop-->
    <section class="padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center wow fadeIn" data-wow-delay="300ms">
                    <h2 class="heading bottom30 darkcolor font-light2"><span class="font-normal">محبوب ترین ها</span>
                        <span class="divider-center"></span>
                    </h2>
                    <div class="col-md-8 offset-md-2-rtl heading_space">
                        <p>
                            {{ $product->description }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 wow fadeIn" data-wow-delay="400ms">
                    <div class="shopping-box bottom30">
                        <div class="image sale" data-sale="30">
                            <img src="images/shop-3.jpg" alt="shop">
                            <div class="overlay primary center-block">
                                <a class="opens" href="shop-cart.html" title="Add To Cart"><i
                                        class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <div class="shop-content text-center">
                            <h4 class="darkcolor"><a href="shop-detail.html">کفش آبی</a></h4>
                            <p>ما کامل ترین ها را در کشور ارائه می دهیم</p>
                            <h4 class="price-product">325000</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 wow fadeIn" data-wow-delay="500ms">
                    <div class="shopping-box bottom30">
                        <div class="image">
                            <img src="images/shop-4.jpg" alt="shop">
                            <div class="overlay danger center-block">
                                <a class="opens" href="shop-cart.html" title="Add To Cart"><i
                                        class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <div class="shop-content text-center">
                            <h4 class="darkcolor"><a href="shop-detail.html">کفش رد</a></h4>
                            <p>ما کامل ترین ها را در کشور ارائه می دهیم</p>
                            <h4 class="price-product">325000</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 wow fadeIn" data-wow-delay="600ms">
                    <div class="shopping-box bottom30">
                        <div class="image sale" data-sale="20">
                            <img src="images/shop-2.jpg" alt="shop">
                            <div class="overlay primary center-block">
                                <a class="opens" href="shop-cart.html" title="Add To Cart"><i
                                        class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <div class="shop-content text-center">
                            <h4 class="darkcolor"><a href="shop-detail.html">کفش سبک وزن</a></h4>
                            <p>ما کامل ترین ها را در کشور ارائه می دهیم</p>
                            <h4 class="price-product">325000</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Trending Items in shop End-->
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
                                        <input class="form-control" type="text" placeholder="نام" required
                                            id="userName" name="userName">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="companyName" class="d-none"></label>
                                        <input class="form-control" type="text" placeholder="شرکت" id="companyName"
                                            name="companyName">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="email" class="d-none"></label>
                                        <input class="form-control" type="email" placeholder="ایمیل" required
                                            id="email" name="email">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <button type="submit" class="button gradient-btn w-100" id="submit_btn">اشتراک
                                        گذاری</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
