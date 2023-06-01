<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{$title}} | Connecting Beyond Limits</title>
    <meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
<meta content="Themesbrand" name="author"/>
 


<!-- App favicon -->
<link rel="shortcut icon" href="{{ asset('assets/admin/images/logo.jpg ')}}">
<link href="{{asset('assets/admin/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
<!-- preloader css -->
<link rel="stylesheet" href="{{ asset('assets/admin/css/preloader.min.css')}}" type="text/css" />
<link href="{{asset('assets/admin/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<script src="{{asset('assets/admin/libs/sweetalert2/sweetalert2.min.js') }}"></script>


<!-- Bootstrap Css -->
<link href="{{ asset('assets/admin/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ asset('assets/admin/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ asset('assets/admin/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
<script src="{{ asset('assets/admin/libs/jquery/jquery.min.js')}}"></script>

</head>
<!--All Vertical Pages-->
<body>
    <!-- Begin page -->
    @if ($message = Session::get('fail'))
        <script>
            // Store the Swal.fire() instance in a variable
            var toast = Swal.fire({
                icon: 'error',
                title: '{{$message}}',
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
    </script>
@endif
<div id="layout-wrapper">
