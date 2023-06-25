@extends('web.layouts.master')
@section('content')
<!-- page-title -->
<section class="page-title centred">
    <div class="pattern-layer" style="background-image: url(assets/images/background/page-title.jpg);"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1>Our Services</h1>
            <ul class="bread-crumb clearfix">
                <li><i class="flaticon-home-1"></i><a href="index.html">Home</a></li>
                <li>Our Services</li>
            </ul>
        </div>
    </div>
</section>
<!-- page-title end -->


<!-- service-page-section -->
<section class="service-page-section">
    <div class="auto-container">
        @foreach($data['services'] as $index => $service)
            <div class="service-block-two mb-100">
                <div class="inner-box">
                    <div class="row clearfix">
                        @if($index % 2 == 0)
                            <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                <figure class="image-box mr-30"><img src="{{asset('upload/'.$service->image)}}" alt=""></figure>
                            </div>
                        @endif

                        <div class="col-lg-6 col-md-6 col-sm-12 content-column">
                            <div class="content-box ml-30 @if($index % 2 == 0) mr-100 @else text-right ml-100 mr-30 @endif">
                                <h2><a href="service.html">{{$service->name}}</a></h2>
                                {!! $service->description !!}
                                <a href="service.html" class="theme-btn-one">View Catalog<i class="flaticon-right-1"></i></a>
                            </div>
                        </div>

                        @if($index % 2 != 0)
                            <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                <figure class="image-box ml-30"><img src="{{asset('upload/'.$service->image)}}" alt=""></figure>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

        {{-- <div class="service-block-two">
            <div class="inner-box">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                        <figure class="image-box mr-30"><img src="assets/images/service/service-3.jpg" alt=""></figure>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 content-column">
                        <div class="content-box ml-30 mr-100">
                            <h2><a href="service.html">Handmade Craft</a></h2>
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. sed ut perspici</p>
                            <a href="service.html" class="theme-btn-one">View Catalog<i class="flaticon-right-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</section>
<!-- service-page-section end -->    
@endsection