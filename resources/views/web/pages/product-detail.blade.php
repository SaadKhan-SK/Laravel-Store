@extends('web.layouts.master')

@section('content')
    <!-- page-title -->
    <section class="page-title centred">
        <div class="pattern-layer" style="background-image: url(assets/images/background/page-title.jpg);"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>{{ $data['products']['name'] }}</h1>
                <ul class="bread-crumb clearfix">
                    <li><i class="flaticon-home-1"></i><a href="{{ route('shop.web') }}">Shop</a></li>
                    <li>{{ $data['products']['name'] }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- page-title end -->


    <!-- product-details -->
    <section class="product-details product-details-4">
        <div class="auto-container">
            <div class="product-details-content">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <div class="bxslider">
                            <div class="slider-content">
                                <div class="product-image">
                                    <figure class="image">
                                        <img id="main-image" src="{{ asset('upload/' . $data['products']['image']) }}"
                                            alt="">
                                        <a href="{{ asset('upload/' . $data['products']['image']) }}"
                                            class="lightbox-image"><i class="flaticon-search-2"></i></a>
                                    </figure>
                                </div>
                                <div class="slider-pager centred">
                                    <ul class="thumb-box">
                                        <li>
                                            <a class="active" data-slide-index="0" href="#">
                                                <figure><img src="{{ asset('upload/' . $data['products']['image']) }}"
                                                        alt=""></figure>
                                            </a>
                                        </li>
                                        @foreach ($data['products']['gallery'] as $index => $item)
                                            <li>
                                                <a data-slide-index="{{ $index + 1 }}" href="#">
                                                    <figure><img src="{{ asset('upload/' . $item['image']) }}" alt="">
                                                    </figure>
                                                </a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                            {{-- <div class="slider-content">
                            <div class="product-image">
                                <figure class="image">
                                    <img src="{{asset('upload/'.$data['products']['image'])}}" alt="">
                                    <a href="{{asset('upload/'.$data['products']['image'])}}" class="lightbox-image"><i class="flaticon-search-2"></i></a>
                                </figure>
                            </div>
                            <div class="slider-pager centred">
                                <ul class="thumb-box">
                                    <li>
                                        <a  data-slide-index="0" href="#"><figure><img src="{{asset('upload/'.$data['products']['image'])}}" alt=""></figure></a>
                                    </li>
                                    @foreach ($data['products']['gallery'] as $index => $item)
                                        
                                    <li>
                                        <a data-slide-index="{{$index+1}}" href="#"><figure><img src="{{asset('upload/'.$item['image'])}}" alt=""></figure></a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="slider-content">
                            <div class="product-image">
                                <figure class="image">
                                    <img src="{{asset('upload/'.$data['products']['image'])}}" alt="">
                                    <a href="{{asset('upload/'.$data['products']['image'])}}" class="lightbox-image"><i class="flaticon-search-2"></i></a>
                                </figure>
                            </div>
                            <div class="slider-pager centred">
                                <ul class="thumb-box">
                                    <li>
                                        <a data-slide-index="0" href="#"><figure><img src="{{asset('upload/'.$data['products']['image'])}}" alt=""></figure></a>
                                    </li>
                                    @foreach ($data['products']['gallery'] as $index => $item)
                                        
                                    <li>
                                        <a data-slide-index="{{$index+1}}" href="#"><figure><img src="{{asset('upload/'.$item['image'])}}" alt=""></figure></a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="slider-content">
                            <div class="product-image">
                                <figure class="image">
                                    <img src="{{asset('upload/'.$data['products']['image'])}}" alt="">
                                    <a href="{{asset('upload/'.$data['products']['image'])}}" class="lightbox-image"><i class="flaticon-search-2"></i></a>
                                </figure>
                            </div>
                            <div class="slider-pager centred">
                                <ul class="thumb-box">
                                    <li>
                                        <a data-slide-index="0" href="#"><figure><img src="{{asset('upload/'.$data['products']['image'])}}" alt=""></figure></a>
                                    </li>
                                    @foreach ($data['products']['gallery'] as $index => $item)
                                        
                                    <li>
                                        <a data-slide-index="{{$index+1}}" href="#"><figure><img src="{{asset('upload/'.$item['image'])}}" alt=""></figure></a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="product-info">
                            <h3>{{ $data['products']['name'] }}</h3>
                            <div class="customer-review clearfix">
                                <ul class="rating-box clearfix">
                                    <li><i class="flaticon-star"></i></li>
                                    <li><i class="flaticon-star"></i></li>
                                    <li><i class="flaticon-star"></i></li>
                                    <li><i class="flaticon-star"></i></li>
                                    <li><i class="flaticon-star"></i></li>
                                </ul>
                                <div class="reviews"><a href="product-single.html">(5 Reviews)</a></div>
                            </div>
                            <span class="item-price">{{ $data['products']['price'] }}</span>
                            <div class="text">
                                {!! $data['products']['small_description'] !!}
                            </div>
                            <div class="othre-options clearfix">
                                <div class="item-quantity">
                                    <input class="quantity-spinner" data-product-id="{{$data['products']['id']}}" type="text" value="1" name="quantity">
                                </div>
                                <div class="btn-box"><button type="button" class="theme-btn-two add-to-cart-btn" data-product-id="{{$data['products']['id']}}">Add to cart</button></div>
                                <ul class="info clearfix">
                                    <li><a href="product-details.html"><i class="flaticon-heart"></i></a></li>
                                    <li><a href="product-details.html"><i class="flaticon-search"></i></a></li>
                                </ul>
                            </div>
                            <div class="other-links">
                                <ul class="clearfix">
                                    {{-- <li>SKU: 05</li> --}}
                                    <li>Category: <a
                                            href="product-details.html">{{ $data['products']['category']['name'] }}</a>
                                    </li>
                                    <li>Tags: <a href="product-details.html">{{ $data['tags'] }}</a></li>
                                </ul>
                            </div>
                            <ul class="share-option clearfix">
                                <li>
                                    <h5>Follow Us:</h5>
                                </li>
                                <li><a href="shop-details.html"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="shop-details.html"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="shop-details.html"><i class="fab fa-vimeo-v"></i></a></li>
                                <li><a href="shop-details.html"><i class="fab fa-google-plus-g"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-discription">
                <div class="tabs-box">
                    <div class="tab-btn-box">
                        <ul class="tab-btns tab-buttons clearfix">
                            <li class="tab-btn active-btn" data-tab="#tab-1">Description</li>
                            <li class="tab-btn " data-tab="#tab-2">Reviews(1)</li>
                        </ul>
                    </div>
                    <div class="tabs-content">
                        <div class="tab active-tab" id="tab-1">
                            <div class="text">
                                {!! $data['products']['description'] !!}
                            </div>
                        </div>
                        <div class="tab" id="tab-2">
                            <div class="review-box">
                                <h5>1 Review for Multi-Way Ultra Crop Top</h5>
                                <div class="review-inner">
                                    <figure class="image-box"><img
                                            src="{{ asset('assets/images/resource/review-1.png"') }}" alt="">
                                    </figure>
                                    <div class="inner">
                                        <ul class="rating clearfix">
                                            <li><i class="flaticon-star"></i></li>
                                            <li><i class="flaticon-star"></i></li>
                                            <li><i class="flaticon-star"></i></li>
                                            <li><i class="flaticon-star"></i></li>
                                            <li><i class="flaticon-star-1"></i></li>
                                        </ul>
                                        <h6>Eileen Alene <span>- May 1, 2020</span></h6>
                                        <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt
                                            mollit anim est laborum. Sed perspiciatis unde omnis natus error sit voluptatem
                                            accusa dolore mque laudant totam rem aperiam eaque ipsa quae ab illo inventore
                                            veritatis et quasi arch tecto beatae vitae dicta.</p>
                                    </div>
                                </div>
                                <div class="replay-inner">
                                    <h5>Be First to Review For “Multi-Way Ultra Crop Top”</h5>
                                    <div class="rating-box clearfix">
                                        <h6>Your Rating</h6>
                                        <ul class="rating clearfix">
                                            <li><i class="flaticon-star-1"></i></li>
                                            <li><i class="flaticon-star-1"></i></li>
                                            <li><i class="flaticon-star-1"></i></li>
                                            <li><i class="flaticon-star-1"></i></li>
                                            <li><i class="flaticon-star-1"></i></li>
                                        </ul>
                                    </div>
                                    <form action="contact.html" method="post" class="review-form">
                                        <div class="row clearfix">
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                <label>Your Review</label>
                                                <textarea name="message"></textarea>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                <label>Your Name</label>
                                                <input type="text" name="name" required="">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                <label>Your Emai</label>
                                                <input type="email" name="email" required="">
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                <div class="custom-controls-stacked">
                                                    <label class="custom-control material-checkbox">
                                                        <input type="checkbox" class="material-control-input">
                                                        <span class="material-control-indicator"></span>
                                                        <span class="description">Save my name, email, and website in this
                                                            browser for the next time I comment</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                                <button type="submit" class="theme-btn-two">Submit Your Review<i
                                                        class="flaticon-right-1"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="related-product">
            <div class="sec-title style-two">
                <h2>Related Products</h2>
                <p>There are some product that we featured for choose your best</p>
                <span class="separator" style="background-image: url(assets/images/icons/separator-2.png);"></span>
            </div>
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
            </div>
        </div> --}}
        </div>
    </section>
    <!-- product-details end -->
@endsection

@push('product-detail')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.bootstrap-touchspin-up', function(e) {
                e.preventDefault();
                var input = $(this).siblings('input.quantity-spinner');
                var quantity = parseInt(input.val());
                var productId = input.data('product-id');
                input.val(quantity + 1);
                updateCart(productId, quantity + 1);
            });

            $(document).on('click', '.bootstrap-touchspin-down', function(e) {
                e.preventDefault();
                var input = $(this).siblings('input.quantity-spinner');
                var quantity = parseInt(input.val());
                var productId = input.data('product-id');
                if (quantity > 1) {
                    input.val(quantity - 1);
                    updateCart(productId, quantity - 1);
                }
            });

            $(document).on('change', '.quantity-spinner', function(e) {
                e.preventDefault();
                var quantity = parseInt($(this).val());
                var productId = $(this).data('product-id');
                updateCart(productId, quantity);
            });

            function updateCart(productId, quantity) {
                $.ajax({
                    url: '{{ route('add-to-cart.web') }}',
                    type: 'POST',
                    data: {
                        id: productId,
                        quantity: quantity,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Handle the success response, if needed
                        console.log(response);

                        loadCart();
                    },
                    error: function(xhr) {
                        // Handle the error response, if needed
                        var toast = Swal.fire({
                            icon: 'error',
                            title: response.message,
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                            showClass: {
                                popup: 'swal2-noanimation',
                                backdrop: 'swal2-noanimation'
                            },
                            hideClass: {
                                popup: '',
                                backdrop: ''
                            }
                        });
                        console.log(xhr.responseText);
                    }
                });
            }

            function updateCartCount() {
                $.ajax({
                    url: '{{ route('cart.count') }}',
                    method: 'GET',
                    success: function(response) {
                        $('#cart-count').text(response.count);
                    },
                    error: function() {
                        console.log('Error occurred while fetching cart count.');
                    }
                });
            }
        })
    </script>
@endpush
