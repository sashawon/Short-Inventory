<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('page_title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('assets/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('assets/vendor/font-awesome-5/css/all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('assets/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('assets/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('assets/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('assets/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('assets/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('assets/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('assets/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('assets/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('assets/css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body>
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <h2>Red Soft</h2>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="@yield('dashboard_select')">
                            <a href="{{url('/dashboard')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="@yield('category_select')">
                            <a href="{{url('/category')}}">
                                <i class="fas fa-list"></i>Category</a>
                        </li>
                        <li class="@yield('brand_select')">
                            <a href="{{url('/brand')}}">
                                <i class="fas fa-bold"></i>Brand</a>
                        </li>
                        <li class="@yield('product_select')">
                            <a href="{{url('/product')}}">
                                <i class="fab fa-product-hunt"></i>Product</a>
                        </li>
                        <li class="@yield('expense_select')">
                            <a href="{{url('/expense')}}">
                                <i class="fas fa-hands-helping"></i>Expense</a>
                        </li>
                        <li class="@yield('employee_select')">
                            <a href="{{url('/employee')}}">
                                <i class="fas fa-users"></i>Employee</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <h2>Red Soft</h2>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="@yield('dashboard_select')">
                            <a href="{{url('/dashboard')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="@yield('category_select')">
                            <a href="{{url('/category')}}">
                                <i class="fas fa-list"></i>Category</a>
                        </li>
                        <li class="@yield('brand_select')">
                            <a href="{{url('/brand')}}">
                                <i class="fas fa-bold"></i>Brand</a>
                        </li>
                        <li class="@yield('product_select')">
                            <a href="{{url('/product')}}">
                                <i class="fab fa-product-hunt"></i>Product</a>
                        </li>
                        <li class="@yield('expense_select')">
                            <a href="{{url('/expense')}}">
                                <i class="fas fa-hands-helping"></i>Expense</a>
                        </li>
                        <li class="@yield('employee_select')">
                            <a href="{{url('/employee')}}">
                                <i class="fas fa-users"></i>Employee</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="">
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="{{asset('assets/images/icon/avatar-01.jpg')}}" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Welcome Admin</a>
                                        </div>
                                        <!-- <div class="account-dropdown js-dropdown">
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="{{url('/profile')}}">
                                                        <i class="zmdi zmdi-account"></i>Profile</a>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            @section('container')
                            @show
                        </div>

                        <!--
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2021 Ecom. All rights reserved.</p>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>


    <!-- Jquery -->
    <script src="{{asset('assets/vendor/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>

    <!-- Vendor JS       -->
    <script src="{{asset('assets/vendor/slick/slick.min.js')}}"></script>
    <script src="{{asset('assets/vendor/wow/wow.min.js')}}"></script>
    
    <script src="{{asset('assets/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <script src="{{asset('assets/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('assets/vendor/counter-up/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('assets/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('assets/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/select2/select2.min.js')}}"></script>

    <!-- Main JS-->
    <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>
<!-- end document-->