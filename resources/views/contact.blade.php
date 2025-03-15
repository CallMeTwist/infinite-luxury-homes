@extends('layouts.master', [
    $title = 'Contact Us',
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
                                <h2 class="title">Contact us</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                    <span>
                                        <a title="Homepage" href="/">Home</a>
                                    </span>
                                <span class="action">Contact us</span>
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

        <!-- conatct-section -->
        <section class="prt-row conatct-section clearfix">
            <div class="container">
                <div class="row row-equal-height">
                    <div class="col-lg-4 col-md-6">
                        <!-- featured-icon-box -->
                        <div class="featured-icon-box icon-align-before-content style4">
                            <div class="prt-icon-type-image">
                                <img width="85" height="85" class="img-fluid" src="/assets/images/icon-10.png" alt="image">
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h3>Contact</h3>
                                </div>
                                <div class="featured-desc">
                                    <a href="mailto:{{ get_settings()->email }}"> {{ get_settings()->email }} </a><br>
                                    <a href="tel:{{ get_settings()->phone }}">{{ get_settings()->phone }}</a>
                                </div>
                            </div>
                        </div><!-- featured-icon-box end -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <!-- featured-icon-box -->
                        <div class="featured-icon-box icon-align-before-content style4">
                            <div class="prt-icon-type-image">
                                <img width="85" height="85" class="img-fluid" src="/assets/images/icon-11.png" alt="image">
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h3>Become a Partner</h3>
                                </div>
                                <div class="featured-desc">
                                    <p class="mb-15">Partner with us to grow and succeed in real estate. Let’s build together!</p>
                                    <a href="#" class="prt-btn btn-inline">Join with Us</a>
                                </div>
                            </div>
                        </div><!-- featured-icon-box end -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <!-- featured-icon-box -->
                        <div class="featured-icon-box icon-align-before-content style4">
                            <div class="prt-icon-type-image">
                                <img width="85" height="85" class="img-fluid" src="/assets/images/icon-12.png" alt="image">
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h3>Location</h3>
                                </div>
                                <div class="featured-desc">
                                    <p class="location">88 New South Head Rd, Wordwide Country, New York</p>
                                </div>
                            </div>
                        </div><!-- featured-icon-box end -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="prt-image-box-content mt-30">
                            <div class="star-ratings">
                                <ul class="rating">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                            <p>4.7/5.0</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- conatct-section end-->

        <!--section-->
        <section class="prt-row prt-bg bg-base-dark prt-bgimage-yes bg-img7 clearfix">
            <div class="prt-row-wrapper-bg-layer prt-bg-layer bg-base-dark"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- section title -->
                                <div class="section-title title-style-center_text">
                                    <div class="title-header">
                                        <h3 class="text-base-skin">What We Offering</h3>
                                        <h2 class="title">Get in Touch with Our Experts</h2>
                                    </div>
                                </div><!-- section title end -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ route('contact.send') }}" class="query_form wrap-form clearfix mt-15 res-991-mt-0 position-relative" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>
                                        <span class="text-input"><input name="firstname" type="text" placeholder="First name" required></span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label>
                                        <span class="text-input"><input name="lastname" type="text" placeholder="Last name" required></span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label>
                                        <span class="text-input"><input name="email" type="email" placeholder="Email address" required></span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label>
                                        <span class="text-input"><input name="subject" type="text" placeholder="Subject" required></span>
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <label>
                                        <span class="text-input"><textarea name="message" rows="5" placeholder="Your message here" required></textarea></span>
                                    </label>
                                </div>
                                <div class="col-md-12 text-center mt-3">
                                    <button class="prt-btn prt-btn-size-md prt-btn-shape-rounded prt-btn-style-border prt-btn-color-white" type="submit">Send Message</button>
                                    <p class="mb-0 mt-2">Been here before? <a class="underline" href="/">Check your query</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--section end-->

        <!--location-section-->
        <section class="prt-row location-section clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section title -->
                        <div class="section-title">
                            <div class="title-header">
                                <h3>Our branches</h3>
                                <h2 class="title">Our Offices around the world</h2>
                            </div>
                        </div><!-- section title end -->
                    </div>
                </div>
                <div class="row mt-20 res-991-mt-0">
                    <div class="col-lg-12">
                        <!-- featured-imagebox -->
                        <div class="featured-location">
                            <div class="row align-items-center">
                                <div class="col-xl-6 col-lg-12">
                                    <div class="featured-content">
                                        <div class="featured-title">
                                            <h3>Ontario City Office</h3>
                                        </div>
                                        <div class="location-img">
                                            <img width="226" height="111" class="img-fluid" src="/assets/images/location-img1.png" alt="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12">
                                    <div class="featured-desc">
                                        <div class="link">
                                            <a href="mailto:{{ get_settings()->email }}">contact.{{ get_settings()->email }} </a><br>
                                            <a href="tel:{{ get_settings()->phone }}"> {{ get_settings()->phone }}</a>
                                        </div>
                                        <div class="location-btn">
                                            <a class="prt-btn prt-btn-size-sm prt-btn-shape-rounded prt-btn-style-border prt-btn-color-white prt-btn-style-fill prt-btn-color-dark" href="#">Location</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- featured-imagebox end-->
                    </div>
                </div>
            </div>
        </section>
        <!--location-section end-->

    </div>

@endsection
