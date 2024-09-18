@extends('frontend.master')
@section('content')
   <!-- end of header -->
        <!-- start of wpo-hero-section -->
        <div class="wpo-hero-slider">
            <div class="container container-fluid-sm">
                <div class="hero-slider">
                    <div class="hero-slider-item">
                        <div class="slider-bg">
                            <img src="{{ asset('frontend') }}/images/slider/image03.webp" alt="">
                        </div>
                        {{-- <div class="slider-content">
                            <div class="slide-title">
                                <h2>Trendy & Unique
                                    Collection</h2>
                            </div>
                            <a class="theme-btn" href="product.html">Shop Now</a>
                        </div> --}}
                    </div>
                    <div class="hero-slider-item">
                        <div class="slider-bg">
                            <img src="{{ asset('frontend') }}/images/slider/image01.webp" alt="">
                        </div>
                        {{-- <div class="slider-content">
                            <div class="slide-title">
                                <h2>Trendy & Unique
                                    Collection</h2>
                            </div>
                            <a class="theme-btn" href="product.html">Shop Now</a>
                        </div> --}}
                    </div>
                    <div class="hero-slider-item">
                        <div class="slider-bg">
                            <img src="{{ asset('frontend') }}/images/slider/image04.webp" alt="">
                        </div>
                        {{-- <div class="slider-content">
                            <div class="slide-title">
                                <h2>Trendy & Unique
                                    Collection</h2>
                            </div>
                            <a class="theme-btn" href="product.html">Shop Now</a>
                        </div> --}}
                    </div>
                </div>
            </div>
            <ul class="hero-social">
                <li>
                    <a href="#"><i class="ti-facebook"></i></a>
                </li>
                <li>
                    <a href="#"><i class="ti-instagram"></i></a>
                </li>
                <li>
                    <a href="#"><i class="ti-linkedin"></i></a>
                </li>
                <li>
                    <a href="#"><i class="ti-twitter-alt"></i></a>
                </li>
            </ul>
        </div>
        <!-- end of wpo-hero-section -->

        <!-- start of themart-featured-section -->
        <section class="themart-featured-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="wpo-section-title">
                            <h2>Featured Categories</h2>
                        </div>
                    </div>
                </div>
                <div class="featured-categorie-slider owl-carousel">
                    @foreach ($categories as $category)
                    <div class="featured-item">
                        <div class="images">
                            <img style="width:80px!important; margin:auto" src="{{ asset('uploads/category') }}/{{ $category->category_image }}" alt="">
                        </div>
                        <div class="text">
                            <h2>
                                @if (Str::length($category->category_name)>12)
                                    <a title="{{ $category->category_name }}" href="{{ route('category.product',$category->id) }}">
                                        {{ Str::substr($category->category_name,0,12).'....' }}
                                    </a>
                                @else
                                <a title="{{ $category->category_name }}" href="{{ route('category.product',$category->id) }}">
                                    {{ $category->category_name }}
                                </a>
                                @endif
                            </h2>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- end of themart-featured-section -->

        <!-- start of themart-offer-section -->
        <section class="themart-offer-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="wpo-section-title">
                            <h2>Exciting Offers</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="offer-wrap">
                            <div class="content">
                                <h2>Stylish Coat</h2>
                                <span class="offer-price">$80</span>
                                <del>$150</del>

                                <div class="count-up">
                                    <div id="clock"></div>
                                </div>
                                {{-- <a class="theme-btn-s2" href="#">Shop Now</a> --}}
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="banner-two-wrap">
                            <div class="text">
                                <h2>New Year Sale</h2>
                                <h4>Up To 70% Off</h4>
                                {{-- <a class="theme-btn-s2" href="#">Shop Now</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of themart-offer-section -->

        <!-- start of themart-interestproduct-section -->
        <section class="themart-interestproduct-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="wpo-section-title">
                            <h2>Products Of Your Interest</h2>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="row">
                        @foreach ($products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="product-item">
                                <div class="image">
                                    <img src="{{ asset('uploads/product/previewImage') }}/{{ $product->preview_image }}" alt="">
                                    @if ($product->discount)
                                        <div class="tag sale">-{{ $product->discount }}%</div>
                                    @else
                                        <div class="tag new">New</div>
                                    @endif
                                </div>
                                <div class="text">
                                    <h2> <a title="{{ $product->product_name }}" href="{{ route('product.details',$product->slug) }}">
                                        @if (strlen($product->product_name)>25)
                                                {{ Str::substr($product->product_name,0,25).'....' }}
                                            </a>
                                        @else
                                            {{ $product->product_name }}
                                        </a>
                                        @endif
                                    </h2>
                                    @php
                                    $total_stars = App\Models\OrderProduct::where('product_id', $product->id)->whereNotNull('review')->sum('star');
                                    $total_review = App\Models\OrderProduct::where('product_id', $product->id)->whereNotNull('review')->count();

                                        $avg = 0;
                                        if($total_review != 0){
                                            $avg = round($total_stars/$total_review);
                                        }
                                    @endphp
                                    <div class="rating-product">
                                        @for ($i=1; $i<=$avg; $i++ )
                                            <i class="fi flaticon-star"></i>
                                        @endfor
                                        <span>{{ $total_review==0?'':$total_review }}</span>
                                    </div>
                                    <div class="price">
                                        <span class="present-price">&#2547;{{ number_format($product->after_discount) }}</span>
                                        <del class="old-price">&#2547;{{ number_format($product->price) }}</del>
                                    </div>
                                    <div class="shop-btn">
                                        <a class="theme-btn-s2" href="{{ route('product.details',$product->slug) }}">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="more-btn">
                            <a class="theme-btn-s2" href="{{ route('index') }}">View All</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of themart-interestproduct-section -->

        <!-- start of themart-upcoming-offer-section -->
        {{-- <section class="themart-upcoming-offer-section section-padding">
            <div class="container">
                <div class="upcoming-offer">
                    <div class="left-shape">
                        <svg width="448" height="448" viewBox="0 0 448 448" fill="none">
                            <path
                                d="M448 224C448 347.712 347.712 448 224 448C100.288 448 0 347.712 0 224C0 100.288 100.288 0 224 0C347.712 0 448 100.288 448 224ZM13.8949 224C13.8949 340.038 107.962 434.105 224 434.105C340.038 434.105 434.105 340.038 434.105 224C434.105 107.962 340.038 13.8949 224 13.8949C107.962 13.8949 13.8949 107.962 13.8949 224Z"
                                fill="#F1E2CC" />
                            <path
                                d="M405 224C405 323.964 323.964 405 224 405C124.036 405 43 323.964 43 224C43 124.036 124.036 43 224 43C323.964 43 405 124.036 405 224ZM56.2246 224C56.2246 316.66 131.34 391.775 224 391.775C316.66 391.775 391.775 316.66 391.775 224C391.775 131.34 316.66 56.2246 224 56.2246C131.34 56.2246 56.2246 131.34 56.2246 224Z"
                                fill="#F1E2CC" />
                            <path
                                d="M360 224C360 299.111 299.111 360 224 360C148.889 360 88 299.111 88 224C88 148.889 148.889 88 224 88C299.111 88 360 148.889 360 224ZM100.433 224C100.433 292.244 155.756 347.567 224 347.567C292.244 347.567 347.567 292.244 347.567 224C347.567 155.756 292.244 100.433 224 100.433C155.756 100.433 100.433 155.756 100.433 224Z"
                                fill="#F1E2CC" />
                        </svg>
                    </div>
                    <div class="left-image">
                        <img src="{{ asset('frontend') }}/images/upcomming-left.png" alt="">
                    </div>
                    <div class="right-shape">
                        <svg width="448" height="448" viewBox="0 0 448 448" fill="none">
                            <path
                                d="M448 224C448 347.712 347.712 448 224 448C100.288 448 0 347.712 0 224C0 100.288 100.288 0 224 0C347.712 0 448 100.288 448 224ZM13.8949 224C13.8949 340.038 107.962 434.105 224 434.105C340.038 434.105 434.105 340.038 434.105 224C434.105 107.962 340.038 13.8949 224 13.8949C107.962 13.8949 13.8949 107.962 13.8949 224Z"
                                fill="#F1E2CC" />
                            <path
                                d="M405 224C405 323.964 323.964 405 224 405C124.036 405 43 323.964 43 224C43 124.036 124.036 43 224 43C323.964 43 405 124.036 405 224ZM56.2246 224C56.2246 316.66 131.34 391.775 224 391.775C316.66 391.775 391.775 316.66 391.775 224C391.775 131.34 316.66 56.2246 224 56.2246C131.34 56.2246 56.2246 131.34 56.2246 224Z"
                                fill="#F1E2CC" />
                            <path
                                d="M360 224C360 299.111 299.111 360 224 360C148.889 360 88 299.111 88 224C88 148.889 148.889 88 224 88C299.111 88 360 148.889 360 224ZM100.433 224C100.433 292.244 155.756 347.567 224 347.567C292.244 347.567 347.567 292.244 347.567 224C347.567 155.756 292.244 100.433 224 100.433C155.756 100.433 100.433 155.756 100.433 224Z"
                                fill="#F1E2CC" />
                        </svg>
                    </div>
                    <div class="right-image">
                        <img src="{{ asset('frontend') }}/images/upcomming-right.png" alt="">
                    </div>
                    <div class="section-title-text">
                        <h2>New Year Sale</h2>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="text">
                                <div class="shape-text">Up To <div class="shape-single">
                                        <div class="shape">
                                            <svg width="158" height="159" viewBox="0 0 158 159" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M156.059 58C146.681 24.5386 115.956 0 79.5 0C35.5934 0 0 35.5934 0 79.5C0 123.407 35.5934 159 79.5 159C117.749 159 149.689 131.988 157.285 96H147.228C139.817 126.526 112.306 149.193 79.5 149.193C41.0096 149.193 9.80698 117.99 9.80698 79.5C9.80698 41.0096 41.0096 9.80698 79.5 9.80698C110.488 9.80698 136.752 30.031 145.814 58H156.059Z"
                                                    fill="url(#paint0_linear_62_180)" />

                                                <defs>
                                                    <linearGradient id="paint0_linear_62_180" x1="78.6428" y1="0"
                                                        x2="78.6428" y2="159" gradientUnits="userSpaceOnUse">
                                                        <stop offset="0" stop-color="#95CD2F" />
                                                        <stop offset="1" stop-color="#63911F" />
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                        </div>
                                        50
                                    </div>% Off</div>
                                <a class="upcoming-btn" href="product.html">Shop Now</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section> --}}
        <!-- end of themart-upcoming-offer-section -->

        <!-- start of themart-special-product-section -->
        <section class="themart-special-product-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="wpo-section-title">
                            <h2>Deals Of The Day</h2>
                        </div>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-lg-6 col-12">
                        <ul class="special-product">
                            <li>
                                <div class="product-item">
                                    <div class="image">
                                        <img src="{{ asset('frontend') }}/images/special-product-1.jpg" alt="">
                                    </div>
                                    <div class="text">
                                        <h2><a href="product-single.html">Jewelry Sets</a></h2>
                                        <div class="rating-product">
                                            <i class="fi flaticon-star"></i>
                                            <i class="fi flaticon-star"></i>
                                            <i class="fi flaticon-star"></i>
                                            <i class="fi flaticon-star"></i>
                                            <i class="fi flaticon-star"></i>
                                            <span>130</span>
                                        </div>
                                        <div class="price">
                                            <span class="present-price">$120.00</span>
                                            <del class="old-price">$200.00</del>
                                        </div>
                                        <div class="shop-btn">
                                            <a class="theme-btn-s2" href="product.html">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-12">
                        <ul class="special-product">
                            <li>
                                <div class="product-item">
                                    <div class="image">
                                        <img src="{{ asset('frontend') }}/images/special-product-2.jpg" alt="">
                                    </div>
                                    <div class="text">
                                        <h2><a href="product-single.html">White Shoe</a></h2>
                                        <div class="rating-product">
                                            <i class="fi flaticon-star"></i>
                                            <i class="fi flaticon-star"></i>
                                            <i class="fi flaticon-star"></i>
                                            <i class="fi flaticon-star"></i>
                                            <i class="fi flaticon-star"></i>
                                            <span>150</span>
                                        </div>
                                        <div class="price">
                                            <span class="present-price">$100.00</span>
                                            <del class="old-price">$150.00</del>
                                        </div>
                                        <div class="shop-btn">
                                            <a class="theme-btn-s2" href="product.html">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of themart-special-product-section -->

        <!-- start of themart-trendingproduct-section -->
        <section class="themart-trendingproduct-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="wpo-section-title">
                            <h2>Trending Products</h2>
                        </div>
                    </div>
                </div>
                <div class="trendin-slider owl-carousel">
                    @foreach ($products as $product)
                    <div class="product-item">
                        <div class="image">
                            <img src="{{ asset('uploads/product/previewImage') }}/{{ $product->preview_image }}" alt="">
                            @if ($product->discount)
                            <div class="tag sale">-{{ $product->discount }}%</div>
                        @else
                            <div class="tag new">New</div>
                        @endif
                        </div>
                        <div class="text">
                            <h2>
                                @if (Str::length($product->product_name)>25)
                                    <a title="{{ $product->product_name }}" href="">
                                        {{ Str::substr($product->product_name,0,25).'....' }}
                                    </a>
                                @else
                                <a title="{{ $product->product_name }}" href="">
                                    {{ $product->product_name }}
                                </a>
                                @endif
                            </h2>
                            <div class="rating-product">
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <i class="fi flaticon-star"></i>
                                <span>130</span>
                            </div>
                            <div class="price">
                                <span class="present-price">&#2547;{{ number_format($product->after_discount) }}</span>
                                <del class="old-price">&#2547;{{ number_format($product->price) }}</del>
                            </div>
                            <div class="shop-btn">
                                <a class="theme-btn-s2" href="product.html">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- end of themart-trendingproduct-section -->

        <!-- start of themart-highlight-product-section -->
        <section class="themart-highlight-product-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="highlight-wrap">
                            <h2>Top Selling</h2>
                            <div class="product-card">
                                <div class="card-image">
                                    <div class="image">
                                        <img src="{{ asset('frontend') }}/images/top-selling/1.png" alt="">
                                    </div>
                                </div>
                                <div class="content">
                                    <h3><a href="product.html">Yellow Ladies Bag </a></h3>
                                    <div class="rating-product">
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <span>130</span>
                                    </div>
                                    <div class="price">
                                        <span class="present-price">$120.00</span>
                                        <del class="old-price">$200.00</del>
                                    </div>
                                </div>
                            </div>
                            <div class="product-card">
                                <div class="card-image">
                                    <div class="image">
                                        <img src="{{ asset('frontend') }}/images/top-selling/2.png" alt="">
                                    </div>
                                </div>
                                <div class="content">
                                    <h3><a href="product.html">Pink Shoes</a></h3>
                                    <div class="rating-product">
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <span>130</span>
                                    </div>
                                    <div class="price">
                                        <span class="present-price">$120.00</span>
                                        <del class="old-price">$200.00</del>
                                    </div>
                                </div>
                            </div>
                            <div class="product-card">
                                <div class="card-image">
                                    <div class="image">
                                        <img src="{{ asset('frontend') }}/images/top-selling/3.png" alt="">
                                    </div>
                                </div>
                                <div class="content">
                                    <h3><a href="product.html">Parple Pant</a></h3>
                                    <div class="rating-product">
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <span>130</span>
                                    </div>
                                    <div class="price">
                                        <span class="present-price">$120.00</span>
                                        <del class="old-price">$200.00</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="highlight-wrap">
                            <h2>Recently added</h2>
                            @foreach ($products->take(3) as $product)
                            <div class="product-card">
                                <div class="card-image">
                                    <div class="image">
                                        <img width="100px" src="{{ asset('uploads/product/previewImage') }}/{{ $product->preview_image }}" alt="">
                                    </div>
                                </div>
                                <div class="content">
                                    <h3><a title="{{ $product->product_name }}" href="">
                                        @if (Str::length($product->product_name)>15)
                                            {{ Str::substr($product->product_name,0,15).'....' }}
                                    @else
                                        {{ $product->product_name }}
                                    @endif
                               </a>
                             </h3>
                                    <div class="rating-product">
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <span>120</span>
                                    </div>
                                    <div class="price">
                                        <span class="present-price">&#2547;{{ $product->after_discount }}</span>
                                        <del class="old-price">&#2547;{{ $product->price }}</del>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="highlight-wrap">
                            <h2>Top Rated</h2>
                            <div class="product-card">
                                <div class="card-image">
                                    <div class="image">
                                        <img src="{{ asset('frontend') }}/images/top-rated/1.png" alt="">
                                    </div>
                                </div>
                                <div class="content">
                                    <h3><a href="product.html">Kids Shoes</a></h3>
                                    <div class="rating-product">
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <span>120</span>
                                    </div>
                                    <div class="price">
                                        <span class="present-price">$120.00</span>
                                        <del class="old-price">$150.00</del>
                                    </div>
                                </div>
                            </div>
                            <div class="product-card">
                                <div class="card-image">
                                    <div class="image">
                                        <img src="{{ asset('frontend') }}/images/top-rated/2.png" alt="">
                                    </div>
                                </div>
                                <div class="content">
                                    <h3><a href="product.html">Stylish Earrings</a></h3>
                                    <div class="rating-product">
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <span>230</span>
                                    </div>
                                    <div class="price">
                                        <span class="present-price">$150.00</span>
                                        <del class="old-price">$200.00</del>
                                    </div>
                                </div>
                            </div>
                            <div class="product-card">
                                <div class="card-image">
                                    <div class="image">
                                        <img src="{{ asset('frontend') }}/images/top-rated/3.png" alt="">
                                    </div>
                                </div>
                                <div class="content">
                                    <h3><a href="product.html">Yellow Hats</a></h3>
                                    <div class="rating-product">
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <i class="fi flaticon-star"></i>
                                        <span>130</span>
                                    </div>
                                    <div class="price">
                                        <span class="present-price">$170.00</span>
                                        <del class="old-price">$250.00</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of themart-highlight-product-section -->

        <!-- start of themart-cta-section -->
        <section class="themart-cta-section section-padding" id="subscriber">
            <div class="container">
                <div class="cta-wrap">
                    <div class="row">
                        <div class="col-lg-6 col-md-8 col-12">
                            <div class="cta-content">
                                <h2>Subscribe Our Newsletter & <br>
                                    Get 30% Discounts For Next Order</h2>
                                <form action="{{ route('subscribar.store') }}" method="POST">
                                    @csrf
                                    <div class="input-1">
                                        <input type="email" class="form-control" placeholder="Your Email..."
                                            name="email">
                                        <div class="submit clearfix">
                                            <button class="theme-btn-s2" type="submit">Subscribe</button>
                                        </div>
                                    </div>
                                    @if (session('subscriber'))
                                        <div class="alert alert-info mt-2">{{ session('subscriber') }}</div>
                                    @endif
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of themart-cta-section -->
@endsection
