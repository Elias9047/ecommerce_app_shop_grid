@extends('frontEnd.master')




@section('content')


<header class="header navbar-area">
<div class="topbar">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-4 col-md-4 col-12">
<div class="top-left">
<ul class="menu-top-link">
<li>
<div class="select-position">
<select id="select4">
<option value="0" selected>$ USD</option>
<option value="1">€ EURO</option>
<option value="2">$ CAD</option>
<option value="3">₹ INR</option>
<option value="4">¥ CNY</option>
<option value="5">৳ BDT</option>
</select>
</div>
</li>
<li>
<div class="select-position">
<select id="select5">
<option value="0" selected>English</option>
<option value="1">Español</option>
<option value="2">Filipino</option>
<option value="3">Français</option>
<option value="4">العربية</option>
<option value="5">हिन्दी</option>
<option value="6">বাংলা</option>
</select>
</div>
</li>
</ul>
</div>
</div>
<div class="col-lg-4 col-md-4 col-12">
<div class="top-middle">
<ul class="useful-links">
<li><a href="index.html">Home</a></li>
<li><a href="about-us.html">About Us</a></li>
<li><a href="contact.html">Contact Us</a></li>
</ul>
</div>
</div>
<div class="col-lg-4 col-md-4 col-12">
<div class="top-end">
<div class="user">
<i class="lni lni-user"></i>
Hello
</div>
<ul class="user-login">
<li>
<a href="login.html">Sign In</a>
</li>
<li>
<a href="register.html">Register</a>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>


<div class="header-middle">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-3 col-md-3 col-7">

<a class="navbar-brand" href="index.html">
<img src="{{asset('/')}}frontEnd/assets/images/logo/logo.svg" alt="Logo">
</a>

</div>
<div class="col-lg-5 col-md-7 d-xs-none">

<div class="main-menu-search">

<div class="navbar-search search-style-5">
<div class="search-select">
<div class="select-position">
<select id="select1">
<option selected>All</option>
<option value="1">option 01</option>
<option value="2">option 02</option>
<option value="3">option 03</option>
<option value="4">option 04</option>
<option value="5">option 05</option>
</select>
</div>
</div>
<div class="search-input">
<input type="text" placeholder="Search">
</div>
<div class="search-btn">
<button><i class="lni lni-search-alt"></i></button>
</div>
</div>

</div>

</div>
<div class="col-lg-4 col-md-2 col-5">
<div class="middle-right-area">
<div class="nav-hotline">
<i class="lni lni-phone"></i>
<h3>Hotline:
<span>(+100) 123 456 7890</span>
</h3>
</div>
<div class="navbar-cart">
<div class="wishlist">
<a href="javascript:void(0)">
<i class="lni lni-heart"></i>
<span class="total-items">0</span>
</a>
</div>
<div class="cart-items">
<a href="javascript:void(0)" class="main-btn">
<i class="lni lni-cart"></i>
 <span class="total-items">2</span>
</a>

<div class="shopping-item">
<div class="dropdown-cart-header">
<span>2 Items</span>
<a href="cart.html">View Cart</a>
</div>
<ul class="shopping-list">
<li>
<a href="javascript:void(0)" class="remove" title="Remove this item"><i class="lni lni-close"></i></a>
<div class="cart-img-head">
<a class="cart-img" href="product-details.html"><img src="{{ asset('/')}}frontEnd/assets/images/header/cart-items/item1.jpg" alt="#"></a>
</div>
<div class="content">
<h4><a href="product-details.html">
Apple Watch Series 6</a></h4>
<p class="quantity">1x - <span class="amount">$99.00</span></p>
</div>
</li>
<li>
<a href="javascript:void(0)" class="remove" title="Remove this item"><i class="lni lni-close"></i></a>
<div class="cart-img-head">
<a class="cart-img" href="product-details.html"><img src="{{ asset('/')}}frontEnd/assets/images/header/cart-items/item2.jpg" alt="#"></a>
</div>
<div class="content">
<h4><a href="product-details.html">Wi-Fi Smart Camera</a></h4>
<p class="quantity">1x - <span class="amount">$35.00</span></p>
</div>
</li>
</ul>
<div class="bottom">
<div class="total">
<span>Total</span>
<span class="total-amount">$134.00</span>
</div>
<div class="button">
<a href="checkout.html" class="btn animate">Checkout</a>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="container">
<div class="row align-items-center">
<div class="col-lg-8 col-md-6 col-12">
<div class="nav-inner">

<div class="mega-category-menu">
    <span class="cat-button">
        <i class="lni lni-menu"></i> All Categories
    </span>
    <ul class="sub-category">
        @foreach ($categories as $category)
            <li>
                <a href="{{ route('category_product',['id'=>$category->id])}}">
                    {{ $category->category_name }}
                    <i class="lni lni-chevron-right"></i>
                </a>

                {{-- Inner Sub Category --}}
                <ul class="inner-sub-category">
                    @foreach ($sub_categories as $sub_category)
                        @if ($sub_category->category_id == $category->id) 
                            <li>
                                <a href="{{ route('subCategory_product',['id'=>$sub_category->id])}}">
                                    {{ $sub_category->sub_category_name }}
                                    <i class="lni lni-chevron-right"></i>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</div>



<nav class="navbar navbar-expand-lg">
<button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="toggler-icon"></span>
<span class="toggler-icon"></span>
<span class="toggler-icon"></span>
</button>
<div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
<ul id="nav" class="navbar-nav ms-auto">
<li class="nav-item">
<a href="index.html" class="active" aria-label="Toggle navigation">Home</a>
</li>
<li class="nav-item">
<a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-2" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Pages</a>
<ul class="sub-menu collapse" id="submenu-1-2">
<li class="nav-item"><a href="about-us.html">About Us</a></li>
 <li class="nav-item"><a href="faq.html">Faq</a></li>
<li class="nav-item"><a href="login.html">Login</a></li>
<li class="nav-item"><a href="register.html">Register</a></li>
<li class="nav-item"><a href="mail-success.html">Mail Success</a></li>
<li class="nav-item"><a href="404.html">404 Error</a></li>
</ul>
</li>
<li class="nav-item">
<a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-3" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Shop</a>
<ul class="sub-menu collapse" id="submenu-1-3">
<li class="nav-item"><a href="product-grids.html">Shop Grid</a></li>
<li class="nav-item"><a href="product-list.html">Shop List</a></li>
<li class="nav-item"><a href="product-details.html">shop Single</a></li>
<li class="nav-item"><a href="cart.html">Cart</a></li>
<li class="nav-item"><a href="checkout.html">Checkout</a></li>
</ul>
</li>
<li class="nav-item">
<a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-4" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Blog</a>
<ul class="sub-menu collapse" id="submenu-1-4">
<li class="nav-item"><a href="blog-grid-sidebar.html">Blog Grid Sidebar</a>
</li>
<li class="nav-item"><a href="blog-single.html">Blog Single</a></li>
<li class="nav-item"><a href="blog-single-sidebar.html">Blog Single
Sibebar</a></li>
</ul>
</li>
<li class="nav-item">
<a href="contact.html" aria-label="Toggle navigation">Contact Us</a>
</li>
</ul>
</div>
</nav>

</div>
</div>
<div class="col-lg-4 col-md-6 col-12">

<div class="nav-social">
<h5 class="title">Follow Us:</h5>
<ul>
<li>
<a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
</li>
<li>
<a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
</li>
<li>
<a href="javascript:void(0)"><i class="lni lni-instagram"></i></a>
</li>
<li>
<a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
</li>
</ul>
</div>

</div>
</div>
</div>

</header>


<section class="hero-area">
<div class="container">
<div class="row">
<div class="col-lg-8 col-12 custom-padding-right">
<div class="slider-head">

<div class="hero-slider">

<div class="single-slider" style="background-image: url({{ asset('/')}}frontEnd/assets/images/hero/slider-bg1.jpg);">
<div class="content">
<h2><span>No restocking fee ($35 savings)</span>
M75 Sport Watch
</h2>
<p>Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut
labore dolore magna aliqua.</p>
<h3><span>Now Only</span> $320.99</h3>
<div class="button">
<a href="product-grids.html" class="btn">Shop Now</a>
</div>
</div>
</div>


<div class="single-slider" style="background-image: url({{ asset('/')}}frontEnd/assets/images/hero/slider-bg2.jpg);">
<div class="content">
<h2><span>Big Sale Offer</span>
Get the Best Deal on CCTV Camera
</h2>
<p>Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut
labore dolore magna aliqua.</p>
<h3><span>Combo Only:</span> $590.00</h3>
<div class="button">
<a href="product-grids.html" class="btn">Shop Now</a>
</div>
</div>
</div>

</div>

</div>
</div>
<div class="col-lg-4 col-12">
<div class="row">
<div class="col-lg-12 col-md-6 col-12 md-custom-padding">

<div class="hero-small-banner" style="background-image: url('{{ asset('/')}}frontEnd/assets/images/hero/slider-bnr.jpg');">
<div class="content">
<h2>
<span>New line required</span>
iPhone 12 Pro Max
</h2>
<h3>$259.99</h3>
</div>
</div>

</div>
<div class="col-lg-12 col-md-6 col-12">

<div class="hero-small-banner style2">
<div class="content">
<h2>Weekly Sale!</h2>
 <p>Saving up to 50% off all online store items this week.</p>
<div class="button">
<a class="btn" href="product-grids.html">Shop Now</a>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>
</section>


<section class="featured-categories section">
<div class="container">
<div class="row">
<div class="col-12">
<div class="section-title">
<h2>Featured Categories</h2>
<p>There are many variations of passages of Lorem Ipsum available, but the majority have
suffered alteration in some form.</p>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-4 col-md-6 col-12">

<div class="single-category">
<h3 class="heading">TV & Audios</h3>
<ul>
<li><a href="product-grids.html">Smart Television</a></li>
<li><a href="product-grids.html">QLED TV</a></li>
<li><a href="product-grids.html">Audios</a></li>
<li><a href="product-grids.html">Headphones</a></li>
<li><a href="product-grids.html">View All</a></li>
</ul>
<div class="images">
<img src="{{ asset('/')}}frontEnd/assets/images/featured-categories/fetured-item-1.png" alt="#">
</div>
</div>

</div>
<div class="col-lg-4 col-md-6 col-12">

<div class="single-category">
<h3 class="heading">Desktop & Laptop</h3>
<ul>
<li><a href="product-grids.html">Smart Television</a></li>
<li><a href="product-grids.html">QLED TV</a></li>
<li><a href="product-grids.html">Audios</a></li>
<li><a href="product-grids.html">Headphones</a></li>
<li><a href="product-grids.html">View All</a></li>
</ul>
<div class="images">
<img src="{{ asset('/')}}frontEnd/assets/images/featured-categories/fetured-item-2.png" alt="#">
</div>
</div>

</div>
<div class="col-lg-4 col-md-6 col-12">

<div class="single-category">
<h3 class="heading">Cctv Camera</h3>
<ul>
<li><a href="product-grids.html">Smart Television</a></li>
<li><a href="product-grids.html">QLED TV</a></li>
<li><a href="product-grids.html">Audios</a></li>
<li><a href="product-grids.html">Headphones</a></li>
<li><a href="product-grids.html">View All</a></li>
</ul>
<div class="images">
<img src="{{ asset('/')}}frontEnd/assets/images/featured-categories/fetured-item-3.png" alt="#">
</div>
</div>

</div>
<div class="col-lg-4 col-md-6 col-12">

<div class="single-category">
<h3 class="heading">Dslr Camera</h3>
<ul>
<li><a href="product-grids.html">Smart Television</a></li>
<li><a href="product-grids.html">QLED TV</a></li>
<li><a href="product-grids.html">Audios</a></li>
<li><a href="product-grids.html">Headphones</a></li>
<li><a href="product-grids.html">View All</a></li>
</ul>
<div class="images">
<img src="{{ asset('/')}}frontEnd/assets/images/featured-categories/fetured-item-4.png" alt="#">
</div>
</div>

</div>
<div class="col-lg-4 col-md-6 col-12">

<div class="single-category">
<h3 class="heading">Smart Phones</h3>
<ul>
<li><a href="product-grids.html">Smart Television</a></li>
<li><a href="product-grids.html">QLED TV</a></li>
<li><a href="product-grids.html">Audios</a></li>
<li><a href="product-grids.html">Headphones</a></li>
<li><a href="product-grids.html">View All</a></li>
</ul>
<div class="images">
<img src="{{ asset('/')}}frontEnd/assets/images/featured-categories/fetured-item-5.png" alt="#">
</div>
</div>

</div>
<div class="col-lg-4 col-md-6 col-12">

<div class="single-category">
<h3 class="heading">Game Console</h3>
<ul>
<li><a href="product-grids.html">Smart Television</a></li>
<li><a href="product-grids.html">QLED TV</a></li>
<li><a href="product-grids.html">Audios</a></li>
<li><a href="product-grids.html">Headphones</a></li>
<li><a href="product-grids.html">View All</a></li>
</ul>
<div class="images">
<img src="{{ asset('/')}}frontEnd/assets/images/featured-categories/fetured-item-6.png" alt="#">
</div>
</div>

</div>
</div>
</div>
</section>


<section class="trending-product section">
<div class="container">
<div class="row">
<div class="col-12">
<div class="section-title">
<h2>Trending Product</h2>
<p>There are many variations of passages of Lorem Ipsum available, but the majority have
suffered alteration in some form.</p>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-3 col-md-6 col-12">

<div class="single-product">
<div class="product-image">
<img src="{{ asset('/')}}frontEnd/assets/images/products/product-1.jpg" alt="#">
<div class="button">
<a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
</div>
</div>
 <div class="product-info">
<span class="category">Watches</span>
<h4 class="title">
<a href="product-grids.html">Xiaomi Mi Band 5</a>
</h4>
<ul class="review">
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star"></i></li>
<li><span>4.0 Review(s)</span></li>
</ul>
<div class="price">
<span>$199.00</span>
</div>
</div>
</div>

</div>
<div class="col-lg-3 col-md-6 col-12">

<div class="single-product">
<div class="product-image">
<img src="{{ asset('/')}}frontEnd/assets/images/products/product-2.jpg" alt="#">
<span class="sale-tag">-25%</span>
<div class="button">
<a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
</div>
</div>
<div class="product-info">
<span class="category">Speaker</span>
<h4 class="title">
<a href="product-grids.html">Big Power Sound Speaker</a>
</h4>
<ul class="review">
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><span>5.0 Review(s)</span></li>
</ul>
<div class="price">
<span>$275.00</span>
<span class="discount-price">$300.00</span>
</div>
</div>
</div>

</div>
<div class="col-lg-3 col-md-6 col-12">

<div class="single-product">
<div class="product-image">
<img src="{{ asset('/')}}frontEnd/assets/images/products/product-3.jpg" alt="#">
<div class="button">
<a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
</div>
</div>
<div class="product-info">
<span class="category">Camera</span>
<h4 class="title">
<a href="product-grids.html">WiFi Security Camera</a>
</h4>
<ul class="review">
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><span>5.0 Review(s)</span></li>
</ul>
<div class="price">
<span>$399.00</span>
</div>
</div>
</div>

</div>
<div class="col-lg-3 col-md-6 col-12">

<div class="single-product">
<div class="product-image">
<img src="{{ asset('/')}}frontEnd/assets/images/products/product-4.jpg" alt="#">
<span class="new-tag">New</span>
<div class="button">
<a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
</div>
</div>
<div class="product-info">
<span class="category">Phones</span>
<h4 class="title">
<a href="product-grids.html">iphone 6x plus</a>
</h4>
<ul class="review">
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><span>5.0 Review(s)</span></li>
</ul>
<div class="price">
<span>$400.00</span>
</div>
</div>
</div>

</div>
<div class="col-lg-3 col-md-6 col-12">

<div class="single-product">
<div class="product-image">
<img src="{{ asset('/')}}frontEnd/assets/images/products/product-5.jpg" alt="#">
<div class="button">
<a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
</div>
</div>
<div class="product-info">
<span class="category">Headphones</span>
<h4 class="title">
<a href="product-grids.html">Wireless Headphones</a>
</h4>
<ul class="review">
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><span>5.0 Review(s)</span></li>
</ul>
<div class="price">
<span>$350.00</span>
</div>
</div>
</div>

</div>
<div class="col-lg-3 col-md-6 col-12">

<div class="single-product">
<div class="product-image">
<img src="{{ asset('/')}}frontEnd/assets/images/products/product-6.jpg" alt="#">
<div class="button">
 <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
</div>
</div>
<div class="product-info">
<span class="category">Speaker</span>
<h4 class="title">
<a href="product-grids.html">Mini Bluetooth Speaker</a>
</h4>
<ul class="review">
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star"></i></li>
<li><span>4.0 Review(s)</span></li>
</ul>
<div class="price">
<span>$70.00</span>
</div>
</div>
</div>

</div>
<div class="col-lg-3 col-md-6 col-12">

<div class="single-product">
<div class="product-image">
<img src="{{ asset('/')}}frontEnd/assets/images/products/product-7.jpg" alt="#">
<span class="sale-tag">-50%</span>
<div class="button">
<a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
</div>
</div>
<div class="product-info">
<span class="category">Headphones</span>
<h4 class="title">
<a href="product-grids.html">PX7 Wireless Headphones</a>
</h4>
<ul class="review">
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star"></i></li>
<li><span>4.0 Review(s)</span></li>
</ul>
<div class="price">
<span>$100.00</span>
<span class="discount-price">$200.00</span>
</div>
</div>
</div>

</div>
<div class="col-lg-3 col-md-6 col-12">

<div class="single-product">
<div class="product-image">
<img src="{{ asset('/')}}frontEnd/assets/images/products/product-8.jpg" alt="#">
<div class="button">
<a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
</div>
</div>
<div class="product-info">
<span class="category">Laptop</span>
<h4 class="title">
<a href="product-grids.html">Apple MacBook Air</a>
</h4>
<ul class="review">
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
 <li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><span>5.0 Review(s)</span></li>
</ul>
<div class="price">
<span>$899.00</span>
</div>
</div>
</div>

</div>
</div>
</div>
</section>


<section class="banner section">
<div class="container">
<div class="row">
<div class="col-lg-6 col-md-6 col-12">
<div class="single-banner" style="background-image:url('{{ asset('/')}}frontEnd/assets/images/banner/banner-1-bg.jpg')">
<div class="content">
<h2>Smart Watch 2.0</h2>
<p>Space Gray Aluminum Case with <br>Black/Volt Real Sport Band </p>
<div class="button">
<a href="product-grids.html" class="btn">View Details</a>
</div>
</div>
</div>
</div>
<div class="col-lg-6 col-md-6 col-12">
<div class="single-banner custom-responsive-margin" style="background-image:url('{{ asset('/')}}frontEnd/assets/images/banner/banner-2-bg.jpg')">
<div class="content">
<h2>Smart Headphone</h2>
<p>Lorem ipsum dolor sit amet, <br>eiusmod tempor
incididunt ut labore.</p>
<div class="button">
<a href="product-grids.html" class="btn">Shop Now</a>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


<section class="special-offer section">
<div class="container">
<div class="row">
<div class="col-12">
<div class="section-title">
<h2>Special Offer</h2>
<p>There are many variations of passages of Lorem Ipsum available, but the majority have
suffered alteration in some form.</p>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-8 col-md-12 col-12">
<div class="row">
<div class="col-lg-4 col-md-4 col-12">

<div class="single-product">
<div class="product-image">
<img src="{{ asset('/')}}frontEnd/assets/images/products/product-3.jpg" alt="#">
<div class="button">
<a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
Cart</a>
</div>
</div>
<div class="product-info">
<span class="category">Camera</span>
<h4 class="title">
<a href="product-grids.html">WiFi Security Camera</a>
</h4>
<ul class="review">
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><span>5.0 Review(s)</span></li>
</ul>
<div class="price">
<span>$399.00</span>
</div>
</div>
</div>

</div>
<div class="col-lg-4 col-md-4 col-12">

<div class="single-product">
<div class="product-image">
<img src="{{ asset('/')}}frontEnd/assets/images/products/product-8.jpg" alt="#">
<div class="button">
<a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
Cart</a>
</div>
</div>
<div class="product-info">
<span class="category">Laptop</span>
<h4 class="title">
<a href="product-grids.html">Apple MacBook Air</a>
</h4>
<ul class="review">
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><span>5.0 Review(s)</span></li>
</ul>
<div class="price">
<span>$899.00</span>
</div>
</div>
</div>

</div>
<div class="col-lg-4 col-md-4 col-12">

<div class="single-product">
<div class="product-image">
<img src="{{ asset('/')}}frontEnd/assets/images/products/product-6.jpg" alt="#">
<div class="button">
<a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
Cart</a>
</div>
</div>
<div class="product-info">
<span class="category">Speaker</span>
<h4 class="title">
<a href="product-grids.html">Bluetooth Speaker</a>
</h4>
<ul class="review">
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star"></i></li>
<li><span>4.0 Review(s)</span></li>
</ul>
<div class="price">
<span>$70.00</span>
</div>
</div>
</div>

</div>
</div>

<div class="single-banner right" style="background-image:url('{{ asset('/')}}frontEnd/assets/images/banner/banner-3-bg.jpg');margin-top: 30px;">
<div class="content">
<h2>Samsung Notebook 9 </h2>
<p>Lorem ipsum dolor sit amet, <br>eiusmod tempor
incididunt ut labore.</p>
<div class="price">
<span>$590.00</span>
</div>
<div class="button">
<a href="product-grids.html" class="btn">Shop Now</a>
</div>
</div>
</div>

</div>
<div class="col-lg-4 col-md-12 col-12">
<div class="offer-content">
<div class="image">
<img src="{{ asset('/')}}frontEnd/assets/images/offer/offer-image.jpg" alt="#">
<span class="sale-tag">-50%</span>
</div>
<div class="text">
<h2><a href="product-grids.html">Bluetooth Headphone</a></h2>
<ul class="review">
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><i class="lni lni-star-filled"></i></li>
<li><span>5.0 Review(s)</span></li>
</ul>
<div class="price">
<span>$200.00</span>
<span class="discount-price">$400.00</span>
</div>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry incididunt ut
eiusmod tempor labores.</p>
</div>
<div class="box-head">
<div class="box">
<h1 id="days">000</h1>
<h2 id="daystxt">Days</h2>
</div>
<div class="box">
<h1 id="hours">00</h1>
<h2 id="hourstxt">Hours</h2>
</div>
<div class="box">
<h1 id="minutes">00</h1>
<h2 id="minutestxt">Minutes</h2>
</div>
<div class="box">
<h1 id="seconds">00</h1>
<h2 id="secondstxt">Secondes</h2>
</div>
</div>
<div style="background: rgb(204, 24, 24);" class="alert">
<h1 style="padding: 50px 80px;color: white;">We are sorry, Event ended ! </h1>
</div>
</div>
</div>
</div>
</div>
</section>


<section class="home-product-list section">
<div class="container">
<div class="row">
<div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
<h4 class="list-title">Best Sellers</h4>

<div class="single-list">
<div class="list-image">
<a href="product-grids.html"><img src="{{ asset('/')}}frontEnd/assets/images/home-product-list/01.jpg" alt="#"></a>
</div>
<div class="list-info">
<h3>
<a href="product-grids.html">GoPro Hero4 Silver</a>
</h3>
<span>$287.99</span>
</div>
</div>


<div class="single-list">
<div class="list-image">
<a href="product-grids.html"><img src="{{ asset('/')}}frontEnd/assets/images/home-product-list/02.jpg" alt="#"></a>
</div>
<div class="list-info">
<h3>
<a href="product-grids.html">Puro Sound Labs BT2200</a>
</h3>
<span>$95.00</span>
</div>
</div>


<div class="single-list">
<div class="list-image">
<a href="product-grids.html"><img src="{{ asset('/')}}frontEnd/assets/images/home-product-list/03.jpg" alt="#"></a>
</div>
<div class="list-info">
<h3>
<a href="product-grids.html">HP OfficeJet Pro 8710</a>
</h3>
<span>$120.00</span>
</div>
</div>

</div>
<div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
<h4 class="list-title">New Arrivals</h4>

<div class="single-list">
<div class="list-image">
<a href="product-grids.html"><img src="{{ asset('/')}}frontEnd/assets/images/home-product-list/04.jpg" alt="#"></a>
</div>
<div class="list-info">
<h3>
<a href="product-grids.html">iPhone X 256 GB Space Gray</a>
</h3>
<span>$1150.00</span>
</div>
</div>


<div class="single-list">
<div class="list-image">
<a href="product-grids.html"><img src="{{ asset('/')}}frontEnd/assets/images/home-product-list/05.jpg" alt="#"></a>
</div>
<div class="list-info">
<h3>
<a href="product-grids.html">Canon EOS M50 Mirrorless Camera</a>
</h3>
<span>$950.00</span>
</div>
</div>


<div class="single-list">
<div class="list-image">
<a href="product-grids.html"><img src="{{ asset('/')}}frontEnd/assets/images/home-product-list/06.jpg" alt="#"></a>
</div>
<div class="list-info">
<h3>
<a href="product-grids.html">Microsoft Xbox One S</a>
</h3>
<span>$298.00</span>
</div>
</div>

</div>
<div class="col-lg-4 col-md-4 col-12">
<h4 class="list-title">Top Rated</h4>

<div class="single-list">
<div class="list-image">
<a href="product-grids.html"><img src="{{ asset('/')}}frontEnd/assets/images/home-product-list/07.jpg" alt="#"></a>
</div>
<div class="list-info">
<h3>
<a href="product-grids.html">Samsung Gear 360 VR Camera</a>
</h3>
<span>$68.00</span>
</div>
</div>


<div class="single-list">
<div class="list-image">
<a href="product-grids.html"><img src="{{ asset('/')}}frontEnd/assets/images/home-product-list/08.jpg" alt="#"></a>
</div>
<div class="list-info">
<h3>
<a href="product-grids.html">Samsung Galaxy S9+ 64 GB</a>
</h3>
<span>$840.00</span>
</div>
</div>


<div class="single-list">
<div class="list-image">
<a href="product-grids.html"><img src="{{ asset('/')}}frontEnd/assets/images/home-product-list/09.jpg" alt="#"></a>
</div>
<div class="list-info">
<h3>
<a href="product-grids.html">Zeus Bluetooth Headphones</a>
</h3>
<span>$28.00</span>
</div>
</div>

</div>
</div>
</div>
</section>


<div class="brands">
<div class="container">
<div class="row">
<div class="col-lg-6 offset-lg-3 col-md-12 col-12">
<h2 class="title">Popular Brands</h2>
</div>
</div>
<div class="brands-logo-wrapper">
<div class="brands-logo-carousel d-flex align-items-center justify-content-between">
<div class="brand-logo">
<img src="{{ asset('/')}}frontEnd/assets/images/brands/01.png" alt="#">
</div>
<div class="brand-logo">
<img src="{{ asset('/')}}frontEnd/assets/images/brands/02.png" alt="#">
</div>
<div class="brand-logo">
<img src="{{ asset('/')}}frontEnd/assets/images/brands/03.png" alt="#">
</div>
<div class="brand-logo">
<img src="{{ asset('/')}}frontEnd/assets/images/brands/04.png" alt="#">
</div>
<div class="brand-logo">
<img src="{{ asset('/')}}frontEnd/assets/images/brands/05.png" alt="#">
</div>
<div class="brand-logo">
<img src="{{ asset('/')}}frontEnd/assets/images/brands/06.png" alt="#">
</div>
<div class="brand-logo">
<img src="{{ asset('/')}}frontEnd/assets/images/brands/03.png" alt="#">
</div>
<div class="brand-logo">
 <img src="{{ asset('/')}}frontEnd/assets/images/brands/04.png" alt="#">
</div>
</div>
</div>
</div>
</div>


<section class="blog-section section">
<div class="container">
<div class="row">
<div class="col-12">
<div class="section-title">
<h2>Our Latest News</h2>
<p>There are many variations of passages of Lorem
Ipsum available, but the majority have suffered alteration in some form.</p>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-4 col-md-6 col-12">

<div class="single-blog">
<div class="blog-img">
<a href="blog-single-sidebar.html">
<img src="{{ asset('/')}}frontEnd/assets/images/blog/blog-1.jpg" alt="#">
</a>
</div>
<div class="blog-content">
<a class="category" href="javascript:void(0)">eCommerce</a>
<h4>
<a href="blog-single-sidebar.html">What information is needed for shipping?</a>
</h4>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
incididunt.</p>
<div class="button">
<a href="javascript:void(0)" class="btn">Read More</a>
</div>
</div>
</div>

</div>
<div class="col-lg-4 col-md-6 col-12">

<div class="single-blog">
<div class="blog-img">
<a href="blog-single-sidebar.html">
<img src="{{ asset('/')}}frontEnd/assets/images/blog/blog-2.jpg" alt="#">
</a>
</div>
<div class="blog-content">
<a class="category" href="javascript:void(0)">Gaming</a>
<h4>
<a href="blog-single-sidebar.html">Interesting fact about gaming consoles</a>
</h4>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
incididunt.</p>
<div class="button">
<a href="javascript:void(0)" class="btn">Read More</a>
</div>
</div>
</div>

</div>
<div class="col-lg-4 col-md-6 col-12">

<div class="single-blog">
<div class="blog-img">
<a href="blog-single-sidebar.html">
<img src="assets/images/blog/blog-3.jpg" alt="#">
</a>
</div>
<div class="blog-content">
<a class="category" href="javascript:void(0)">Electronic</a>
<h4>
<a href="blog-single-sidebar.html">Electronics, instrumentation & control engineering
</a>
</h4>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
incididunt.</p>
 <div class="button">
<a href="javascript:void(0)" class="btn">Read More</a>
</div>
</div>
</div>

</div>
</div>
</div>
</section>


<section class="shipping-info">
<div class="container">
<ul>

<li>
<div class="media-icon">
<i class="lni lni-delivery"></i>
</div>
<div class="media-body">
<h5>Free Shipping</h5>
<span>On order over $99</span>
</div>
</li>

<li>
<div class="media-icon">
<i class="lni lni-support"></i>
</div>
<div class="media-body">
<h5>24/7 Support.</h5>
<span>Live Chat Or Call.</span>
</div>
</li>

<li>
<div class="media-icon">
<i class="lni lni-credit-cards"></i>
</div>
<div class="media-body">
<h5>Online Payment.</h5>
<span>Secure Payment Services.</span>
</div>
</li>

<li>
<div class="media-icon">
<i class="lni lni-reload"></i>
</div>
<div class="media-body">
<h5>Easy Return.</h5>
<span>Hassle Free Shopping.</span>
</div>
</li>
</ul>
</div>
</section>
@endsection
