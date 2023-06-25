<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ route('vendor.dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm">

                    </span>
                    <span class="logo-lg">
                        <span class="logo-txt">Castro</span>
                    </span>
                </a>

                <a href="{{ route('vendor.dashboard') }}" class="logo logo-light">
                    <span class="logo-sm">

                    </span>
                    <span class="logo-lg">
                        <span class="logo-txt">Castro</span>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>


        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block">

                <button type="button" class="btn header-item bg-soft-light border-start border-end"
                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @auth
                    <span class="d-none d-xl-inline-block ms-1 fw-medium">{{auth()->user()->name}}</span>
                    @endauth
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{ route('auth.logout') }}"><i
                            class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                </div>
            </div>

        </div>
    </div>
</header>

<!-- ========== Left Sidebar Start ========== -->
<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="current">
                    <a href="{{ route('vendor.dashboard') }}" class="current">
                        <i class="fas fa-home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>
                {{-- <li class="">
                    <a href="{{ route('vendor.product') }}" class="">
                        <i class="fas fa-home"></i>
                        <span data-key="t-dashboard">Products</span>
                    </a>
                </li> --}}
                <li class="">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="fas fa-cart-arrow-down"></i>
                        <span>Products</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="true">
                        <li>
                            <a href="{{ route('vendor.add-product') }}">
                            <i class="fas fa-cart-plus"></i>
                            <span>+ Add Product</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('vendor.product') }}">
                            <i class="fas fa-cart-arrow-down"></i>
                                <span>Your Products</span>
                            </a>
                        </li>
                    </ul>
                </li>
                

                {{-- <li class="">
                    <a href="{{ route('user.wonbids') }}" class="current">
                        <i class="fas fa-trophy"></i>
                        <span data-key="t-dashboard">View Bids Won</span>
                    </a>
                </li>

                {{ session('user') }} --}}
            </ul>



        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
