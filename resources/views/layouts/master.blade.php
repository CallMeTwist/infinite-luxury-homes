<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="BuildTab - Construction Firm Html5 Template" >
    <meta name="description" content="BuildTab - Construction Firm Html5 Template" >
    <meta name="keywords" content="BuildTab - Construction Firm Html Template, BuildTab - Construction Firm WordPress Theme, unlimited colors available, ui/ux, ui/ux design, best html template, html template, html, woocommerce, shopify, prestashop, eCommerce, react js, react template, JavaScript, best CSS theme,css3, elementor theme, latest premium themes 2023, latest premium templates 2023, Preyan Technosys Pvt.Ltd, cymol themes, themetech mount, Web 3.0, multi-theme, website theme and template, woocommerce, bootstrap template, web templates, responsive theme, business,   architecture, building firm, construction company, contractor, elementor, engineering, handyman services, industrial theme, property development, renovation building, construction, architecture design, interiordesign, renovation services,engineering, contractor, realestate, constructionsite" >
    <meta name="author" content="https://www.preyantechnosys.com/">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? '' }} | {{ config('app.name') }}</title>

    <link rel="shortcut icon" href="/assets/images/favicon2.png" >
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/fontello.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/aos.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/prettyPhoto.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/shortcodes.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/megamenu.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/responsive.css">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- REVOLUTION LAYERS STYLES -->
    <link rel='stylesheet' id='rs-plugin-settings-css' href="/assets/revolution/css/rs6.css">

</head>
<body>

<!-- page start -->
<div class="page sticky-column">

    <!-- header start -->
    <header id="masthead" class="header prt-header-style-01">
        <!-- site-header-menu -->
        <div id="site-header-menu" class="site-header-menu">
            <div class="site-header-menu-inner prt-stickable-header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!--site-navigation -->
                            <div class="site-navigation d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <!-- site-branding -->
                                    <div class="site-branding">
                                        <h1><a class="home-link" href="/" title="InfiniteLuxury" rel="home">
                                                <img id="logo-img" height="100" width="400" class="img-fluid auto_size" src="/assets/images/infinite luxury logo 1.png" alt="logo-img">
                                            </a>
                                        </h1>
                                    </div><!-- site-branding end -->
                                    <div class="header-social-icons">
                                        <ul class="social-icons">
                                            <li><a href="https://www.facebook.com/preyantechnosys19" rel="noopener" aria-label="facebook"><i class="icon-facebook"></i></a></li>
                                            <li><a href="https://twitter.com/PreyanTechnosys" rel="noopener" aria-label="twitter"><i class="icon-twitter"></i></a></li>
                                            <li><a href="https://www.linkedin.com/in/preyan-technosys-pvt-ltd/" rel="noopener" aria-label="linkedin"><i class="icon-linkedin"></i></a></li>
                                            <li><a href="https://dribbble.com/PreyanTechnosys" rel="noopener" aria-label="dribbble"><i class="icon-dribbble"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="menu-link">
                                        <div class="btn-show-menu-mobile menubar menubar--squeeze">
                                                <span class="menubar-box">
                                                    <span class="menubar-inner"></span>
                                                </span>
                                        </div>
                                        <!-- menu -->
                                        <nav class="main-menu menu-mobile" id="menu">
                                            <ul class="menu">
                                                <li class="mega-menu-item {{ request()->is('/') ? 'active' : '' }}">
                                                    <a href="/">Home</a>
                                                </li>
                                                <li class="mega-menu-item {{ request()->is('about') ? 'active' : '' }}">
                                                    <a href="{{ route('about') }}" class="mega-menu-link">About Us</a>
                                                </li>
                                                <li class="mega-menu-item {{ request()->is('services*') ? 'active' : '' }}">
                                                    <a href="{{ route('services.index') }}" class="mega-menu-link">Services</a>
                                                </li>
                                                <li class="mega-menu-item {{ request()->is('projects') ? 'active' : '' }}">
                                                    <a href="#" class="mega-menu-link">Our Assets</a>
                                                    <ul class="mega-submenu">
                                                        <li><a href="{{ route('projects') }}">Portfolio</a></li>
                                                        <li><a href="blog-details.html">Inspection</a></li>
                                                    </ul>
                                                </li>
                                                <li class="mega-menu-item {{ request()->is('faqs') ? 'active' : '' }}">
                                                    <a href="{{ route('faqs') }}" class="mega-menu-link">FAQ</a>
                                                </li>
                                            </ul>
                                        </nav><!-- menu end -->
                                    </div>
                                    <!-- header_extra -->
                                    <div class="header_extra">
                                        <div class="header_contact-link">
                                            <a href="{{ route('contact') }}">Connect With Us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- site-header-menu end-->
    </header><!-- header end -->

    @yield('title')


    @yield('content')


    <!-- footer start -->
    <footer class="footer widget-footer bg-base-dark text-base-white overflow-hidden clearfix">
        <div class="first-footer">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-xl-5 col-lg-12">
                        <div class="first-footer-content">
                            <span>Luxury real estate, construction & land survey.</span>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-12">
                        <ul class="prt-list res-1199-mt-30">
                            <li><i class="fa fa-check-circle"></i>Property Assistance</li>
                            <li><i class="fa fa-check-circle"></i>Real Estate Solutions </li>
                        </ul>
                    </div>
                    <div class="col-xl-4 col-lg-12">
                        <div class="footer-img">
                            <img width="300" height="192" class="img-fluid" src="/assets/images/footer-img.png" alt="image">
                        </div>
                    </div>
                </div><!-- row end -->
            </div>
        </div>
        <div class="second-footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 widget-area">
                        <div class="widget widget_text clearfix">
                            <div class="footer-content-location">
                                <h3>Office</h3>
                                <p>{{ get_settings()->address }}</p>
                            </div>
                            <div class="footer-content-call">
                                <h3>P : <a href="tel:{{ get_settings()->phone }}">{{ get_settings()->phone }}</a></h3>
                            </div>
                            <div class="footer-content-email">
                                <p><a href="mailto:{{ get_settings()->email }}">{{ get_settings()->email }} </a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-2 col-xl-2 widget-area">
                        <div class="widget link-widget clearfix">
                            <h3>Company</h3>
                            <ul class="menu-footer-link">
                                <li><a href="{{ route('welcome') }}">Home</a></li>
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ route('services.index') }}">What We Do</a></li>
                                <li><a href="{{ route('projects') }}">Projects</a></li>
                                <li><a href="{{ route('faqs') }}">FAQs</a></li>
                                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-2 col-xl-2 widget-area">
                        <div class="widget widget_social_wrapper clearfix">
                            <h3>Social</h3>
                            <ul class="social-icons">
                                <li><a href="#">Facebook</a></li>
                                <li><a href="#">Twitter</a></li>
                                <li><a href="#">Instagram</a></li>
                                <li><a href="#">LinkedIn</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 widget-area">
                        <div class="widget widget-form clearfix">
                            <h3>Join Our Newsletter</h3>
                            <form id="subscribe-form" class="newsletter-form" method="post" action="#" data-mailchimp="true">
                                <div class="mailchimp-inputbox clearfix" id="subscribe-content">
                                    <p><input type="email" name="email" placeholder="Enter Your Email Address.." required=""></p>
                                    <button class="submit" type="submit">Subscribe Now <i class="icon-paper-plane-1"></i></button>
                                </div>
                                <p class="last-child">You may withdraw your consent at any time!</p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer-text">
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-lg-12">
                            <span>Copyright © 2025 <a href="/">{{ config('app.name') }}</a> by The Pragmatic Approach. All rights reserved.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->

    <!-- back-to-top start -->
    <a id="totop" href="#top">
        <i class="icon-angle-up"></i>
    </a>
    <!-- back-to-top end -->

</div><!-- page end -->

<!-- Javascript -->
<script src="/assets/js/jquery-3.6.4.min.js"></script>
<script src="/assets/js/jquery-migrate-3.4.0.min.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/ScrollTrigger.js"></script>
<script src="/assets/js/splittext.min.js"></script>
<script src="/assets/js/cursor.min.js"></script>
<script src="/assets/js/gsap.min.js"></script>
<script src="/assets/js/gsap-animation.js"></script>
<script src="/assets/js/jquery-validate.js"></script>
<script src="/assets/js/jquery.prettyPhoto.js"></script>
<script src="/assets/js/slick.min.js"></script>
<script src="/assets/js/jquery-waypoints.js"></script>
<script src="/assets/js/numinate.min.js"></script>
<script src="/assets/js/imagesloaded.min.js"></script>
<script src="/assets/js/circle-progress.min.js"></script>
<script src="/assets/js/main.js"></script>
<script src="/assets/js/aos.js"></script>
<!-- Revolution Slider -->
<script src='/assets/revolution/js/revolution.tools.min.js'></script>
<script src='/assets/revolution/js/rs6.min.js'></script>
<script src="/assets/revolution/js/slider.js"></script>
<script>
    AOS.init({
        offset: 120,
        duration: 400,
    });
</script>

</body>
</html>
