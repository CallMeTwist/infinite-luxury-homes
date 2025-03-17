@extends('layouts.master', [
    $title = '',
])

@section('title')

    <div class="prt-page-title-row">
        <div class="prt-page-title-row-inner">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="prt-page-title-row-heading">
                            <div class="banner-vertical-block"></div>
                            <div class="page-title-heading">
                                <h2 class="title">Commercial and Residential Developments</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                    <span>
                                        <a title="Homepage" href="/">Home</a>
                                    </span>
                                <span>
                                        <a title="Services" href="#">Services</a>
                                    </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="bg-page-title-overlay"></div> -->
        </div>
    </div>

@endsection

@section('content')

    <div class="site-main">

        <!--sidebar-->
        <div class="prt-row sidebar prt-sidebar-right prt-sidebar-service clearfix">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-8 content-area">
                        <div class="prt-service-single-content-area">
                            <div class="prt_fatured_image-wrapper single-img mb-40 res-575-mb-30">
                                <img width="857" height="350" class="img-fluid border-rad_10" src="/assets/images/services/services-05.jpg" alt="services-img">
                            </div>
                            <div class="prt-service-description">
                                <h3>Description</h3>
                                <p>Developing premium commercial and residential spaces, we bring innovative solutions to high-end real estate projects. Our expertise spans from luxury apartment complexes and office buildings to mixed-use developments that balance functionality and aesthetics.</p>
                                <p>With a focus on quality craftsmanship, sustainability, and cutting-edge design, we create spaces that cater to modern lifestyles and business needs. Every project is meticulously planned, ensuring seamless execution and long-term value. From concept to completion, we prioritize excellence, offering premium developments that set new benchmarks in real estate.</p>
                                <div class="service-content mt-40 res-991-mt-15">
                                    <h3>Service Process</h3>
                                    <div class="row prt-vertical_sep row-equal-height">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <!--featured-icon-box-->
                                            <div class="featured-icon-box icon-align-before-content style2">
                                                <div class="featured-content">
                                                    <div class="prt-icon-type-image">
                                                        <img width="144" height="144" class="img-fluid" src="/assets/images/icon-02.png" alt="image">
                                                        <span class="number"></span>
                                                    </div>
                                                    <div class="featured-title">
                                                        <h3>Project Planning & Development</h3>
                                                    </div>
                                                    <div class="featured-desc">
                                                        <p>We manage the full lifecycle of real estate projects, from site selection to final construction, ensuring successful execution.</p>
                                                    </div>
                                                </div>
                                            </div><!-- featured-icon-box end-->
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <!--featured-icon-box-->
                                            <div class="featured-icon-box icon-align-before-content style2">
                                                <div class="featured-content">
                                                    <div class="prt-icon-type-image">
                                                        <img width="144" height="144" class="img-fluid" src="/assets/images/icon-03.png" alt="image">
                                                        <span class="number"></span>
                                                    </div>
                                                    <div class="featured-title">
                                                        <h3>Sustainable & Smart Developments</h3>
                                                    </div>
                                                    <div class="featured-desc">
                                                        <p>Incorporating eco-friendly designs and smart technology, we create sustainable commercial and residential spaces that stand the test of time.</p>
                                                    </div>
                                                </div>
                                            </div><!-- featured-icon-box end-->
                                        </div>
                                    </div>
                                </div>
                                {{--                                <div class="mt-40 res-991-mt-0">--}}
                                {{--                                    <h3>Frequently asked questions</h3>--}}
                                {{--                                    <div class="accordion style2 mt_5">--}}
                                {{--                                        <!-- toggle -->--}}
                                {{--                                        <div class="toggle prt-toggle_style_classic prt-control-right-true">--}}
                                {{--                                            <div class="toggle-title"><a href="#" class="active">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a></div>--}}
                                {{--                                            <div class="toggle-content show">--}}
                                {{--                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehend. <a href="about-us.html" class="prt-btn prt-btn-size-md prt-btn-color-skincolor btn-inline btn-underline">View More</a></p>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div><!-- toggle end -->--}}
                                {{--                                        <!-- toggle -->--}}
                                {{--                                        <div class="toggle prt-toggle_style_classic prt-control-right-true">--}}
                                {{--                                            <div class="toggle-title"><a href="#">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a></div>--}}
                                {{--                                            <div class="toggle-content">--}}
                                {{--                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehend. <a href="about-us.html" class="prt-btn prt-btn-size-md prt-btn-color-skincolor btn-inline btn-underline">View More</a></p>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div><!-- toggle end -->--}}
                                {{--                                        <!-- toggle -->--}}
                                {{--                                        <div class="toggle prt-toggle_style_classic prt-control-right-true">--}}
                                {{--                                            <div class="toggle-title"><a href="#">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a></div>--}}
                                {{--                                            <div class="toggle-content">--}}
                                {{--                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehend. <a href="about-us.html" class="prt-btn prt-btn-size-md prt-btn-color-skincolor btn-inline btn-underline">View More</a></p>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div><!-- toggle end -->--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 widget-area sidebar-right">
                        <div class="pl-20 res-991-pl-0">
                            <aside class="widget widget-nav-menu with-title">
                                <div class="widget-title">
                                    <h3>Categories</h3>
                                </div>
                                <ul>
                                    <li class="active"><a href="{{ route('services.view', 'luxury-home-building') }}">Luxury Home Building</a></li>
                                    <li><a href="{{ route('services.view', 'custom-extensions-and-renovations') }}">Custom Extensions and Renovation</a></li>
                                    <li><a href="{{ route('services.view', 'smart-home-and-mechanical-systems') }}">Smart Homes</a></li>
                                    <li><a href="{{ route('services.view', 'structural-and-architectural-design') }}">Structural and Architectural Design</a></li>
                                    <li><a href="{{ route('services.view', 'commercial-and-residential-developments') }}">Commercial and Residential Developments</a></li>
                                    <li><a href="{{ route('services.view', 'real-estate-investment-advisory') }}">Real Estate Investment Advisory</a></li>
                                </ul>
                            </aside>
                            <aside class="widget widget-getquote with-title">
                                <div class="widget-title mb-15">
                                    <h3>Get A Quote</h3>
                                </div>
                                <form action="#" class="query_form wrap-form style1" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>
                                                <span class="text-input"><input name="name" type="text" value="" placeholder="Enter Your Name" required="required"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label>
                                                <span class="text-input"><input name="email" type="text" value="" placeholder="Enter Your Email" required="required"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label>
                                                <span class="text-input"><textarea name="message" rows="3" placeholder="Enter Your Comments" required="required"></textarea></span>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-btn mt-30">
                                                <button class="prt-btn prt-btn-size-md prt-btn-shape-rounded prt-btn-style-fill prt-btn-color-skincolor" type="submit">Submit Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </aside>
                        </div>
                    </div>
                </div><!-- row end -->
            </div>
        </div>
        <!--sidebar end-->

    </div>
@endsection
