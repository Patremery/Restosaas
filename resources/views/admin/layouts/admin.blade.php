<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Our restaurants SAAS">
    <meta name="author" content="">
    <title>{{ config('app.name') }} </title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.cs') }}s">

    <!-- Slider Revolution CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/revolution/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/revolution/css/layers.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/revolution/css/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashbord-mobile-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    @include('front.inc.css')

    @stack('css')
</head>

<body class="maxw1600 m0a dashboard-bd">
    <!-- Wrapper -->
    <div id="wrapper" class="int_main_wraapper">
        <!-- START SECTION HEADINGS -->
        @include('admin.inc.header')
        <div class="clearfix"></div>
        <!-- Header Container / End -->

        <!-- START SECTION DASHBOARD -->
    <section class="user-page section-padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-xs-12 pl-0 pr-0 user-dash">
                    @include('admin.inc.sidebar')
                </div>
                <div class="col-lg-9 col-md-12 col-xs-12 pl-0 user-dash2">
                    @include('admin.inc.mobile_menu')
                    @yield('content')
                    <!-- START FOOTER -->
                    @include('admin.inc.footer')
                    @stack('modal')
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION DASHBOARD -->


        <a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
        <!-- END FOOTER -->

        <!-- START PRELOADER -->
        <div id="preloader">
            <div id="status">
                <div class="status-mes"></div>
            </div>
        </div>
        <!-- END PRELOADER -->

        <!-- ARCHIVES JS -->
        @include('front.inc.js')
        <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
        <script src="{{ asset('assets/js/moment.js') }}"></script>
        <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
        <script src="{{ asset('assets/js/swiper.js') }}"></script>
        <script src="{{ asset('assets/js/slick.min.js') }}"></script>
        <script src="{{ asset('assets/js/slick2.js') }}"></script>
        <script src="{{ asset('assets/js/fitvids.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/js/dashbord-mobile-menu.js') }}"></script>
        <script src="{{ asset('assets/js/forms-2.js') }}"></script>


        <script>
            $(".header-user-name").on("click", function() {
                $(".header-user-menu ul").toggleClass("hu-menu-vis");
                $(this).toggleClass("hu-menu-visdec");
            });

        </script>

        <!-- Slider Revolution scripts -->
        <script src="{{ asset('assets/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
        <script src="{{ asset('assets/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
        <script src="{{ asset('assets/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
        <script src="{{ asset('assets/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
        <script src="{{ asset('assets/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
        <script src="{{ asset('assets/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
        <script src="{{ asset('assets/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
        <script src="{{ asset('assets/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
        <script src="{{ asset('assets/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
        <script src="{{ asset('assets/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>

        <!-- MAIN JS -->
        <script src="{{ asset('assets/js/script.js') }}"></script>
        @stack('scripts')
    </div>
    <!-- Wrapper / End -->
</body>

</html>
