<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta charset="utf-8">
    <!--[if IE]>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    @yield('meta')
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Barlow:400,600%7COpen+Sans:400,400i,700' rel='stylesheet'>

    <!-- Css -->
    <link rel="stylesheet" href="{{ asset('themes/frontend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/frontend/css/font-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/frontend/revolution/css/settings.css') }}" />
    <!-- photoswipe css -->
    <link rel="stylesheet" href="https://unpkg.com/photoswipe@5.2.2/dist/photoswipe.css">
    <link rel="stylesheet" href="{{ asset('themes/frontend/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('wow_js/animate.css')}}">
    <!--Favicon-->
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon" >
    <style>
        body {
            font-family: Verdana, sans-serif;
            margin: 0;
        }

        * {
            box-sizing: border-box;
        }

        .row > .column {
            padding: 0 8px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .column {
            float: left;
            width: 25%;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: black;
        }

        /* Modal Content */
        .modal-content {
            position: relative;
            background-color: #fefefe;
            margin: auto;
            padding: 0;
            width: 90%;
            max-width: 1200px;
        }

        /* The Close Button */
        .close {
            color: white;
            position: absolute;
            top: 10px;
            right: 25px;
            font-size: 35px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #999;
            text-decoration: none;
            cursor: pointer;
        }

        .mySlides {
            display: none;
        }
        .mySlides img {
            max-height: 700px !important;
        }
        .modal {
            background-color: transparent;
        }

        .modal-content {
            background-color: transparent;
        }

        .cursor {
            cursor: pointer;
        }

        /* Next & previous buttons */
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -50px;
            color: white;
            font-weight: bold;
            font-size: 20px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
            -webkit-user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        img {
            margin-bottom: -4px;
        }

        .caption-container {
            text-align: center;
            background-color: black;
            padding: 2px 16px;
            color: white;
        }

        .demo {
            opacity: 0.6;
        }

        .active,
        .demo:hover {
            opacity: 1;
        }

        img.hover-shadow {
            transition: 0.3s;
        }

        .hover-shadow:hover {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
       .text-danger {
            color: red;
        }
       @media (min-width: 1200px){
           .container {
               max-width: 1233px;
           }
           .nav__container-box {
               background-color: #0000;
           }
           .nav__holder.nav--sticky {
               background: #0006;
           }

           .nav__menu > li > a {
               color: #ffffff;
           }
           .nav__phone-text, .nav__phone-number {
               color: #ffffff;
           }
           .social {
               color: #ffffff;
           }
           .rev_slider_wrapper {
               height: 610px !important;
           }
       }

       .project__img {
           height: 290px;
       }
       .footer__widgets {
           padding: 25px 0 48px;
       }
       .footer__bottom {
           padding: 13px 0 1px;
           position: relative;
       }
       .btn--color {
    background-color: #ffffffba;
}
       /*--- preloader ---*/

       .dark #preloader {

           background-color: #232323;

       }



       #preloader {

           position: fixed;

           top: 0;

           left: 0;

           right: 0;

           bottom: 0;

           background-color: #f7f7f7;

           z-index: 999999;

       }



       .preloader {

           width: 50px;

           height: 50px;

           display: inline-block;

           padding: 0px;

           text-align: left;

           box-sizing: border-box;

           position: absolute;

           top: 50%;

           left: 50%;

           margin-left: -25px;

           margin-top: -25px;

       }



       .preloader span {

           position: absolute;

           display: inline-block;

           width: 50px;

           height: 50px;

           border-radius: 100%;

           background: #fb4f53;

           -webkit-animation: preloader 1.3s linear infinite;

           animation: preloader 1.3s linear infinite;

       }



       .preloader span:last-child {

           animation-delay: -0.8s;

           -webkit-animation-delay: -0.8s;

       }



       @keyframes preloader {

           0% {

               transform: scale(.7, .7);

           }

           50% {

               transform: scale(1, 1);

           }

           100% {

               transform: scale(.7, .7);

           }

       }



       @-webkit-keyframes preloader {

           0% {

               transform: scale(.7, .7);

           }

           50% {

               transform: scale(1, 1);

           }

           100% {

               transform: scale(.7, .7);

           }

       }
       #preloadertp {
           position: fixed;
           top: 0;
           left: 0;
           width: 100%;
           height: 100%;
           background-color: #fff;
           z-index: 999999;
           display: -webkit-box;
           display: -ms-flexbox;
           display: flex;
           justify-content: center;
           align-items: center;
           pointer-events: none;

       }

       #preloadertp img {
           width: 100px;
           height: 50px !important;
           border-radius: 10px;
           animation: preloader 3s linear infinite;
       }
       .socials-contact a{
           color:#000;
       }

        .preloader-video {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            z-index: 9999;
            opacity: 1;
            transition: opacity 1s ease-out;
        }

        .preloader-video.hide {
            opacity: 0;
        }

        video#preloader-video {
            width: 100%;
            height: 100%;
            object-fit: initial;
        }
    </style>
    @yield('style')
</head>

<body>
@if(Route::currentRouteName() == 'home')
<div class="preloader-video">
    <video id="preloader-video" autoplay loop muted>
        <source src="{{ asset('img/openhouse.mp4') }}" type="video/mp4">
    </video>
</div>
@endif

<main class="main-wrapper">

    <!-- Navigation -->
   <header class="nav nav--boxed" style="top: 5px !important;">
        <div class="nav__holder nav--sticky">
            <div class="nav__container container">
                <div class="nav__container-box">
                    <div class="flex-parent">

                        <div class="nav__header">
                            <!-- Logo -->
                            <a href="{{ route('home') }}" class="logo-container flex-child">
                                <img class="logo" style="width: 200px" src="{{ asset('img/logo.png') }}" alt="logo">
                            </a>

                            <!-- Mobile toggle -->
                            <button type="button" class="nav__icon-toggle" id="nav__icon-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="nav__icon-toggle-bar"></span>
                                <span class="nav__icon-toggle-bar"></span>
                                <span class="nav__icon-toggle-bar"></span>
                            </button>
                        </div>

                        <!-- Navbar -->
                        <nav id="navbar-collapse" class="nav__wrap collapse navbar-collapse">
                            <ul class="nav__menu">
                                <li class=" {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class=" {{ Route::currentRouteName() == 'projects' ? 'active' : '' }}">
                                    <a href="{{ route('projects') }}">Projects</a>
                                </li>
                                <li class=" {{ Route::currentRouteName() == 'portfolio' ? 'active' : '' }}">
                                    <a href="{{ route('portfolio') }}">Portfolio</a>
                                </li>
                                <li class=" {{ Route::currentRouteName() == 'about' ? 'active' : '' }}">
                                    <a href="{{ route('about') }}">About</a>
                                </li>
                                <li class=" {{ Route::currentRouteName() == 'news' ? 'active' : '' }}">
                                    <a href="{{ route('news') }}">News</a>
                                </li>
                                <li class=" {{ Route::currentRouteName() == 'contact_us' ? 'active' : '' }}">
                                    <a href="{{ route('contact_us') }}">Contact</a>
                                </li>
                            </ul> <!-- end menu -->
                            <div class="nav__phone nav__phone--mobile d-lg-none">
                                <span class="nav__phone-text">Call us:</span>
                                <a href="tel:+8801717847310" class="nav__phone-number">+88-01717847310</a>
                            </div>

                            <div class="nav__socials nav__socials--mobile d-lg-none">
                                <div class="socials">
                                    <a href="https://www.linkedin.com/company/openhouse-architects-engineers/" class="social social-linkedin" aria-label="linkedin" title="linkedin" target="_blank"><i class="ui-linkedin"></i></a>
{{--                                    <a href="#" class="social social-twitter" aria-label="twitter" title="twitter" target="_blank"><i class="ui-twitter"></i></a>--}}
                                    <a href="https://www.facebook.com/Openhousearchitects" class="social social-facebook" aria-label="facebook" title="facebook" target="_blank"><i class="ui-facebook"></i></a>
                                    <a href="https://www.youtube.com/@OpenhouseArchitectsEngineers" class="social social-youtube" aria-label="youtube" title="google plus" target="_blank"><i class="ui-youtube"></i></a>
                                    <a href="https://instagram.com/openhousebd?igshid=MzRlODBiNWFlZA==" class="social social-instagram" aria-label="instagram" title="instagram" target="_blank"><i class="ui-instagram"></i></a>
                                </div>
                            </div>
                        </nav> <!-- end nav-wrap -->

                        <div class="nav__phone nav--align-right d-none d-lg-block">
                            <span class="nav__phone-text">Call us:</span>
                            <a href="tel:+8801717847310" class="nav__phone-number">+88-01717847310</a>
                        </div>

                        <div class="nav__socials d-none d-lg-block">
                            <div class="socials">
                                <a href="https://www.linkedin.com/company/openhouse-architects-engineers/" class="social social-linkedin" aria-label="linkedin" title="linkedin" target="_blank"><i class="ui-linkedin"></i></a>
{{--                                <a href="#" class="social social-twitter" aria-label="twitter" title="twitter" target="_blank"><i class="ui-twitter"></i></a>--}}
                                <a href="https://www.facebook.com/Openhousearchitects" class="social social-facebook" aria-label="facebook" title="facebook" target="_blank"><i class="ui-facebook"></i></a>
                                <a href="https://www.youtube.com/@OpenhouseArchitectsEngineers" class="social social-youtube" aria-label="youtube" title="google plus" target="_blank"><i class="ui-youtube"></i></a>
                                <a href="https://instagram.com/openhousebd?igshid=MzRlODBiNWFlZA==" class="social social-instagram" aria-label="instagram" title="instagram" target="_blank"><i class="ui-instagram"></i></a>

                            </div>
                        </div>

                    </div>
                </div> <!-- end nav container box -->
            </div> <!-- end container -->

        </div>
    </header>

    <div class="content-wrapper oh">
    @yield('content')
<!-- Footer -->
    <footer class="footer bg-dark-overlay" style="background-image: url({{ asset('themes/frontend/img/footer/1.jpg') }});">
        <div class="container-fluid">
            <div class="footer__widgets">
                <div class="row">

                    <div class="col-lg-3 col-md-3">
                        <div class="widget widget-about-us">
                            <!-- Logo -->
                            <a href="{{ route('home') }}" class="logo-container flex-child">
                                <img style="height: 50px" class="logo" src="{{ asset('img/logo.jpg') }}" alt="logo">
                            </a>
                        </div>
                    </div> <!-- end logo -->

                    <div class="col-lg-2 col-md-3">
                        <div class="widget widget_nav_menu">
                            <ul>
                                <li><a href="{{ route('about') }}">About</a></li>
                                <li><a href="{{ route('projects') }}">Project</a></li>
                                <li><a href="{{ route('news') }}">News</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3">
                        <div class="widget widget_nav_menu">
                            <ul>
                                <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
                                <li><a href="{{ route('contact_us') }}">Contact</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 offset-lg-2 col-md-3">
                        <div class="widget">
                            <div class="socials">
                                <a href="https://www.linkedin.com/company/openhouse-architects-engineers/" class="social social-linkedin" aria-label="linkedin" title="linkedin" target="_blank"><i class="ui-linkedin"></i></a>
{{--                                <a href="#" class="social social-twitter" aria-label="twitter" title="twitter" target="_blank"><i class="ui-twitter"></i></a>--}}
                                <a href="https://www.facebook.com/Openhousearchitects" class="social social-facebook" aria-label="facebook" title="facebook" target="_blank"><i class="ui-facebook"></i></a>
                                <a href="https://www.youtube.com/@OpenhouseArchitectsEngineers" class="social social-youtube" aria-label="youtube" title="google plus" target="_blank"><i class="ui-youtube"></i></a>
                                <a href="https://instagram.com/openhousebd?igshid=MzRlODBiNWFlZA==" class="social social-instagram" aria-label="instagram" title="instagram" target="_blank"><i class="ui-instagram"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- end container -->

        <div class="footer__bottom">
            <div class="container-fluid text-right text-md-center">
						<span class="copyright">
							&copy; <script>document.querySelector(".copyright").innerHTML += new Date().getFullYear()</script> {{ config('app.name') }} | Designed & Developed by <a target="_blank" href="https://2aitbd.com">2a IT Limited</a>
						</span>
            </div>
        </div> <!-- end footer bottom -->
    </footer> <!-- end footer -->

    <div id="back-to-top">
        <a href="#top"><i class="ui-arrow-up"></i></a>
    </div>

    </div>
</main>
<!-- end main wrapper -->


<!-- jQuery Scripts -->
<script src="{{ asset('themes/frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('themes/frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('themes/frontend/js/plugins.js') }}"></script>
<script src="{{ asset('themes/frontend/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('themes/frontend/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('themes/frontend/js/rev-slider.js') }}"></script>
<script src="{{ asset('themes/frontend/js/scripts.js') }}"></script>
<script src="{{ asset('wow_js/wow.js') }}"></script>
<script>
    new WOW().init();
    window.addEventListener('load', function() {
        // Page has finished loading
        let pageId = '{{ Route::currentRouteName() }}'
        if(pageId == 'home'){
            setTimeout(function() {
                $(".preloader-video").remove();
            }, 9000);
        }
    });
</script>

@yield('script')
<!-- Rev Slider Offline Scripts -->
<script src="{{ asset('themes/frontend/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
<script src="{{ asset('themes/frontend/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
<script src="{{ asset('themes/frontend/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('themes/frontend/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset('themes/frontend/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('themes/frontend/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ asset('themes/frontend/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('themes/frontend/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script src="{{ asset('themes/frontend/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
</body>
</html>
