<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('page-title') - {{ config('app.name') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front-assets/img/favicon.ico') }}">

    <!-- CSS
    ========================= -->
    <!--bootstrap min css-->
    <link rel="stylesheet" href="{{ asset('front-assets/css/bootstrap.min.css') }}">
    <!--owl carousel min css-->
    <link rel="stylesheet" href="{{ asset('front-assets/css/owl.carousel.min.css') }}">
    <!--slick min css-->
    <link rel="stylesheet" href="{{ asset('front-assets/css/slick.css') }}">
    <!--magnific popup min css-->
    <link rel="stylesheet" href="{{ asset('front-assets/css/magnific-popup.css') }}">
    <!--font awesome css-->
    <link rel="stylesheet" href="{{ asset('front-assets/css/font.awesome.css') }}">
    <!--ionicons css-->
    <link rel="stylesheet" href="{{ asset('front-assets/css/ionicons.min.css') }}">
    <!--linearicons css-->
    <link rel="stylesheet" href="{{ asset('front-assets/css/linearicons.css') }}">
    <!--animate css-->
    <link rel="stylesheet" href="{{ asset('front-assets/css/animate.css') }}">
    <!--jquery ui min css-->
    <link rel="stylesheet" href="{{ asset('front-assets/css/jquery-ui.min.css') }}">
    <!--slinky menu css-->
    <link rel="stylesheet" href="{{ asset('front-assets/css/slinky.menu.css') }}">
    <!--plugins css-->
    <link rel="stylesheet" href="{{ asset('front-assets/css/plugins.css') }}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/style.css') }}">

    <!--modernizr min js here-->
    <script src="{{ asset('front-assets/js/vendor/modernizr-3.7.1.min.js') }}"></script>

    @yield('styles')
</head>

@php
    $categories = \App\Models\Category::all();
@endphp

<body class="d-flex flex-column min-vh-100">

    <!--header area start-->

    <!--offcanvas menu area start-->
    <div class="off_canvars_overlay">

    </div>
    <div class="offcanvas_menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="canvas_open">
                        <a href="javascript:void(0)"><i class="icon-menu"></i></a>
                    </div>
                    <div class="offcanvas_menu_wrapper">
                        <div class="canvas_close">
                            <a href="javascript:void(0)"><i class="icon-x"></i></a>
                        </div>

                        <div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children active">
                                    <a class="active" href="{{ route('landing') }}">Home</a>
                                </li>
                                @foreach ($categories as $category)
                                    <li class="menu-item-has-children">
                                        <a class="{{ request()->route('category') == $category->id ? 'active' : '' }}"
                                            href="{{ route('categories.show', $category) }}">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @endforeach
                                <li class="menu-item-has-children">
                                    <a href="{{ route('about-us.index') }}">About Us</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="{{ route('contact-us.index') }}"> Contact Us</a>
                                </li>
                            </ul>
                        </div>
                        <div class="offcanvas_footer">
                            <span><a href="#"><i class="fa fa-envelope-o"></i> info@yourdomain.com</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--offcanvas menu area end-->

    <header>
        <div class="main_header">
            <div class="header_middle">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-3 col-sm-3 col-3">
                            <div class="logo">
                                <a href="{{ route('landing') }}">
                                    <h1>{{ config('app.name') }}</h1>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-6 col-sm-7 col-8">
                            <div class="header_right_info">
                                <div class="search_container mobail_s_none">
                                    <form action="#">
                                        <div class="search_box">
                                            <input placeholder="Search product..." type="text">
                                            <button type="submit"><span class="lnr lnr-magnifier"></span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="header_bottom sticky-header">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-9">
                            <!--main menu start-->
                            <div class="main_menu menu_position">
                                <nav>
                                    <ul>
                                        <li>
                                            <a href="{{ route('landing') }}"
                                                class="{{ request()->is('/') ? ' active' : '' }}">Home
                                            </a>
                                        </li>
                                        @foreach ($categories as $category)
                                            <li>
                                                <a class="{{ request()->route('category') == $category->id ? 'active' : '' }}"
                                                    href="{{ route('categories.show', $category) }}">
                                                    {{ $category->name }}
                                                </a>
                                            </li>
                                        @endforeach

                                        <li><a class="{{ request()->is('contact-us') ? ' active' : '' }}"
                                                href="{{ route('contact-us.index') }}">Contact Us</a></li>
                                        <li><a class="{{ request()->is('about-us') ? ' active' : '' }}"
                                                href="{{ route('about-us.index') }}">About Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!--main menu end-->
                        </div>
                        <div class="col-lg-3">
                            <div class="call-support">
                                <p><a href="tel:(08)23456789">(08) 23 456 789</a> Customer Support</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--header area end-->

    <div class="flex-fill">
        @yield('content')
    </div>


    <!--footer area start-->
    <footer class="footer_widgets">

        <div class="footer_bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-7">
                        <div class="copyright_area">
                            <p>Copyright © {{ date('Y') }} <a href="{{ route('landing') }}">{{ config('app.name') }}</a>. All Rights Reserved.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">

                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer area end-->





    <!-- JS
============================================ -->
    <!--jquery min js-->
    <script src="{{ asset('front-assets/js/vendor/jquery-3.4.1.min.js') }}"></script>
    <!--popper min js-->
    <script src="{{ asset('front-assets/js/popper.js') }}"></script>
    <!--bootstrap min js-->
    <script src="{{ asset('front-assets/js/bootstrap.min.js') }}"></script>
    <!--owl carousel min js-->
    <script src="{{ asset('front-assets/js/owl.carousel.min.js') }}"></script>
    <!--slick min js-->
    <script src="{{ asset('front-assets/js/slick.min.js') }}"></script>
    <!--magnific popup min js-->
    <script src="{{ asset('front-assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!--counterup min js-->
    <script src="{{ asset('front-assets/js/jquery.counterup.min.js') }}"></script>
    <!--jquery countdown min js-->
    <script src="{{ asset('front-assets/js/jquery.countdown.js') }}"></script>
    <!--jquery ui min js-->
    <script src="{{ asset('front-assets/js/jquery.ui.js') }}"></script>
    <!--jquery elevatezoom min js-->
    <script src="{{ asset('front-assets/js/jquery.elevatezoom.js') }}"></script>
    <!--isotope packaged min js-->
    <script src="{{ asset('front-assets/js/isotope.pkgd.min.js') }}"></script>
    <!--slinky menu js-->
    <script src="{{ asset('front-assets/js/slinky.menu.js') }}"></script>
    <!--instagramfeed menu js-->
    <script src="{{ asset('front-assets/js/jquery.instagramFeed.min.js') }}"></script>
    <!-- tippy bundle umd js -->
    <script src="{{ asset('front-assets/js/tippy-bundle.umd.js') }}"></script>
    <!-- Plugins JS -->
    <script src="{{ asset('front-assets/js/plugins.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('front-assets/js/main.js') }}"></script>



    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('sweetalert::alert')


    @stack('scripts')

</body>

</html>
