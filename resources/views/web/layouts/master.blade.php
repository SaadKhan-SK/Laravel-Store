<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>Castro - HTML 5 Template Preview</title>

<!-- Fav Icon -->
<link rel="icon" href={{asset("assets/images/favicon.ico")}} type="image/x-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<!-- Stylesheets -->
<link href={{asset("assets/css/font-awesome-all.css")}} rel="stylesheet">
<link href={{asset("assets/css/flaticon.css")}} rel="stylesheet">
<link href={{asset("assets/css/owl.css")}} rel="stylesheet">
<link href={{asset("assets/css/bootstrap.css")}} rel="stylesheet">
<link href={{asset("assets/css/jquery.fancybox.min.css")}} rel="stylesheet">
<link href={{asset("assets/css/animate.css")}} rel="stylesheet">
<link href={{asset("assets/css/jquery-ui.css")}} rel="stylesheet">
<link href={{asset("assets/css/nice-select.css")}} rel="stylesheet">
<link href={{asset("assets/css/color.css")}} rel="stylesheet">
<link href={{asset("assets/css/style.css")}} rel="stylesheet">
<link href={{asset("assets/css/responsive.css")}} rel="stylesheet">
<link href="{{asset('assets/admin/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<script src="{{asset('assets/admin/libs/sweetalert2/sweetalert2.min.js') }}"></script>
</head>

<!-- page wrapper -->
<body>
    @if ($message = Session::get('fail'))
            <script>
                // Store the Swal.fire() instance in a variable
                var toast = Swal.fire({
                    icon: 'error',
                    title: '{{$message}}',
                    toast: true,
                    position: 'bottom-end',
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
    
                // Add event listener to stop the timer on mouseenter
                toast.addEventListener('mouseenter', () => {
                    Swal.stopTimer();
                });
    
                // Add event listener to resume the timer on mouseleave
                toast.addEventListener('mouseleave', () => {
                    Swal.resumeTimer();
                });
            </script>
        @endif
    
    
    @if ($message = Session::get('success'))
        <script>
            // Store the Swal.fire() instance in a variable
            var toast = Swal.fire({
                icon: 'success',
                title: '{{$message}}',
                toast: true,
                position: 'bottom-end',
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
    
            // Add event listener to stop the timer on mouseenter
            toast.addEventListener('mouseenter', () => {
                Swal.stopTimer();
            });
    
            // Add event listener to resume the timer on mouseleave
            toast.addEventListener('mouseleave', () => {
                Swal.resumeTimer();
            });
        </script>
    @endif
    
    @if ($errors->any())
        <script>
            var errorMessages = '<ul style="list-style: none;font-size: 14px;">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>';
    
            Swal.fire({
                icon: 'error',
                html: errorMessages,
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 3000000,
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
        </script>
    @endif

    <div class="boxed_wrapper">
        <!-- Preloader -->
        <div class="loader-wrap">
            <div class="preloader">
                {{-- <div class="preloader-close">Preloader Close</div> --}}
            </div>
            <div class="layer layer-one"><span class="overlay"></span></div>
            <div class="layer layer-two"><span class="overlay"></span></div>        
            <div class="layer layer-three"><span class="overlay"></span></div>        
        </div>


        <!-- search-popup -->
        <div id="search-popup" class="search-popup">
            <div class="close-search"><i class="flaticon-close"></i></div>
            <div class="popup-inner">
                <div class="overlay-layer"></div>
                <div class="search-form">
                    <form method="post" action="index.html">
                        <div class="form-group">
                            <fieldset>
                                <input type="search" class="form-control" name="search-input" value="" placeholder="Search Here" required >
                                <input type="submit" value="Search Now!" class="theme-btn style-four">
                            </fieldset>
                        </div>
                    </form>
                    <h3>Recent Search Keywords</h3>
                    <ul class="recent-searches">
                        <li><a href="index.html">Finance</a></li>
                        <li><a href="index.html">Idea</a></li>
                        <li><a href="index.html">Service</a></li>
                        <li><a href="index.html">Growth</a></li>
                        <li><a href="index.html">Plan</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- search-popup end -->

        @include('web.layouts.header')
        @yield('content')
        @include('web.layouts.footer')


            <!-- jequery plugins -->
    <script src={{asset("assets/js/jquery.js")}}></script>
    <script src={{asset("assets/js/popper.min.js")}}></script>
    <script src={{asset("assets/js/bootstrap.min.js")}}></script>
    <script src={{asset("assets/js/owl.js")}}></script>
    <script src={{asset("assets/js/wow.js")}}></script>
    <script src={{asset("assets/js/validation.js")}}></script>
    <script src={{asset("assets/js/jquery.fancybox.js")}}></script>
    <script src={{asset("assets/js/TweenMax.min.js")}}></script>
    <script src={{asset("assets/js/appear.js")}}></script>
    <script src={{asset("assets/js/scrollbar.js")}}></script>
    <script src={{asset("assets/js/jquery.nice-select.min.js")}}></script>  
    <script src={{asset("assets/js/isotope.js")}}></script>
    <script src={{asset("assets/js/jquery-ui.js")}}></script>

    <!-- main-js -->
    <script src={{asset("assets/js/script.js")}}></script>
</body><!-- End of .page_wrapper -->
</html>