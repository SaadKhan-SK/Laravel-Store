@extends('web.layouts.master')

@section('content')
        <!-- page-title -->
        <section class="page-title centred">
            <div class="pattern-layer" style="background-image: url({{asset('assets/images/background/page-title.jpg')}})"></div>
            <div class="auto-container">
                <div class="content-box">
                    <h1>Shop</h1>
                    <ul class="bread-crumb clearfix">
                        <li><i class="flaticon-home-1"></i><a href="index.html">Home</a></li>
                        <li>Shop</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page-title end -->


        <!-- shop-page-section -->
        <section class="shop-page-section shop-page-1">
            <div class="auto-container">
                <div class="item-shorting clearfix">
                    <div class="left-column pull-left clearfix">
                        <div class="filter-box">
                            <div class="dropdown">
                                <button class="search-box-btn" type="button" id="dropdownMenu5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flaticon-list-2"></i>Filter</button>
                                <div class="filter-content dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu5">
                                    <div class="close-btn"><i class="flaticon-close"></i></div>
                                    <div class="discription-box">
                                        <div class="row clearfix">
                                            <div class="col-lg-3 col-md-6 col-sm-12 column">
                                                <div class="single-column">
                                                    <h4>Category</h4>
                                                    <ul class="list clearfix">
                                                        <li><a href="single-shop-1.html">Women’s Clothing (6)</a></li>
                                                        <li><a href="single-shop-1.html">Man Fashion (9)</a></li>
                                                        <li><a href="single-shop-1.html">Kid’s Clothing (2)</a></li>
                                                        <li><a href="single-shop-1.html">Jewelry & Watches (5)</a></li>
                                                        <li><a href="single-shop-1.html">Bags & Shoes (3)</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12 column">
                                                <div class="single-column">
                                                    <h4>Age</h4>
                                                    <ul class="list clearfix">
                                                        <li><a href="single-shop-1.html">0 - 12 Months (9)</a></li>
                                                        <li><a href="single-shop-1.html">01 - 04 Years (5)</a></li>
                                                        <li><a href="single-shop-1.html">05 - 08 Years (6)</a></li>
                                                        <li><a href="single-shop-1.html">09 - 12 Years (10)</a></li>
                                                        <li><a href="single-shop-1.html">13 - 14 Years (7)</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12 column">
                                                <div class="single-column">
                                                    <h4>Size</h4>
                                                    <ul class="list clearfix">
                                                        <li><a href="single-shop-1.html">XXL (6)</a></li>
                                                        <li><a href="single-shop-1.html">XL (9)</a></li>
                                                        <li><a href="single-shop-1.html">S (2)</a></li>
                                                        <li><a href="single-shop-1.html">M (5)</a></li>
                                                        <li><a href="single-shop-1.html">L (3)</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12 column">
                                                <div class="single-column">
                                                    <h4>Color</h4>
                                                    <ul class="color-list clearfix">
                                                        <li><span class="black"></span><a href="single-shop-1.html">Black (3)</a></li>
                                                        <li><span class="blue"></span><a href="single-shop-1.html">Blue (6)</a></li>
                                                        <li><span class="orange"></span><a href="single-shop-1.html">Orange (9)</a></li>
                                                        <li><span class="green"></span><a href="single-shop-1.html">Green (5)</a></li>
                                                        <li><span class="purple"></span><a href="single-shop-1.html">Purple (3)</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                    <div class="price-filters">
                                        <h4 class="sidebar-title">Price Range</h4>
                                        <div class="range-slider clearfix">
                                            <div class="price-range-slider"></div>
                                            <div class="clearfix">
                                                <p>Range:</p>
                                                <div class="title"></div>
                                                <div class="input"><input type="text" class="property-amount" name="field-name" readonly></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text"><p>Showing 1–12 of 50 Results</p></div>
                        <div class="short-box clearfix">
                            <p>Short by</p>
                            <div class="select-box">
                                <select class="wide">
                                   <option data-display="9">9</option>
                                   <option value="1">5</option>
                                   <option value="2">7</option>
                                   <option value="4">15</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="right-column pull-right clearfix">
                        <div class="short-box clearfix">
                            <p>Short by</p>
                            <div class="select-box">
                                <select class="wide">
                                   <option data-display="Popularity">Popularity</option>
                                   <option value="1">New Collection</option>
                                   <option value="2">Top Sell</option>
                                   <option value="4">Top Ratted</option>
                                </select>
                            </div>
                        </div>
                        <div class="menu-box">
                            <a href="shop.html"><i class="flaticon-menu"></i></a>
                            <a href="shop.html"><i class="flaticon-list"></i></a>
                        </div>
                    </div>
                </div>
                <div class="our-shop">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                            <div class="shop-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{asset('assets/images/resource/shop/shop-1.jpg')}}" alt="">
                                        <ul class="info-list clearfix">
                                            <li><a href="index.html"><i class="flaticon-heart"></i></a></li>
                                            <li><a href="product-details.html">Add to cart</a></li>
                                            <li><a href="{{asset('assets/images/resource/shop/shop-1.jpg')}}" class="lightbox-image" data-fancybox="gallery"><i class="flaticon-search"></i></a></li>
                                        </ul>
                                    </figure>
                                    <div class="lower-content">
                                        <a href="product-details.html">Cold Crewneck Sweater</a>
                                        <span class="price">$70.30</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                            <div class="shop-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{asset('assets/images/resource/shop/shop-2.jpg')}}" alt="">
                                        <span class="category green-bg">New</span>
                                        <ul class="info-list clearfix">
                                            <li><a href="index.html"><i class="flaticon-heart"></i></a></li>
                                            <li><a href="product-details.html">Add to cart</a></li>
                                            <li><a href="{{asset('assets/images/resource/shop/shop-2.jpg')}}" class="lightbox-image" data-fancybox="gallery"><i class="flaticon-search"></i></a></li>
                                        </ul>
                                    </figure>
                                    <div class="lower-content">
                                        <a href="product-details.html">Multi-Way Ultra Crop Top</a>
                                        <span class="price">$50.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                            <div class="shop-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{asset('assets/images/resource/shop/shop-3.jpg')}}" alt="">
                                        <ul class="info-list clearfix">
                                            <li><a href="index.html"><i class="flaticon-heart"></i></a></li>
                                            <li><a href="product-details.html">Add to cart</a></li>
                                            <li><a href="{{asset('assets/images/resource/shop/shop-3.jpg')}}" class="lightbox-image" data-fancybox="gallery"><i class="flaticon-search"></i></a></li>
                                        </ul>
                                    </figure>
                                    <div class="lower-content">
                                        <a href="product-details.html">Side-Tie Tank</a>
                                        <span class="price">$40.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                            <div class="shop-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{asset('assets/images/resource/shop/shop-4.jpg')}}" alt="">
                                        <ul class="info-list clearfix">
                                            <li><a href="index.html"><i class="flaticon-heart"></i></a></li>
                                            <li><a href="product-details.html">Add to cart</a></li>
                                            <li><a href="{{asset('assets/images/resource/shop/shop-4.jpg')}}" class="lightbox-image" data-fancybox="gallery"><i class="flaticon-search"></i></a></li>
                                        </ul>
                                    </figure>
                                    <div class="lower-content">
                                        <a href="product-details.html">Cold Crewneck Sweater</a>
                                        <span class="price">$60.30</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                            <div class="shop-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{asset('assets/images/resource/shop/shop-5.jpg')}}" alt="">
                                        <ul class="info-list clearfix">
                                            <li><a href="index.html"><i class="flaticon-heart"></i></a></li>
                                            <li><a href="product-details.html">Add to cart</a></li>
                                            <li><a href="{{asset('assets/images/resource/shop/shop-5.jpg')}}" class="lightbox-image" data-fancybox="gallery"><i class="flaticon-search"></i></a></li>
                                        </ul>
                                    </figure>
                                    <div class="lower-content">
                                        <a href="product-details.html">Side-Tie Tank</a>
                                        <span class="price">$35.30</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                            <div class="shop-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{asset('assets/images/resource/shop/shop-6.jpg')}}" alt="">
                                        <ul class="info-list clearfix">
                                            <li><a href="index.html"><i class="flaticon-heart"></i></a></li>
                                            <li><a href="product-details.html">Add to cart</a></li>
                                            <li><a href="{{asset('assets/images/resource/shop/shop-6.jpg')}}" class="lightbox-image" data-fancybox="gallery"><i class="flaticon-search"></i></a></li>
                                        </ul>
                                    </figure>
                                    <div class="lower-content">
                                        <a href="product-details.html">Must-Have Easy Tank</a>
                                        <span class="price">$25.30</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                            <div class="shop-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{asset('assets/images/resource/shop/shop-7.jpg')}}" alt="">
                                        <span class="category red-bg">Hot</span>
                                        <ul class="info-list clearfix">
                                            <li><a href="index.html"><i class="flaticon-heart"></i></a></li>
                                            <li><a href="product-details.html">Add to cart</a></li>
                                            <li><a href="{{asset('assets/images/resource/shop/shop-7.jpg')}}" class="lightbox-image" data-fancybox="gallery"><i class="flaticon-search"></i></a></li>
                                        </ul>
                                    </figure>
                                    <div class="lower-content">
                                        <a href="product-details.html">Woven Crop Cami</a>
                                        <span class="price">$90.30</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                            <div class="shop-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{asset('assets/images/resource/shop/shop-8.jpg')}}" alt="">
                                        <ul class="info-list clearfix">
                                            <li><a href="index.html"><i class="flaticon-heart"></i></a></li>
                                            <li><a href="product-details.html">Add to cart</a></li>
                                            <li><a href="{{asset('assets/images/resource/shop/shop-8.jpg')}}" class="lightbox-image" data-fancybox="gallery"><i class="flaticon-search"></i></a></li>
                                        </ul>
                                    </figure>
                                    <div class="lower-content">
                                        <a href="product-details.html">Must-Have Easy Tank</a>
                                        <span class="price">$20.30</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                            <div class="shop-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{asset('assets/images/resource/shop/shop-33.jpg')}}" alt="">
                                        <ul class="info-list clearfix">
                                            <li><a href="index.html"><i class="flaticon-heart"></i></a></li>
                                            <li><a href="product-details.html">Add to cart</a></li>
                                            <li><a href="{{asset('assets/images/resource/shop/shop-33.jpg')}}" class="lightbox-image" data-fancybox="gallery"><i class="flaticon-search"></i></a></li>
                                        </ul>
                                    </figure>
                                    <div class="lower-content">
                                        <a href="product-details.html">Side-Tie Tank</a>
                                        <span class="price">$35.30</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                            <div class="shop-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{asset('assets/images/resource/shop/shop-34.jpg')}}" alt="">
                                        <ul class="info-list clearfix">
                                            <li><a href="index.html"><i class="flaticon-heart"></i></a></li>
                                            <li><a href="product-details.html">Add to cart</a></li>
                                            <li><a href="{{asset('assets/images/resource/shop/shop-34.jpg')}}" class="lightbox-image" data-fancybox="gallery"><i class="flaticon-search"></i></a></li>
                                        </ul>
                                    </figure>
                                    <div class="lower-content">
                                        <a href="product-details.html">Must-Have Easy Tank</a>
                                        <span class="price">$25.30</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                            <div class="shop-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{asset('assets/images/resource/shop/shop-35.jpg')}}" alt="">
                                        <span class="category red-bg">Hot</span>
                                        <ul class="info-list clearfix">
                                            <li><a href="index.html"><i class="flaticon-heart"></i></a></li>
                                            <li><a href="product-details.html">Add to cart</a></li>
                                            <li><a href="{{asset('assets/images/resource/shop/shop-35.jpg')}}" class="lightbox-image" data-fancybox="gallery"><i class="flaticon-search"></i></a></li>
                                        </ul>
                                    </figure>
                                    <div class="lower-content">
                                        <a href="product-details.html">Woven Crop Cami</a>
                                        <span class="price">$90.30</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 shop-block">
                            <div class="shop-block-one">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="{{asset('assets/images/resource/shop/shop-36.jpg')}}" alt="">
                                        <ul class="info-list clearfix">
                                            <li><a href="index.html"><i class="flaticon-heart"></i></a></li>
                                            <li><a href="product-details.html">Add to cart</a></li>
                                            <li><a href="{{asset('assets/images/resource/shop/shop-36.jpg')}}" class="lightbox-image" data-fancybox="gallery"><i class="flaticon-search"></i></a></li>
                                        </ul>
                                    </figure>
                                    <div class="lower-content">
                                        <a href="product-details.html">Must-Have Easy Tank</a>
                                        <span class="price">$20.30</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pagination-wrapper centred">
                    <ul class="pagination clearfix">
                        <li><a href="shop.html">Prev</a></li>
                        <li><a href="shop.html">1</a></li>
                        <li><a href="shop.html" class="active">2</a></li>
                        <li><a href="shop.html">3</a></li>
                        <li><a href="shop.html">4</a></li>
                        <li><a href="shop.html">5</a></li>
                        <li><a href="shop.html">Next</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- shop-page-section end -->
    
@endsection