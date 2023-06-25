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
                                <form id="my-account-form" method="post" class="default-form">
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
                                    {{-- <p>Don't Have an Account? <a href="my-account.html">Sign up Now</a></p> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 inner-column">
                            <div class="inner-box signup-inner">
                                <div class="upper-inner">
                                    <h3>Create An Account</h3>
                                    <p>Log in to access all your resources</p>
                                </div>
                                <form id="my-account-register-form" method="post" class="default-form">
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
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="password_confirmation">
                                    </div>
                                    <div class="form-group">
                                        <label>As</label>
                                        <select name="role" class="form-control form-control-lg" id="">
                                            <option selected disabled>Select Role</option>
                                            <option value="User">User</option>
                                            <option value="Vendor">Vendor</option>
                                        </select>
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
                                        <button type="submit" id="signup-button" class="theme-btn-two">Sign Up<i class="flaticon-right-1"></i></button>
                                    </div>
                                </form>
                                <div class="lower-inner centred">
                                    <span>or</span>
                                    <ul class="social-links clearfix">
                                        <li><a href="my-account.html"><i class="fab fa-facebook-f"></i>Facebook</a></li>
                                        <li><a href="my-account.html"><i class="fab fa-google-plus-g"></i>Google</a></li>
                                    </ul>
                                    {{-- <p>Already have an account? <a href="my-account.html">Log In Now</a></p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
@push('register')
<script>
    $(document).ready(function() {
        $('#my-account-register-form').on('click', 'button[type="submit"]', function(event) {
            event.preventDefault(); // Prevent form submission

            var form = $(this).closest('form');
            var url = "{{ route('register.web') }}";
            var formData = form.serialize(); // Serialize the form data

            // Perform AJAX request
            $.ajax({
                type: 'POST',
                url: url,
                data: formData,
                success: function(response) {
                    // Handle successful response
                    // console.log(response);
                    // Display success message using SweetAlert or other notification library
                    form.trigger('reset');
                    Swal.fire({
                        icon: 'success',
                        text: response.message,
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
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
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    // console.error(error);

                    // Parse the response JSON to get the validation errors
                    var response = JSON.parse(xhr.responseText);
                    var errorMessages = '';

                    // Check if the response contains validation errors
                    if (response.errors) {
                        // Loop through each error and concatenate the error messages
                        for (var key in response.errors) {
                            errorMessages += response.errors[key][0] + '<br>';
                        }
                    } else {
                        errorMessages = 'Something went wrong';
                    }

                    // Display error message using SweetAlert or other notification library
                    Swal.fire({
                        icon: 'error',
                        html: errorMessages,
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
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
                }

            });
        });
    });
</script>
@endpush
@push('login')
<script>
    $(document).ready(function() {
        $('#my-account-form').on('click', 'button[type="submit"]', function(event) {
            event.preventDefault(); // Prevent form submission

            var form = $(this).closest('form');
            var url = "{{ route('login.web') }}";
            var formData = form.serialize(); // Serialize the form data

            // Perform AJAX request
            $.ajax({
                type: 'POST',
                url: url,
                data: formData,
                success: function(response) {
                    // Handle successful response
                    // console.log(response);
                    // Display success message using SweetAlert or other notification library
                    window.location.href=response.redirect
                    Swal.fire({
                        icon: 'success',
                        text: response.message,
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
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
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    // console.error(error);

                    // Parse the response JSON to get the validation errors
                    var response = JSON.parse(xhr.responseText);
                    var errorMessages = response.errors || { error: response.error };
                    var errorMessage = '';

                    // Check if the response contains validation errors
                    if (errorMessages.hasOwnProperty('error')) {
                        errorMessage = errorMessages.error;
                    } else if (errorMessages.hasOwnProperty('errors')) {
                        // Loop through each error and concatenate the error messages
                        for (var key in errorMessages.errors) {
                            if (errorMessages.errors.hasOwnProperty(key)) {
                                errorMessage += errorMessages.errors[key][0] + '<br>';
                            }
                        }
                    } else {
                        errorMessage = 'Something went wrong';
                    }


                    // Display error message using SweetAlert or other notification library
                    Swal.fire({
                        icon: 'error',
                        html: errorMessage,
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
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
                }

            });
        });
    });
</script>
@endpush
           
            
            
            <!-- myaccount-section end -->
@endsection