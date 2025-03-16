@extends('layouts.master', [
    $title = 'Welcome',
])


@section('content')

    <div class="prt-slider-wrapper bg-base-dark">
        <div class="prt-slider-wide">
            <!-- START landingpage REVOLUTION SLIDER 6.5.31 --><p class="rs-p-wp-fix"></p>
            <rs-module-wrap id="rev_slider_11_1_wrapper" data-alias="landingpage" data-source="gallery">
                <rs-module id="rev_slider_11_1" style="" data-version="6.5.31">
                    <rs-slides>
                        <rs-slide data-key="rs-29" data-title="Slide" data-anim="adpr:false;" data-in="o:0;" data-out="a:false;">

                            <img src="/assets/images/slides/slider-mainbg-001.jpg" alt="" title="slider-banner-img-02" width="1920" height="740" class="rev-slidebg tp-rs-img rs-lazyload" data-lazyload="/assets/images/slides/slider-mainbg-001.jpg" data-bg="p:center top;f:auto;" data-parallax="off" data-no-retina>

                            <rs-layer
                                id="slider-11-slide-29-layer-0"
                                data-type="text"
                                data-rsp_ch="on"
                                data-xy="xo:6px,6px,210px,135px;yo:202px,202px,170px,160px;"
                                data-text="w:normal;s:120,120,71,43;l:124,124,73,45;fw:600;"
                                data-frame_0="o:1;"
                                data-frame_0_chars="d:5;y:100%;o:0;rZ:-35deg;"
                                data-frame_0_mask="u:t;"
                                data-frame_1="x:1px,0px,0px,0px;st:300;sp:800;"
                                data-frame_1_chars="e:power4.inOut;d:10;rZ:0deg;"
                                data-frame_1_mask="u:t;"
                                data-frame_999="o:0;st:w;"
                                style="z-index:10;font-family:'Space Grotesk';"
                            >Innovative
                            </rs-layer>

                            <rs-layer
                                id="slider-11-slide-29-layer-1"
                                data-type="text"
                                data-color="#e4ee5b"
                                data-rsp_ch="on"
                                data-xy="xo:125px,125px,160px,105px;yo:327px,327px,250px,205px;"
                                data-text="w:normal;s:120,120,71,43;l:124,124,73,45;fw:600;"
                                data-frame_0="o:1;"
                                data-frame_0_chars="d:5;y:100%;o:0;rZ:-35deg;"
                                data-frame_0_mask="u:t;"
                                data-frame_1="x:1px,0px,0px,0px;y:1px,0px,0px,0px;st:350;sp:850;"
                                data-frame_1_chars="e:power4.inOut;d:10;rZ:0deg;"
                                data-frame_1_mask="u:t;"
                                data-frame_999="o:0;st:w;"
                                style="z-index:11;font-family:'Space Grotesk';"
                            >Real Estate
                            </rs-layer>

                            <rs-layer
                                id="slider-11-slide-29-layer-2"
                                data-type="text"
                                data-rsp_ch="on"
                                data-xy="xo:10px,10px,230px,145px;yo:448px,448px,316px,250px;"
                                data-text="w:normal;s:120,120,71,43;l:124,124,73,45;fw:600;"
                                data-frame_0="o:1;"
                                data-frame_0_chars="d:5;y:100%;o:0;rZ:-35deg;"
                                data-frame_0_mask="u:t;"
                                data-frame_1="st:400;sp:900;"
                                data-frame_1_chars="e:power4.inOut;d:10;rZ:0deg;"
                                data-frame_1_mask="u:t;"
                                data-frame_999="o:0;st:w;"
                                style="z-index:12;font-family:'Space Grotesk';"
                            >Solutions
                            </rs-layer>

                            <rs-layer
                                id="slider-11-slide-29-layer-3"
                                class="rs-pxl-1"
                                data-type="image"
                                data-rsp_ch="on"
                                data-xy="xo:773px,773px,450px,270px;yo:200px,210px,140px,83px;"
                                data-text="w:normal;s:20,15,11,6;l:0,19,14,8;"
                                data-dim="w:154px,154px,91px,56px;h:440px,440px,262px,161px;"
                                data-border="bor:10px,10px,10px,10px;"
                                data-vbility="t,t,f,f"
                                data-frame_0="y:50,50,28,17;"
                                data-frame_1="st:170;sp:1000;sR:170;"
                                data-frame_999="o:0;st:w;sR:7830;"
                                style="z-index:9;"
                            ><img src="/assets/images/slides/img-01.png" alt="" class="tp-rs-img" data-no-retina>
                            </rs-layer>

                            <rs-layer
                                id="slider-11-slide-29-layer-4"
                                class="rs-pxl-1"
                                data-type="image"
                                data-rsp_ch="on"
                                data-xy="xo:977px,977px,564px,340px;yo:150px,160px,110px,70px;"
                                data-text="w:normal;s:20,15,11,6;l:0,19,14,8;"
                                data-dim="w:322px,322px,192px,118px;h:540px,540px,322px,198px;"
                                data-border="bor:10px,10px,10px,10px;"
                                data-vbility="t,t,f,f"
                                data-frame_0="y:50,50,28,17;"
                                data-frame_1="st:170;sp:1000;sR:170;"
                                data-frame_999="o:0;st:w;sR:7830;"
                                style="z-index:9;"
                            ><img src="/assets/images/slides/img-02.png" alt="" class="tp-rs-img" data-no-retina>
                            </rs-layer>

                        </rs-slide>
                    </rs-slides>
                </rs-module>
            </rs-module-wrap>
            <!-- END REVOLUTION SLIDER -->
        </div>
    </div>

    <!-- site-main start -->
    <div class="site-main">

        <!--about-section-->
        <section class="prt-row about-section clearfix" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-once="true">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                        <div class="pr-20 res-1199-pr-0">
                            <div class="big-title">1995 - 2023</div>
                            <div class="prt_single_image-wrapper mt-30 text-start">
                                <img width="614" height="290" class="img-fluid border-rad_10" src="/assets/images/single-img-01.jpg" alt="single-1">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                        <div class="pl-20 res-1199-pl-0 res-1199-mt-30">
                            <!-- section title -->
                            <div class="section-title">
                                <div class="title-header pb-0">
                                    <h3>High Performance</h3>
                                    <h2 class="title">Urban lifestyle company</h2>
                                </div>
                                <div class="title-desc">
                                    <p>Infinite Luxury Homes specializes in crafting exceptional luxury residences and high-end developments. With a commitment to quality and innovation, we bring visionary designs to life, ensuring elegance, functionality, and lasting value in every project.</p>
                                </div>
                            </div><!-- section title end -->
                            <div class="prt-iconbox-wrapper">
                                <div class="prt-box-icon"><i class="fas fa-check"></i></div>
                                <div class="prt-iconbox-heading">
                                    <p>Get the tips and tricks for managing your project and staying within your budget.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- row end -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="horizontal-sepretor mt-80 mb-70 res-991-mt-30 res-991-mb-30 "></div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-3 col-md-12">
                        <div class="clients-content">
                            <h2>Our most important goal is to make our clients happy</h2>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12">
                        <!-- slick_slider -->
                        <div class="row slick_slider res-991-mt-30" data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "arrows":false, "dots":false, "autoplay":true, "infinite":true, "responsive": [{"breakpoint":1201,"settings":{"slidesToShow": 3}}, {"breakpoint":601,"settings":{"slidesToShow": 2,"arrows":false}}, {"breakpoint":376,"settings":{"slidesToShow": 1}}]}'>
                            <div class="col-lg-3">
                                <div class="client-box">
                                    <div class="client-thumbnail">
                                        <img width="197" height="32" class="img-fluid" src="/assets/images/client/client-01.png" alt="image">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="client-box">
                                    <div class="client-thumbnail">
                                        <img width="201" height="37" class="img-fluid" src="/assets/images/client/client-02.png" alt="image">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="client-box">
                                    <div class="client-thumbnail">
                                        <img width="146" height="28" class="img-fluid" src="/assets/images/client/client-03.png" alt="image">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="client-box">
                                    <div class="client-thumbnail">
                                        <img width="160" height="39" class="img-fluid" src="/assets/images/client/client-04.png" alt="image">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="client-box">
                                    <div class="client-thumbnail">
                                        <img width="180" height="39" class="img-fluid" src="/assets/images/client/client-05.png" alt="image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--about-section end-->

        <!--bg-base-dark-->
        <section class="prt-row bg-base-dark prt-bg prt-bgimage-yes bg-img1 fid-section clearfix">
            <div class="prt-row-wrapper-bg-layer prt-bg-layer bg-base-dark"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-12 m-auto">
                        <!-- section title -->
                        <div class="section-title title-style-center_text">
                            <div class="title-header">
                                <h2 class="title mb-0">We help you navigate real estate challenges with innovative solutions.</h2>
                            </div>
                        </div><!-- section title end -->
                    </div>
                </div>
                <div class="row mt-35 res-991-mt-10 res-767-mt-0" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-once="true">
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <!--prt-fid-->
                        <div class="prt-fid inside style1">
                            <div class="prt-fid-contents text-left">
                                <h4 class="prt-fid-inner">
                                        <span   data-appear-animation="animateDigits"
                                                data-from="0"
                                                data-to="8"
                                                data-interval="1"
                                                data-before=""
                                                data-before-style="sup"
                                                data-after=""
                                                data-after-style="sub"
                                                class="numinate">8
                                        </span>
                                    <span>hr</span>
                                </h4>
                                <h3 class="prt-fid-title">Delivering top-quality real estate solutions.</h3>
                            </div>
                        </div><!-- prt-fid end-->
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <!--prt-fid-->
                        <div class="prt-fid inside style1">
                            <div class="prt-fid-contents text-left">
                                <h4 class="prt-fid-inner">
                                        <span   data-appear-animation="animateDigits"
                                                data-from="0"
                                                data-to="12"
                                                data-interval="2"
                                                data-before=""
                                                data-before-style="sup"
                                                data-after=""
                                                data-after-style="sub"
                                                class="numinate">12
                                        </span>
                                    <span>k</span>
                                </h4>
                                <h3 class="prt-fid-title">With great satisfied customers & counting</h3>
                            </div>
                        </div><!-- prt-fid end-->
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <!--prt-fid-->
                        <div class="prt-fid inside style1">
                            <div class="prt-fid-contents text-left">
                                <h4 class="prt-fid-inner">
                                        <span   data-appear-animation="animateDigits"
                                                data-from="0"
                                                data-to="1"
                                                data-interval="1"
                                                data-before=""
                                                data-before-style="sup"
                                                data-after=""
                                                data-after-style="sub"
                                                class="numinate">1
                                        </span>
                                    <span>m</span>
                                </h4>
                                <h3 class="prt-fid-title">1 million clients across diverse industries.</h3>
                            </div>
                        </div><!-- prt-fid end-->
                    </div>
                </div>
            </div>
        </section>
        <!--bg-base-dark end-->

        <!-- portfolio section -->
        <section class="prt-row padding_zero-section overflow-hidden clearfix">
            <div class="container-fluid p-0">
                <div class="row slick_slider g-0" data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "arrows":false, "dots":false, "autoplay":true, "infinite":true, "responsive": [{"breakpoint":1050,"settings":{"slidesToShow": 3,"arrows":false,"autoplay":true}}, {"breakpoint":660,"settings":{"slidesToShow": 2,"arrows":false}}, {"breakpoint":481,"settings":{"slidesToShow": 1}}]}'>
                    @foreach($projects as $project)
                        <div class="col-lg-3">
                        <article class="prt-box prt-box-portfolio prt-portfoliobox-style1 ">
                            <div class="prt-post-item" data-cursor-tooltip="">
                                <div class="prt-post-item-inner">
                                    <div class="prt-featured-wrapper prt-tm_portfolio-featured-wrapper">
                                        <a href="portfolio-details.html"><img width="480" height="500" src="{{ asset($project->image) }}" class="img-fluid" alt="image" decoding="async" loading="lazy"></a>
                                    </div>
                                    <div class="prt-animation-hover-button">
                                        <div class="prt-project-readmore-btn">
                                            <h3><a href="portfolio-details.html" rel="bookmark">{{ $project->name }}</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- portfolio-section-end -->

        <!--service-section-->
        <section class="prt-row bg-base-grey prt-bg prt-bgimage-yes bg-img4 service-section clearfix">
            <div class="prt-row-wrapper-bg-layer prt-bg-layer bg-base-grey"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-12 prt-sticky-column">
                        <div class="p-0">
                            <!-- section title -->
                            <div class="section-title">
                                <div class="title-header">
                                    <h3>Our Best Services</h3>
                                    <h2 class="title">We create buildings that last.</h2>
                                </div>
                            </div><!-- section title end -->
                            <div class="row g-0 position-relative res-991-mt_20">
                                <div class="col-xl-5 col-lg-12">
                                    <div class="service-btn mb-15">
                                        <a href="services.html" class="prt-btn prt-btn-size-md prt-btn-color-whitecolor btn-inline btn-underline">View All Services</a>
                                    </div>
                                </div>
                                <div class="col-xl-7 col-lg-12">
                                    <p>Expertise of all qualified employees provided the services</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-12 res-1199-mt-15">
                        <div id="frame_1">
                            <div class="featured-imagebox featured-imagebox-service style1">
                                <div class="featured-thumbnail">
                                    <img width="293" height="200" class="img-fluid" src="/assets/images/services/services-01-655x437.jpg" alt="img">
                                </div>
                                <div class="featured-content content-pl">
                                    <div class="featured-title">
                                        <h3><a href="general-builder.html">Luxury Home Construction</a></h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p>We specialize in building high-end homes with premium materials, modern designs, and exceptional craftsmanship.</p>
                                    </div>
                                    <div class="prt-service-button">
                                        <a href="general-builder.html">Continue Reading</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="frame_2">
                            <div class="featured-imagebox featured-imagebox-service style1">
                                <div class="featured-content content-pr">
                                    <div class="featured-title">
                                        <h3><a href="house-extensions.html">Bespoke Home Extensions & Renovations</a></h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p>We enhance existing spaces with custom renovations and seamless extensions, tailored to luxury living.</p>
                                    </div>
                                    <div class="prt-service-button">
                                        <a href="house-extensions.html">Continue Reading</a>
                                    </div>
                                </div>
                                <div class="featured-thumbnail">
                                    <img width="293" height="200" class="img-fluid" src="/assets/images/services/services-02-655x437.jpg" alt="img">
                                </div>
                            </div>
                        </div>
                        <div id="frame_3">
                            <div class="featured-imagebox featured-imagebox-service style1">
                                <div class="featured-thumbnail">
                                    <img width="293" height="200" class="img-fluid" src="/assets/images/services/services-03-655x437.jpg" alt="img">
                                </div>
                                <div class="featured-content content-pl">
                                    <div class="featured-title">
                                        <h3><a href="electrical-services.html">Smart Home & Mechanical Systems Integration</a></h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p>We install advanced automation, climate control, and mechanical systems for ultimate comfort and efficiency.</p>
                                    </div>
                                    <div class="prt-service-button">
                                        <a href="electrical-services.html">Continue Reading</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="frame_4">
                            <div class="featured-imagebox featured-imagebox-service style1">
                                <div class="featured-content content-pr">
                                    <div class="featured-title">
                                        <h3><a href="civil-structure.html">Structural & Architectural Engineering</a></h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p>We provide expert engineering solutions to ensure durability, safety, and aesthetic excellence in luxury homes.</p>
                                    </div>
                                    <div class="prt-service-button">
                                        <a href="civil-structure.html">Continue Reading</a>
                                    </div>
                                </div>
                                <div class="featured-thumbnail">
                                    <img width="293" height="200" class="img-fluid" src="/assets/images/services/services-04-655x437.jpg" alt="img">
                                </div>
                            </div>
                        </div>
                        <div id="frame_5">
                            <div class="featured-imagebox featured-imagebox-service style1">
                                <div class="featured-thumbnail">
                                    <img width="293" height="200" class="img-fluid" src="/assets/images/services/services-05-655x437.jpg" alt="img">
                                </div>
                                <div class="featured-content content-pl">
                                    <div class="featured-title">
                                        <h3><a href="multistory-build.html">High-End Commercial & Residential Developments</a></h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p>We design and construct upscale residential communities and commercial spaces with superior quality and innovation.</p>
                                    </div>
                                    <div class="prt-service-button">
                                        <a href="multistory-build.html">Continue Reading</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--service-section end-->

        <!--testimonial-section-->
        <section class="prt-row bg-base-dark prt-bg prt-bgimage-yes bg-img2 testimonial-section clearfix">
            <div class="prt-row-wrapper-bg-layer prt-bg-layer bg-base-dark"></div>
            <div class="container">
                <div class="row slick_slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "arrows":false, "dots":false, "autoplay":true, "infinite":true, "responsive": [{"breakpoint":1050,"settings":{"slidesToShow": 1,"arrows":false,"autoplay":true}},{"breakpoint":481,"settings":{"slidesToShow": 1}}]}'>
                    <div class="col-lg-12">
                        <!-- testimonials -->
                        <div class="testimonials prt-testimonial-box-view-style1">
                            <div class="testimonial-content">
                                <div class="testimonial-quote-img">
                                    <img width="59" height="57" src="/assets/images/icon-01.png" class="img-fluid" alt="image">
                                </div>
                                <blockquote class="testimonial-text">I was blown away by the quality of work the construction team delivered incredibly detail-oriented and made every aspect of project was executed flawlessly.</blockquote>
                                <div class="testimonial-caption">
                                    <div class="caption-text">CEO At Constructions</div>
                                    <h3>Judy Wells</h3>
                                </div>
                                <div class="testimonial-avatar">
                                    <div class="testimonial-img">
                                        <img width="60" height="60" class="img-fluid" src="/assets/images/testimonial/testimonial-01.jpg" alt="testimonial-img">
                                    </div>
                                </div>
                            </div>
                        </div><!-- testimonials end -->
                    </div>
                    <div class="col-lg-12">
                        <!-- testimonials -->
                        <div class="testimonials prt-testimonial-box-view-style1">
                            <div class="testimonial-content">
                                <div class="testimonial-quote-img">
                                    <img width="59" height="57" src="/assets/images/icon-01.png" class="img-fluid" alt="image">
                                </div>
                                <blockquote class="testimonial-text">The construction team was incredibly communicative throughout the entire process, always keeping us in the loop on progress and any changes that needed to be made.</blockquote>
                                <div class="testimonial-caption">
                                    <div class="caption-text">Manager</div>
                                    <h3>Alice Howard</h3>
                                </div>
                                <div class="testimonial-avatar">
                                    <div class="testimonial-img">
                                        <img width="60" height="60" class="img-fluid" src="/assets/images/testimonial/testimonial-02.jpg" alt="testimonial-img">
                                    </div>
                                </div>
                            </div>
                        </div><!-- testimonials end -->
                    </div>
                    <div class="col-lg-12">
                        <!-- testimonials -->
                        <div class="testimonials prt-testimonial-box-view-style1">
                            <div class="testimonial-content">
                                <div class="testimonial-quote-img">
                                    <img width="59" height="57" src="/assets/images/icon-01.png" class="img-fluid" alt="image">
                                </div>
                                <blockquote class="testimonial-text">We were very impressed with the level of professionalism exhibited by the construction team,by the construction team always on time and completed the job to our satisfaction.</blockquote>
                                <div class="testimonial-caption">
                                    <div class="caption-text">Manager</div>
                                    <h3>Aenna Bell</h3>
                                </div>
                                <div class="testimonial-avatar">
                                    <div class="testimonial-img">
                                        <img width="60" height="60" class="img-fluid" src="/assets/images/testimonial/testimonial-03.jpg" alt="testimonial-img">
                                    </div>
                                </div>
                            </div>
                        </div><!-- testimonials end -->
                    </div>
                </div>
            </div>
        </section>
        <!--testimonial-section end-->

    </div><!-- site-main end-->


@endsection
