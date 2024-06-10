@extends('front.layouts.index')

@section('content')
    <!--Page Header-->
    <section id="main-banner-page" class="position-relative page-header shop-detail-header section-nav-smooth parallax">
        <div class="overlay overlay-dark opacity-5 z-index-1"></div>
        <div class="container">
            <div class="row shift-tole">
                <div class="col-lg-6 offset-lg-3">
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
                        <h3 class="float-end">جزئیات محصول</h3>
                        <ul class="breadcrumb top10 bottom10 float-start">
                            <li class="breadcrumb-item hover-light"><a href="index.html">خانه</a></li>
                            <li class="breadcrumb-item hover-light">جزئیات محصول</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Page Header ends -->
    <!--Shop details-->
    <section id="shop" class="padding">
        <div class="container">
            <div class="row">
                <!-- NOTE: The Id of both of below tags should be same as below-->
                <!-- shop-dual-carousel -->
                <div class="col-lg-5 col-md-5 col-sm-12 wow fadeInLeft heading-space shift-tole" id="shop-dual-carousel"
                    data-wow-delay="20ms" data-wow-duration="1100ms">
                    <!-- syncCarousel -->
                    <div class="owl-carousel carousel-shop-detail owl-theme " id="syncCarousel">
                        <!--Item 1-->
                        <div class="item">
                            <a href="images/shop-1.jpg" data-fancybox="gallery" title="Zoom In">
                                <img src="{{ env('UPLOAD_IMAGE') . $product->primary_image }}" alt="Latest News">
                            </a>
                        </div>
                        <!--Item 2-->
                        @foreach ($product->productImages as $image)
                            <div class="item">
                                <a href="images/shop-2.jpg" data-fancybox="gallery" title="Zoom In">
                                    <img src="{{ env('UPLOAD_IMAGE') . $image->image }}" alt="Latest News">
                                </a>
                            </div>
                        @endforeach


                    </div>
                    <!-- The second carousel will be created dynamically using JS Based upon the items added in upper carousel -->
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 shop_info heading-space wow fadeInRight" data-wow-delay="20ms"
                    data-wow-duration="1100ms">
                    <!--Shop detail-->
                    <h2 class="heading darkcolor font-light2 bottom15"><span>{{ $product->name }}</span></h2>
                    <span class="text-warning heading">
                        <a href="#." class="hover-underline" title="4.4">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>&nbsp;
                            <span class="text-grey"><span class="font-bold">4.4 </span>(21)</span>
                        </a>
                    </span>
                    <h3 class="py-3">
                        @if ($product->quantity_check)
                            {{ $product->quantity_check->price }}
                        @else
                            <p>dont have enogh</p>
                        @endif
                    </h3>
                    <p class=" bottom10">{{ $product->description }}</p>
                    <p class="bottom15">از آنجا که لورم ایپسوم، شباهت زیادی به متن های واقعی دارد، طراحان معمولا از لورم
                        ایپسوم استفاده میکنند تا فقط به مشتری یا کار فرما نشان دهند که قالب طراحی شده بعد از اینکه متن در آن
                        قرار میگرد چگونه خواهد بود و فونت ها و اندازه ها چگونه در نظر گرفته شده است. </p>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <ul style="list-style: disc;" class="ps-3-rtl">
                                @foreach ($product->attributes as $attribute)
                                    <li>
                                        <p class="my-1"><span>{{ $attribute->pivot->value }} : </span><span
                                                class="font-light">-</span></p>
                                    </li>
                                @endforeach
                                <li>
                                    <p class="my-1"><span>ظرفیت : </span><span class="font-light">
                                            @if ($product->quantity_check)
                                                {{ $product->quantity_check->quantity }}
                                            @else
                                                ناموجود است
                                            @endif
                                        </span></p>
                                </li>
                                <li>
                                    <p class="my-1"><span>دسته بندی : </span><span class="font-light">کفش ها</span> </p>
                                </li>
                                <li>
                                    <p class="my-1"><span>منطقه : </span><span class="font-light">سراسر جهان</span> </p>
                                </li>
                                <li>
                                    <p class="mt-1 bottom10"><span>هزینه ارسال : </span><span
                                            class="font-light">رایگان</span></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 mt-1 mb-4">
                            <form action="{{ route('home.add.cart') }}" method="POST">
                                @csrf

                                <div class="quote">
                                    <label for="quantity" class="d-none"></label>
                                    <input type="number" placeholder="Quantity" min="1" max="100" value="1"
                                        class="quote pl-4" id="quantity" name="variatio-id">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                                    <button class="btn-common gradient-btn" type="submit" >افزودن به سبد خرید <i
                                        class="fa fa-cart-plus"></i></button>
                                </div>
                            </form>
                            <div class="quote ms-0 ms-sm-2 mt-3">
                                {{-- <form action="{{ route('home.compare.add', $product->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="sessionCompare" >
                                    <button type="submit" class="btn-common btn-dark">مقایسه</button>
                                </form> --}}
                                <a href="{{ route('home.compare.add', $product->id) }}"
                                    class="btn-common btn-dark">مقایسه</a>
                            </div>
                        </div>
                    </div>
                    <div class="share-on-it">
                        <ul class="social-icons black">
                            <li><span class="pe-2">اشتراک گذاری در : </span></li>
                            <li><a class="facebook" href="javascript:void(0)" title="Facebook"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li><a class="twitter" href="javascript:void(0)" title="Twitter"><i
                                        class="fab fa-twitter"></i></a></li>
                            <li><a class="insta" href="javascript:void(0)" title="Instagram"><i
                                        class="fab fa-instagram"></i></a></li>
                            <li><a class="whatsapp" href="javascript:void(0)" title="Whatsapp"><i
                                        class="fab fa-whatsapp"></i></a></li>
                            <li><a href="javascript:void(0)" title="Add to Wishlist"><i class="far fa-heart"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row top40">
                <!--Shop detail tabs-->
                <div class="col-md-12 wow fadeInUp" data-wow-delay="300ms">
                    <div class="tab-to-accordion heading_space">
                        <ul class="tabset-list">
                            <li><a href="#tab1">توضیحات</a></li>
                            <li class="active"><a href="#tab2">جزئیات</a></li>
                            <li><a href="#tab3">نظرات</a></li>
                        </ul>
                        <div class="tab-container">
                            <div id="tab1">
                                <p class="pb-3">اگر شما یک طراح هستین و یا با طراحی های گرافیکی سروکار دارید به متن های
                                    برخورده اید که با نام لورم ایپسوم شناخته می‌شوند.
                                </p>
                            </div>
                            <div id="tab2">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>شماره</td>
                                            <td>60-MCTE</td>
                                            <td>برخی اطلاعات دیگر</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>ابعاد محصول</td>
                                            <td> 92.8 اینچ</td>
                                            <td>برخی اطلاعات دیگر</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>وزن</td>
                                            <td>69 پوند</td>
                                            <td>برخی اطلاعات دیگر</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <td>رنگ</td>
                                            <td>مشکی ، آبی ، سفید</td>
                                            <td>برخی اطلاعات دیگر</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="tab3">
                                <div class="profile_bg bottom30">
                                    <div class="profile">
                                        <div class="p_pic"><img src="images/profile4.jpg" alt="instructure"></div>
                                        <div class="profile_text">
                                            <h5><strong>جان پارکر </strong> - <span>کیفیت عالی</span></h5>
                                            <ul class="comment">
                                                <li><a href="javascript:void(0)" class="text-warning-hvr"><i
                                                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                            class="fa fa-star"></i></a></li>
                                            </ul>
                                            <p>اگر شما یک طراح هستین و یا با طراحی های گرافیکی سروکار دارید به متن های
                                                برخورده اید که با نام لورم ایپسوم شناخته می‌شوند.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile_bg bottom30">
                                    <div class="profile">
                                        <div class="p_pic"><img src="images/profile3.jpg" alt="instructure"></div>
                                        <div class="profile_text">
                                            <h5><strong>جان میلر</strong> - <span>کیفیت عالی</span></h5>
                                            <ul class="comment">
                                                <li><a href="javascript:void(0)" class="text-warning-hvr"><i
                                                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                            class="fa fa-star"></i></a></li>
                                            </ul>
                                            <p>اگر شما یک طراح هستین و یا با طراحی های گرافیکی سروکار دارید به متن های
                                                برخورده اید که با نام لورم ایپسوم شناخته می‌شوند.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="add-review">
                                    <h3 class="heading darkcolor font-light2 bottom25">نظری بنویسید<span
                                            class="divider-left"></span></h3>
                                    <h5 class="pb-1">امتیاز شما : <span id="ratingText" class="text-warning">انتخاب
                                            کنید</span></h5>
                                    <ul class="comment bottom15 top10">
                                        <li><a href="javascript:void(0)" id="rattingIcon">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <form class="findus" id="contact-form" onSubmit="return false">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="result1"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="name" class="d-none"></label>
                                                    <input type="text" class="form-control" placeholder="نام"
                                                        name="name" id="name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="email1" class="d-none"></label>
                                                    <input type="email" class="form-control" placeholder="ایمیل*"
                                                        name="email" id="email1" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 mb-4">
                                                <label for="message" class="d-none"></label>
                                                <textarea placeholder="نظر*" name="message" id="message"></textarea>
                                                <button class="button gradient-btn" id="btn_submit">افزودن</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 wow fadeInDown text-center text-md-start">
                    <h3 class="heading darkcolor font-light heading_space mt-md-0 mt-3"><span>محصولات </span> مربوط<span
                            class="divider-left"></span></h3>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeIn" data-wow-delay="300ms">
                    <div class="shopping-box top20">
                        <div class="image sale" data-sale="30">
                            <img src="images/shop-1.jpg" alt="shop">
                            <div class="overlay center-block">
                                <a class="opens" href="shop-cart.html" title="Add To Cart"><i
                                        class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <div class="shop-content text-center">
                            <h4 class="darkcolor"><a href="shop-detail.html">کفش کلاسیک</a></h4>
                            <p>ما کامل ترین ها را در کشور ارائه می دهیم</p>
                            <h4 class="price-product">325000</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeIn" data-wow-delay="400ms">
                    <div class="shopping-box top20">
                        <div class="image">
                            <img src="images/shop-10.jpg" alt="shop">
                            <div class="overlay primary center-block">
                                <a class="opens" href="shop-cart.html" title="Add To Cart"><i
                                        class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <div class="shop-content text-center">
                            <h4 class="darkcolor"><a href="shop-detail.html">کفش دویدن</a></h4>
                            <p>ما کامل ترین ها را در کشور ارائه می دهیم</p>
                            <h4 class="price-product">325000</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeIn" data-wow-delay="500ms">
                    <div class="shopping-box top20">
                        <div class="image">
                            <img src="images/shop-5.jpg" alt="shop">
                            <div class="overlay danger center-block">
                                <a class="opens" href="shop-cart.html" title="Add To Cart"><i
                                        class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <div class="shop-content text-center">
                            <h4 class="darkcolor"><a href="shop-detail.html">کفش قرمز</a></h4>
                            <p>ما کامل ترین ها را در کشور ارائه می دهیم</p>
                            <h4 class="price-product">325000</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeIn" data-wow-delay="600ms">
                    <div class="shopping-box top20">
                        <div class="image sale" data-sale="20">
                            <img src="images/shop-2.jpg" alt="shop">
                            <div class="overlay danger center-block">
                                <a class="opens" href="shop-cart.html" title="Add To Cart"><i
                                        class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <div class="shop-content text-center">
                            <h4 class="darkcolor"><a href="shop-detail.html">کفش کتانی</a></h4>
                            <p>ما کامل ترین ها را در کشور ارائه می دهیم</p>
                            <h4 class="price-product">325000</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Shop Deails-->
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
    <!-- Contact US ends -->ّ
@endsection
