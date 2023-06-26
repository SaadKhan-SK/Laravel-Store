@extends('web.layouts.master')
@section('content')
    <!-- page-title -->
    <section class="page-title centred">
        <div class="pattern-layer" style="background-image: url(assets/images/background/page-title.jpg);"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Cart Page</h1>
                <ul class="bread-crumb clearfix">
                    <li><i class="flaticon-home-1"></i><a href="{{ route('home.web') }}">Home</a></li>
                    <li>Cart Page</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- page-title end -->


    <!-- cart section -->
    <section class="cart-section cart-page">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 table-column">
                    <div class="table-outer">
                        <table class="cart-table">
                            <thead class="cart-header">
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th class="prod-column">Product Name</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th class="price">Price</th>
                                    <th class="quantity">Quantity</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($data['items'] as $item)
                                    
                                <tr>
                                    <td colspan="4" class="prod-column">
                                        <div class="column-box">
                                            <div class="remove-btn">
                                                <i class="flaticon-close"></i>
                                            </div>
                                            <div class="prod-thumb">
                                                <a href="#"><img src="{{asset('upload/'.$item['image'])}}" alt="{{$item['name']}}"></a>
                                            </div>
                                            <div class="prod-title">
                                                {{$item['name']}}
                                            </div>    
                                        </div>
                                    </td>
                                    <td class="price">Rs. {{$item['price']}}</td>
                                    <td class="qty">
                                        <div class="item-quantity">
                                            <input class="quantity-spinner" type="text" value="{{$item['quantity']}}" name="quantity">
                                        </div>
                                    </td>
                                    <td class="sub-total">Rs. {{$item['total_price']}}</td>
                                </tr>
                                @endforeach --}}

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- <div class="othre-content clearfix">
                <div class="coupon-box pull-left clearfix">
                    <input type="text" placeholder="Enter coupon code...">
                    <button type="submit" class="theme-btn-two">Apply coupon<i class="flaticon-right-1"></i></button>
                </div>
                <div class="update-btn pull-right">
                    <button type="submit" class="theme-btn-one">Update Cart<i class="flaticon-right-1"></i></button>
                </div>
            </div> --}}
            <div class="cart-total">

            </div>
        </div>
    </section>
    <!-- cart section end -->
@endsection
@push('cart')
    <script>
        function loadCart() {
            $.ajax({
                url: '{{ route('all-cart-product.web') }}', // Route to fetch cart data from
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.status === 1) {
                        var cartItems = response.cart.items;
                        var cartTable = $('.cart-table tbody');
                        var Total = $('.cart-total');

                        // Clear existing cart items and totals
                        cartTable.empty();
                        Total.empty();

                        // Iterate over cart items and populate the table
                        $.each(cartItems, function(index, item) {
                            var row = '<tr>' +
                                '<td>&nbsp;</td>' +
                                '<td colspan="4" class="prod-column">' +
                                '<div class="column-box">' +
                                '<div class="remove-btn" data-product-id="' + item.id + '">' +
                                '<i class="flaticon-close"></i>' +
                                '</div>' +
                                '<div class="prod-thumb">' +
                                '<a href="{{ asset('upload') }}/' + item.image +
                                '" class="lightbox-image" data-fancybox="gallery"><img src="{{ asset('upload') }}/' +
                                item.image + '" alt="' + item.name + '"></a>' +
                                '</div>' +
                                '<div class="prod-title">' +
                                item.name +
                                '</div>' +
                                '</div>' +
                                '</td>' +
                                '<td class="price">Rs. ' + item.price + '</td>' +
                                '<td class="qty">' +
                                '<div class="d-flex justify-content-center align-items-center">' +
                                '<div class="item-quantity d-flex align-items-center">' +
                                '<span class="minus-btn"><i class="fas fa-minus"></i></span>' +
                                '<input class="quantity-spinner" type="text" data-product-id="' + item
                                .id + ' " value="' + item.quantity +
                                '" name="quantity">' +
                                '<span class="plus-btn"><i class="fas fa-plus"></i></span>' +
                                '</td>' +
                                '<td class="sub-total">Rs. ' + item.total_price + '</td>' +
                                '</tr>' +
                                '</div>' +
                                '</div>';

                            cartTable.append(row);
                        });
                        var totalRow = '<div class="row">' +
                            '<div class="col-xl-5 col-lg-12 col-md-12 offset-xl-7 cart-column">' +
                            '<div class="total-cart-box clearfix">' +
                            '<h4>Cart Totals</h4>' +
                            '<ul class="list clearfix">' +
                            '<li>Subtotal:<span class="cart-subtotal">Rs. ' + response.cart.total_price +
                            '</span></li>' +
                            '<li>Order Total:<span class="cart-total">Rs. ' + response.cart.total_price +
                            '</span></li>' +
                            '</ul>' +
                            '<a href="cart.html" class="theme-btn-two">Proceed to Checkout<i class="flaticon-right-1"></i></a>' +
                            '</div>' +
                            '</div>' +
                            '</div>+'

                        Total.append(totalRow);
                        
                    } else {
                        var cartTable = $('.cart-table tbody');
                        var Total = $('.cart-total');
                        cartTable.empty();
                        Total.empty();
                        var empty = '<td>&nbsp;</td>'+
                        '<td>&nbsp;</td>'+
                        '<td>&nbsp;</td>'+
                        '<td><h2 class="mt-5 mb-3 text-center">Your Cart is empty!</h2><a href="{{route("shop.web")}}" class="theme-btn-two text-center">Continue Shopping<i class="flaticon-right-1"></i></a></td>'
                        cartTable.append(empty);
                        console.log('<span class="mb-3">Cart is empty!</span>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
        $(document).ready(function() {
            loadCart();

            $(document).on('click', '.plus-btn', function(e) {
                e.preventDefault();
                var input = $(this).siblings('input.quantity-spinner');
                var quantity = parseInt(input.val());
                var productId = input.data('product-id');
                input.val(quantity + 1);
                updateCart(productId, quantity + 1);
            });

            $(document).on('click', '.minus-btn', function(e) {
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
                    url: '{{ route("cart.count") }}',
                    method: 'GET',
                    success: function(response) {
                        $('#cart-count').text(response.count);
                    },
                    error: function() {
                        console.log('Error occurred while fetching cart count.');
                    }
                });
            }
            $(document).on('click','.remove-btn',function(e) {
                e.preventDefault();
                var productId = $(this).data('product-id');

                $.ajax({
                    url: '{{ route("cart.remove.web") }}',
                    type: 'POST',
                    data: {
                        id: productId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.status === 1) {
                            // Success message or further handling
                            console.log(response.message);
                            console.log(response.cart);
                            loadCart();
                            updateCartCount();
                            var toast = Swal.fire({
                                icon: 'success',
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
                        } else {
                            // Error message or further handling
                            console.log(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Error message or further handling
                        console.log(error);
                    }
                });
            });


        });
    </script>
@endpush
