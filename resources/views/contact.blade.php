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
                                        <a title="Homepage" href="index.html">Home</a>
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
                                <img width="85" height="85" class="img-fluid" src="images/icon-10.png" alt="image">
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h3>Contact</h3>
                                </div>
                                <div class="featured-desc">
                                    <a href="mailto:location123@gmail.com"> location123@example.com </a><br>
                                    <a href="tel:+65276856485">+(652) 768 564 85</a>
                                </div>
                            </div>
                        </div><!-- featured-icon-box end -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <!-- featured-icon-box -->
                        <div class="featured-icon-box icon-align-before-content style4">
                            <div class="prt-icon-type-image">
                                <img width="85" height="85" class="img-fluid" src="images/icon-11.png" alt="image">
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h3>Become a Partner</h3>
                                </div>
                                <div class="featured-desc">
                                    <p class="mb-15">Lorem ipsum dolor sit amet, consectetur enas accumsan lacus vel facilisis. </p>
                                    <a href="#" class="prt-btn btn-inline">Join with Us</a>
                                </div>
                            </div>
                        </div><!-- featured-icon-box end -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <!-- featured-icon-box -->
                        <div class="featured-icon-box icon-align-before-content style4">
                            <div class="prt-icon-type-image">
                                <img width="85" height="85" class="img-fluid" src="images/icon-12.png" alt="image">
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
                                        <h2 class="title">Let’s talk with expertise</h2>
                                    </div>
                                </div><!-- section title end -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form action="#" class="query_form wrap-form clearfix mt-15 res-991-mt-0 position-relative" method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>
                                        <span class="text-input"><input name="name" type="text" value="" placeholder="First name" required="required"></span>
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label>
                                        <span class="text-input"><input name="email" type="text" value="" placeholder="Email address" required="required"></span>
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label>
                                        <span class="text-input"><input name="phone" type="text" value="" placeholder="Phone number" required="required"></span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label>
                                        <span class="text-input"><input name="zipcode" type="text" value="" placeholder="Zip code" required="required"></span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label>
                                            <span class="text-input select-option">
                                                <select name="menu-232">
                                                    <option value="none" selected disabled hidden>Select service</option>
                                                    <option value="General Builder">General Builder</option>
                                                    <option value="House Extensions">House Extensions</option>
                                                    <option value="Electrical Services">Electrical Services</option>
                                                    <option value="Civil & Structure">Civil & Structure</option>
                                                    <option value="Multistory Build">Multistory Build</option>
                                                    <option value="Disaster Response">Disaster Response</option>
                                                </select>
                                            </span>
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <label>
                                        <span class="text-input"><textarea name="message" rows="5" placeholder="Your message here" required="required"></textarea></span>
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-btn d-flex align-items-center justify-content-center mt-15">
                                        <button class="prt-btn prt-btn-size-md prt-btn-shape-rounded prt-btn-style-border prt-btn-color-white" type="submit">Send Message</button>
                                        <p class="mb-0 pl-15">Been here before? <a class="underline" href="#">Check your query</a></p>
                                    </div>
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
                                            <img width="226" height="111" class="img-fluid" src="images/location-img1.png" alt="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12">
                                    <div class="featured-desc">
                                        <div class="link">
                                            <a href="mailto:contact.ourlocation@example.com">contact.location@example.com </a><br>
                                            <a href="tel:+65276856485"> +(652) 768 564 85</a>
                                        </div>
                                        <div class="location-btn">
                                            <a class="prt-btn prt-btn-size-sm prt-btn-shape-rounded prt-btn-style-border prt-btn-color-white prt-btn-style-fill prt-btn-color-dark" href="contact-us.html">Location</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- featured-imagebox end-->
                        <!-- featured-imagebox -->
                        <div class="featured-location">
                            <div class="row align-items-center">
                                <div class="col-xl-6 col-lg-12">
                                    <div class="featured-content">
                                        <div class="featured-title">
                                            <h3>Las Vegas Office</h3>
                                        </div>
                                        <div class="location-img">
                                            <img width="249" height="96" class="img-fluid" src="images/location-img2.png" alt="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12">
                                    <div class="featured-desc">
                                        <div class="link">
                                            <a href="mailto:contact.ourlocation@example.com">contact.location@example.com </a><br>
                                            <a href="tel:+65276856485"> +(652) 768 564 85</a>
                                        </div>
                                        <div class="location-btn">
                                            <a class="prt-btn prt-btn-size-sm prt-btn-shape-rounded prt-btn-style-border prt-btn-color-white prt-btn-style-fill prt-btn-color-dark" href="contact-us.html">Location</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- featured-imagebox end-->
                        <!-- featured-imagebox -->
                        <div class="featured-location">
                            <div class="row align-items-center">
                                <div class="col-xl-6 col-lg-12">
                                    <div class="featured-content">
                                        <div class="featured-title">
                                            <h3>Ontario City Office</h3>
                                        </div>
                                        <div class="location-img">
                                            <img width="226" height="111" class="img-fluid" src="images/location-img1.png" alt="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12">
                                    <div class="featured-desc">
                                        <div class="link">
                                            <a href="mailto:contact.ourlocation@example.com">contact.location@example.com </a><br>
                                            <a href="tel:+65276856485"> +(652) 768 564 85</a>
                                        </div>
                                        <div class="location-btn">
                                            <a class="prt-btn prt-btn-size-sm prt-btn-shape-rounded prt-btn-style-border prt-btn-color-white prt-btn-style-fill prt-btn-color-dark" href="contact-us.html">Location</a>
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
