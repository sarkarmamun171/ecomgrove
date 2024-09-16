<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpOceans">
    <link rel="shortcut icon" type="image/png" href="{{ asset('frontend') }}/images/favicon.png">
    <title>Themart - eCommerce HTML5 Template</title>
    <link href="{{ asset('frontend') }}/css/themify-icons.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/flaticon_ecommerce.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/animate.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/owl.carousel.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/owl.theme.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/slick.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/slick-theme.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/swiper.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/owl.transitions.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/jquery.fancybox.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/odometer-theme-default.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/sass/style.css" rel="stylesheet">
    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container--default .select2-selection--single{
            padding: 4px 0 32px;
            margin-top: 10px;
        }
        .select2-container .select2-selection--single{
            height: 0px;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 10px;
        }
        .select2-container{
            display: block;
        }

        #arif{
            position: absolute;
            left: 0px;
            top: 0px;
            z-index: 999999;
        }

    </style>
</head>

<body>

    <!-- start page-wrapper -->
    <div class="page-wrapper">
        <!-- start preloader -->
        <div class="preloader">
            <div class="vertical-centered-box">
                <div class="content">
                    <div class="loader-circle"></div>
                    <div class="loader-line-mask">
                        <div class="loader-line"></div>
                    </div>
                    <img src="{{ asset('frontend') }}/images/preloader.png" alt="">
                </div>
            </div>
        </div>
        <!-- end preloader -->

        <!-- start header -->
        <header id="header">
            <div class="topbar">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="contact-intro">
                                <span>A Marketplace Initiative by Themart Theme - save more with coupons</span>
                            </div>
                        </div>
                        <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="contact-info">
                                <ul>
                                    <li><a href="tel:869968236"><span>Need help? Call Us:</span>01827 222210</a></li>
                                    <li>
                                        <div class="dropdown">
                                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                English
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><a class="dropdown-item" href="#">English</a></li>
                                                <li><a class="dropdown-item" href="#">Bangla</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown">
                                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton2"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                USD
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                                <li><a class="dropdown-item" href="#">BDT</a></li>
                                                <li><a class="dropdown-item" href="#">USD</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end topbar -->
            <!--  start header-middle -->
            <div class="header-middle">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-2">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="{{ route('index') }}"><img
                                        src="{{ asset('frontend') }}/images/logo.svg" alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="middle-box">
                                <div class="category">
                                    <select name="service" class="form-control" id="top_category">
                                        <option disabled="disabled" selected="">All Category</option>
                                        @foreach (App\Models\Category::all() as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="search-box">
                                    <div class="input-group">
                                        <input type="search" id="search_input" class="form-control" placeholder="What are you looking for?">
                                        <button class="search-btn" type="button"> <i class="fi flaticon-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="middle-right">
                                <ul>
                                    <li><a href="compare.html"><i
                                                class="fi flaticon-right-and-left"></i><span>Compare</span></a>
                                    </li>
                                    @auth('customer')
                                        <a href="{{ route('customer.profile') }}"><i
                                                class="fi flaticon-user-profile"></i><span>{{ Auth::guard('customer')->user()->fname }}</span></a>
                                    @else
                                        <a href="{{ route('customer.login') }}"><i
                                                class="fi flaticon-user-profile"></i><span>Login</span></a>
                                    @endauth
                                    <li>
                                        <div class="header-wishlist-form-wrapper">
                                            <button class="wishlist-toggle-btn"> <i class="fi flaticon-heart"></i>
                                                <span class="cart-count">3</span></button>
                                            <div class="mini-wislist-content">
                                                <button class="mini-cart-close"><i class="ti-close"></i></button>
                                                <div class="mini-cart-items">
                                                    <div class="mini-cart-item clearfix">
                                                        <div class="mini-cart-item-image">
                                                            <a href="product.html"><img
                                                                    src="{{ asset('frontend') }}/images/cart/img-1.jpg"
                                                                    alt></a>
                                                        </div>
                                                        <div class="mini-cart-item-des">
                                                            <a href="product.html">Stylish Pink Coat</a>
                                                            <span class="mini-cart-item-price">$150</span>
                                                            <span class="mini-cart-item-quantity"><a href="#"><i
                                                                        class="ti-close"></i></a></span>
                                                        </div>
                                                    </div>
                                                    <div class="mini-cart-item clearfix">
                                                        <div class="mini-cart-item-image">
                                                            <a href="product.html"><img
                                                                    src="{{ asset('frontend') }}/images/cart/img-2.jpg"
                                                                    alt></a>
                                                        </div>
                                                        <div class="mini-cart-item-des">
                                                            <a href="product.html">Blue Bag</a>
                                                            <span class="mini-cart-item-price">$120</span>
                                                            <span class="mini-cart-item-quantity"><a href="#"><i
                                                                        class="ti-close"></i></a></span>
                                                        </div>
                                                    </div>
                                                    <div class="mini-cart-item clearfix">
                                                        <div class="mini-cart-item-image">
                                                            <a href="product.html"><img
                                                                    src="{{ asset('frontend') }}/images/cart/img-3.jpg"
                                                                    alt></a>
                                                        </div>
                                                        <div class="mini-cart-item-des">
                                                            <a href="product.html">Kids Blue Shoes</a>
                                                            <span class="mini-cart-item-price">$120</span>
                                                            <span class="mini-cart-item-quantity"><a href="#"><i
                                                                        class="ti-close"></i></a></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mini-cart-action clearfix">
                                                    <div class="mini-btn">
                                                        <a href="wishlist.html" class="view-cart-btn">View
                                                            Wishlist</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="mini-cart">
                                            <button class="cart-toggle-btn"> <i class="fi flaticon-add-to-cart"></i>
                                                <span class="cart-count">{{ App\Models\Cart::where('customer_id', Auth::guard('customer')->id())->count() }}</span></button>
                                            <div class="mini-cart-content">
                                                <button class="mini-cart-close"><i class="ti-close"></i></button>
                                                <div class="mini-cart-items">
                                                    @php
                                                        $sum = 0;
                                                    @endphp
                                                    @foreach (App\Models\Cart::where('customer_id', Auth::guard('customer')->id())->get() as $cart)
                                                        <div class="mini-cart-item clearfix">
                                                            <div class="mini-cart-item-image">
                                                                <a href="product.html"><img src="{{ asset('uploads/product/previewImage') }}/{{ $cart->rel_to_product->preview_image }}" alt></a>
                                                            </div>
                                                            <div class="mini-cart-item-des" title="{{ $cart->rel_to_product->product_name }}">
                                                                <a href="product.html">{{ Str::substr($cart->rel_to_product->product_name, 0, 20).'...' }}</a>
                                                                <div class="d-flex">
                                                                    <span class="mini-cart-item-price">
                                                                        Color:{{ $cart->rel_to_color->color_name }}
                                                                    </span>&nbsp;&nbsp;
                                                                    <span class="mini-cart-item-price">
                                                                        Size:{{ $cart->rel_to_size->size_name }}
                                                                    </span>
                                                                </div>
                                                                <span class="mini-cart-item-price">{{ $cart->rel_to_product->after_discount }} x {{ $cart->quantity }}</span>

                                                                <span class="mini-cart-item-quantity">
                                                                    <a href="{{ route('cart.remove',$cart->id) }}"><i
                                                                            class="ti-close"></i></a></span>
                                                            </div>
                                                        </div>
                                                        @php
                                                            $sum +=$cart->rel_to_product->after_discount*$cart->quantity;
                                                        @endphp
                                                        @endforeach
                                                </div>
                                                <div class="mini-cart-action clearfix">
                                                    <span class="mini-checkout-price">Subtotal:
                                                        <span>
                                                            &#2547; {{ $sum}}
                                                        </span></span>
                                                    <div class="mini-btn">
                                                        <a href="{{ route('cart') }}" class="view-cart-btn">View Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  end header-middle -->
            <div class="wpo-site-header">
                <nav class="navigation navbar navbar-expand-lg navbar-light">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3 d-lg-none dl-block">
                                <div class="mobail-menu">
                                    <button type="button" class="navbar-toggler open-btn">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar first-angle"></span>
                                        <span class="icon-bar middle-angle"></span>
                                        <span class="icon-bar last-angle"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-6 col-sm-5 col-6 d-block d-lg-none">
                                <div class="navbar-header">
                                    <a class="navbar-brand" href="index.html"><img
                                            src="{{ asset('frontend') }}/images/logo.svg" alt="logo"></a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-3">
                                <div class="header-shop-item">
                                    <button class="header-shop-toggle-btn"><span>Shop By Category</span> </button>
                                    <div class="mini-shop-item">
                                        <ul id="metis-menu">
                                            @foreach (App\Models\Category::all() as $category)
                                                <li class="header-catagory-item">
                                                    <a class="menu-down-{{ App\Models\Subcategory::where('category_id', $category->id)->count() == 0 ? '' : 'arrow' }}"
                                                        href="#">{{ $category->category_name }}</a>
                                                    <ul class="header-catagory-single">
                                                        @foreach (App\Models\Subcategory::where('category_id', $category->id)->get() as $subcategory)
                                                            <li><a
                                                                    href="{{ route('subcategory.product', $subcategory->id) }}">{{ $subcategory->subcategory_name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-1 col-1">
                                <div id="navbar" class="collapse navbar-collapse navigation-holder">
                                    <button class="menu-close"><i class="ti-close"></i></button>
                                    <ul class="nav navbar-nav mb-2 mb-lg-0">
                                        <li class="menu-item-has-children">
                                            <a href="{{ route('index') }}">Home</a>
                                        </li>
                                        <li><a href="{{ route('about') }}">About</a></li>
                                        <li class="menu-item-has-children">
                                            <a href="{{ route('shop') }}">Shop</a>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="{{ route('faq') }}">FAQ</a>
                                        </li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>

                                </div><!-- end of nav-collapse -->
                            </div>
                            <div class="col-lg-2 col-md-1 col-1">
                                <div class="header-right">
                                    <a href="{{ route('recent.view') }}" class="recent-btn"><i class="fi flaticon-refresh"></i>
                                        <span>Recently Viewed</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div><!-- end of container -->
                </nav>
            </div>
        </header>
        @yield('content')
        <!-- start of wpo-site-footer-section -->
        <footer class="wpo-site-footer">
            <div class="wpo-upper-footer">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="widget about-widget">
                                <div class="logo widget-title">
                                    <img src="{{ asset('frontend') }}/images/logo-2.svg" alt="blog">
                                </div>
                                <p>Elit commodo nec urna erat morbi at hac turpis aliquam.
                                    In tristique elit nibh turpis. Lacus volutpat ipsum convallis tellus pellentesque
                                    etiam.</p>
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-twitter-alt"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-linkedin"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-instagram"></i>
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                        <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="widget link-widget">
                                <div class="widget-title">
                                    <h3>Contact Us</h3>
                                </div>
                                <div class="contact-ft">
                                    <ul>
                                        <li><i class="fi flaticon-mail"></i>themart@gmail.com</li>
                                        <li><i class="fi flaticon-phone"></i>(208) 555-0112 <br>(704) 555-0127</li>
                                        <li><i class="fi flaticon-pin"></i>4517 Washington Ave. Manchter,
                                            Kentucky 495</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col col-xl-3 col-lg-2 col-md-6 col-sm-12 col-12">
                            <div class="widget link-widget">
                                <div class="widget-title">
                                    <h3>Popular</h3>
                                </div>
                                <ul>
                                    <li><a href="product.html">Men</a></li>
                                    <li><a href="product.html">Women</a></li>
                                    <li><a href="product.html">Kids</a></li>
                                    <li><a href="product.html">Shoe</a></li>
                                    <li><a href="product.html">Jewelry</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="widget instagram">
                                <div class="widget-title">
                                    <h3>Instagram</h3>
                                </div>
                                <ul class="d-flex">
                                    <li><a href="project-single.html"><img
                                                src="{{ asset('frontend') }}/images/instragram/1.jpg"
                                                alt=""></a></li>
                                    <li><a href="project-single.html"><img
                                                src="{{ asset('frontend') }}/images/instragram/2.jpg"
                                                alt=""></a></li>
                                    <li><a href="project-single.html"><img
                                                src="{{ asset('frontend') }}/images/instragram/4.jpg"
                                                alt=""></a></li>
                                    <li><a href="project-single.html"><img
                                                src="{{ asset('frontend') }}/images/instragram/3.jpg"
                                                alt=""></a></li>
                                    <li><a href="project-single.html"><img
                                                src="{{ asset('frontend') }}/images/instragram/4.jpg"
                                                alt=""></a></li>
                                    <li><a href="project-single.html"><img
                                                src="{{ asset('frontend') }}/images/instragram/1.jpg"
                                                alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> <!-- end container -->
            </div>
            <div class="wpo-lower-footer">
                <div class="container">
                    <div class="row">
                        <div class="col col-xs-12">
                            <p class="copyright"> Copyright &copy; 2023 Themart by <a href="index.html">wpOceans</a>.
                                All
                                Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end of wpo-site-footer-section -->
    </div>
    <!-- end of page-wrapper -->

    <!-- All JavaScript files -->
    <script src="{{ asset('frontend') }}/js/jquery.min.js"></script>
    <script src="{{ asset('frontend') }}/js/bootstrap.bundle.min.js"></script>
    <!-- Plugins for this template -->
    <script src="{{ asset('frontend') }}/js/modernizr.custom.js"></script>
    <script src="{{ asset('frontend') }}/js/jquery.dlmenu.js"></script>
    <script src="{{ asset('frontend') }}/js/jquery-plugin-collection.js"></script>
    <!-- Custom script for this template -->
    <script src="{{ asset('frontend') }}/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- select 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @yield('footer_script')
    <script>
        $('.search-btn').click(function(){
            var top_catid = $('#top_cat').val();
            var search_input = $('#search_input').val();
            var category_id = $("input[type='radio'][name='category_id']:checked").val();
            var color_id = $("input[type='radio'][name='color_id']:checked").val();
            var size_id = $("input[type='radio'][name='size_id']:checked").val();
            var tag_id = $("input[type='radio'][name='tag_id']:checked").val();
            var min = $('#min').val();
            var max = $('#max').val();
            var sorting = $('.sorting').val();
            var link = "{{ route('shop') }}"+"?search_input="+search_input+"&category_id="+category_id+"&min="+min+"&max="+max+"&sorting="+sorting+"&top_catid="+top_catid+"&color_id="+color_id+"&size_id="+size_id+"&tag_id="+tag_id;
            window.location.href = link;
        })
        $('.category_id').click(function(){
            var top_catid = $('#top_cat').val();
            var search_input = $('#search_input').val();
            var category_id = $("input[type='radio'][name='category_id']:checked").val();
            var color_id = $("input[type='radio'][name='color_id']:checked").val();
            var size_id = $("input[type='radio'][name='size_id']:checked").val();
            var tag_id = $("input[type='radio'][name='tag_id']:checked").val();
            var min = $('#min').val();
            var max = $('#max').val();
            var sorting = $('.sorting').val();
            var link = "{{ route('shop') }}"+"?search_input="+search_input+"&category_id="+category_id+"&min="+min+"&max="+max+"&sorting="+sorting+"&top_catid="+top_catid+"&color_id="+color_id+"&size_id="+size_id+"&tag_id="+tag_id;
            window.location.href = link;
        })
        $('#price_range').click(function(){
            var top_catid = $('#top_cat').val();
            var search_input = $('#search_input').val();
            var category_id = $("input[type='radio'][name='category_id']:checked").val();
            var color_id = $("input[type='radio'][name='color_id']:checked").val();
            var size_id = $("input[type='radio'][name='size_id']:checked").val();
            var tag_id = $("input[type='radio'][name='tag_id']:checked").val();
            var min = $('#min').val();
            var max = $('#max').val();
            var sorting = $('.sorting').val();
            var link = "{{ route('shop') }}"+"?search_input="+search_input+"&category_id="+category_id+"&min="+min+"&max="+max+"&sorting="+sorting+"&top_catid="+top_catid+"&color_id="+color_id+"&size_id="+size_id+"&tag_id="+tag_id;
            window.location.href = link;
        })
        $('#color_id').click(function(){
            var top_catid = $('#top_cat').val();
            var search_input = $('#search_input').val();
            var category_id = $("input[type='radio'][name='category_id']:checked").val();
            var color_id = $("input[type='radio'][name='color_id']:checked").val();
            var size_id = $("input[type='radio'][name='size_id']:checked").val();
            var tag_id = $("input[type='radio'][name='tag_id']:checked").val();
            var min = $('#min').val();
            var max = $('#max').val();
            var sorting = $('.sorting').val();
            var link = "{{ route('shop') }}"+"?search_input="+search_input+"&category_id="+category_id+"&min="+min+"&max="+max+"&sorting="+sorting+"&top_catid="+top_catid+"&color_id="+color_id+"&size_id="+size_id+"&tag_id="+tag_id;
            window.location.href = link;
        })
        $('#size_id').click(function(){
            var top_catid = $('#top_cat').val();
            var search_input = $('#search_input').val();
            var category_id = $("input[type='radio'][name='category_id']:checked").val();
            var color_id = $("input[type='radio'][name='color_id']:checked").val();
            var size_id = $("input[type='radio'][name='size_id']:checked").val();
            var tag_id = $("input[type='radio'][name='tag_id']:checked").val();
            var min = $('#min').val();
            var max = $('#max').val();
            var sorting = $('.sorting').val();
            var link = "{{ route('shop') }}"+"?search_input="+search_input+"&category_id="+category_id+"&min="+min+"&max="+max+"&sorting="+sorting+"&top_catid="+top_catid+"&color_id="+color_id+"&size_id="+size_id+"&tag_id="+tag_id;
            window.location.href = link;
        })
        $('.sorting').change(function(){
            var top_catid = $('#top_cat').val();
            var search_input = $('#search_input').val();
            var category_id = $("input[type='radio'][name='category_id']:checked").val();
            var color_id = $("input[type='radio'][name='color_id']:checked").val();
            var size_id = $("input[type='radio'][name='size_id']:checked").val();
            var tag_id = $("input[type='radio'][name='tag_id']:checked").val();
            var min = $('#min').val();
            var max = $('#max').val();
            var sorting = $('.sorting').val();
            var link = "{{ route('shop') }}"+"?search_input="+search_input+"&category_id="+category_id+"&min="+min+"&max="+max+"&sorting="+sorting+"&top_catid="+top_catid+"&color_id="+color_id+"&size_id="+size_id+"&tag_id="+tag_id;
            window.location.href = link;
        })
        $('.tag_id').change(function(){
            var top_catid = $('#top_cat').val();
            var search_input = $('#search_input').val();
            var category_id = $("input[type='radio'][name='category_id']:checked").val();
            var color_id = $("input[type='radio'][name='color_id']:checked").val();
            var size_id = $("input[type='radio'][name='size_id']:checked").val();
            var tag_id = $("input[type='radio'][name='tag_id']:checked").val();
            var min = $('#min').val();
            var max = $('#max').val();
            var sorting = $('.sorting').val();
            var link = "{{ route('shop') }}"+"?search_input="+search_input+"&category_id="+category_id+"&min="+min+"&max="+max+"&sorting="+sorting+"&top_catid="+top_catid+"&color_id="+color_id+"&size_id="+size_id+"&tag_id="+tag_id;
            window.location.href = link;
        })

        $('.search-btn2').click(function(){
            var search_input2 = $('#search_input2').val();
            var link = "{{ route('shop') }}"+"?search_input="+search_input2;
            window.location.href = link;
        })
    </script>
</body>

</html>
