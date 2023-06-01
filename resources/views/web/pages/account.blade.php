@extends('web.layouts.master')
@section('content')
            <!-- page-title -->
            <section class="page-title centred">
                <div class="pattern-layer" style="background-image: url(assets/images/background/page-title.jpg);"></div>
                <div class="auto-container">
                    <div class="content-box">
                        <h1>My Account</h1>
                        <ul class="bread-crumb clearfix">
                            <li><i class="flaticon-home-1"></i><a href="index.html">Home</a></li>
                            <li>My Account</li>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- page-title end -->
    
    
            <!-- myaccount-section -->
            <section class="myaccount-section">
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-12 col-sm-12 inner-column">
                            <div class="inner-box login-inner">
                                <div class="upper-inner">
                                    <h3>Log in</h3>
                                    <p>Log in to access all your resources</p>
                                </div>
                                <form action="my-account.html" method="post" class="default-form">
                                    @csrf
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control material-checkbox">
                                                <input type="checkbox" class="material-control-input">
                                                <span class="material-control-indicator"></span>
                                                <span class="description">Remember me</span>
                                            </label>
                                        </div>
                                        <a href="my-account.html" class="recover-password">Lost your password?</a>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="theme-btn-two">Log In<i class="flaticon-right-1"></i></button>
                                    </div>
                                </form>
                                <div class="lower-inner centred">
                                    <span>or</span>
                                    <ul class="social-links clearfix">
                                        <li><a href="my-account.html"><i class="fab fa-facebook-f"></i>Facebook</a></li>
                                        <li><a href="my-account.html"><i class="fab fa-google-plus-g"></i>Google</a></li>
                                    </ul>
                                    <p>Don't Have an Account? <a href="my-account.html">Sign up Now</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 inner-column">
                            <div class="inner-box signup-inner">
                                <div class="upper-inner">
                                    <h3>Create An Account</h3>
                                    <p>Log in to access all your resources</p>
                                </div>
                                <form action="{{ route('register.web') }}" method="post" class="default-form">
                                    @csrf
                                    <div class="form-group">
                                        <label>Your name</label>
                                        <input type="text" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password">
                                    </div>
                                    {{-- <div class="form-group">
                                        <div class="custom-controls-stacked">
                                            <label class="custom-control material-checkbox">
                                                <input type="checkbox" class="material-control-input">
                                                <span class="material-control-indicator"></span>
                                                <span class="description">I agree to terms & Policy.</span>
                                            </label>
                                        </div>
                                    </div> --}}
                                    <div class="form-group">
                                        <button type="submit" class="theme-btn-two">Sign Up<i class="flaticon-right-1"></i></button>
                                    </div>
                                </form>
                                <div class="lower-inner centred">
                                    <span>or</span>
                                    <ul class="social-links clearfix">
                                        <li><a href="my-account.html"><i class="fab fa-facebook-f"></i>Facebook</a></li>
                                        <li><a href="my-account.html"><i class="fab fa-google-plus-g"></i>Google</a></li>
                                    </ul>
                                    <p>Already have an account? <a href="my-account.html">Log In Now</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- myaccount-section end -->
@endsection