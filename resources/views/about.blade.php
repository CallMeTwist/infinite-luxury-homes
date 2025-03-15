@extends('layouts.master', [
    $title = 'About Us',
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
                                <h2 class="title">About Us</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                    <span>
                                        <a title="Homepage" href="index.html">Home</a>
                                    </span>
                                <span class="active">About Us</span>
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

        <!--bg-base-dark-->
        <section class="prt-row prt-bg bg-base-grey prt-bgimage-yes bg-img1 fid-sections clearfix" >
            <div class="prt-row-wrapper-bg-layer prt-bg-layer bg-base-grey"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section title -->
                        <div class="section-title title-style-center_text" data-aos="fade-up" data-aos-offset="200" data-aos-duration="1000" data-aos-once="true">
                            <div class="title-header">
                                <h3 class="text-base-skin">About Us</h3>
                                <h2 class="title mb-0">Over 25+ years experience urbanistic development company</h2>
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
                                <h3 class="prt-fid-title">Providing clients with top-quality solutions</h3>
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
                                <h3 class="prt-fid-title">1 million clients across diverse range of industries</h3>
                            </div>
                        </div><!-- prt-fid end-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="prt_single_image-wrapper mt-100 res-1199-mt-30 res-767-mt-15">
                            <img width="1300" height="500" class="img-fluid" src="images/single-img-02.jpg" alt="single-img">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--bg-base-dark end-->

        <!-- portfolio section -->
        <section class="prt-row padding_zero-section overflow-hidden clearfix">
            <div class="container-fluid p-0">
                <div class="row slick_slider g-0" data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "arrows":false, "dots":false, "autoplay":true, "infinite":true, "responsive": [{"breakpoint":1050,"settings":{"slidesToShow": 3,"arrows":false,"autoplay":true}}, {"breakpoint":660,"settings":{"slidesToShow": 2,"arrows":false}}, {"breakpoint":481,"settings":{"slidesToShow": 1}}]}'>
                    <div class="col-lg-3">
                        <article class="prt-box prt-box-portfolio prt-portfoliobox-style1 ">
                            <div class="prt-post-item" data-cursor-tooltip="">
                                <div class="prt-post-item-inner">
                                    <div class="prt-featured-wrapper prt-tm_portfolio-featured-wrapper">
                                        <a href="portfolio-details.html"><img width="480" height="500" src="images/portfolio/portfolio-01.jpg" class="img-fluid" alt="image" decoding="async" loading="lazy"></a>
                                    </div>
                                    <div class="prt-animation-hover-button">
                                        <div class="prt-project-readmore-btn">
                                            <h3><a href="portfolio-details.html" rel="bookmark">Building House</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-3">
                        <article class="prt-box prt-box-portfolio prt-portfoliobox-style1 ">
                            <div class="prt-post-item" data-cursor-tooltip="">
                                <div class="prt-post-item-inner">
                                    <div class="prt-featured-wrapper prt-tm_portfolio-featured-wrapper">
                                        <a href="portfolio-details.html"><img width="480" height="500" src="images/portfolio/portfolio-02.jpg" class="img-fluid" alt="image" decoding="async" loading="lazy"></a>
                                    </div>
                                    <div class="prt-animation-hover-button">
                                        <div class="prt-project-readmore-btn">
                                            <h3><a href="portfolio-details.html" rel="bookmark">Modern House</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-3">
                        <article class="prt-box prt-box-portfolio prt-portfoliobox-style1 ">
                            <div class="prt-post-item" data-cursor-tooltip="">
                                <div class="prt-post-item-inner">
                                    <div class="prt-featured-wrapper prt-tm_portfolio-featured-wrapper">
                                        <a href="portfolio-details.html"><img width="480" height="500" src="images/portfolio/portfolio-03.jpg" class="img-fluid" alt="image" decoding="async" loading="lazy"></a>
                                    </div>
                                    <div class="prt-animation-hover-button">
                                        <div class="prt-project-readmore-btn">
                                            <h3><a href="portfolio-details.html" rel="bookmark">Interior Texture</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-3">
                        <article class="prt-box prt-box-portfolio prt-portfoliobox-style1 ">
                            <div class="prt-post-item" data-cursor-tooltip="">
                                <div class="prt-post-item-inner">
                                    <div class="prt-featured-wrapper prt-tm_portfolio-featured-wrapper">
                                        <a href="portfolio-details.html"><img width="480" height="500" src="images/portfolio/portfolio-04.jpg" class="img-fluid" alt="image" decoding="async" loading="lazy"></a>
                                    </div>
                                    <div class="prt-animation-hover-button">
                                        <div class="prt-project-readmore-btn">
                                            <h3><a href="portfolio-details.html" rel="bookmark">Structural Concrete</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-3">
                        <article class="prt-box prt-box-portfolio prt-portfoliobox-style1 ">
                            <div class="prt-post-item" data-cursor-tooltip="">
                                <div class="prt-post-item-inner">
                                    <div class="prt-featured-wrapper prt-tm_portfolio-featured-wrapper">
                                        <a href="portfolio-details.html"><img width="480" height="500" src="images/portfolio/portfolio-05.jpg" class="img-fluid" alt="image" decoding="async" loading="lazy"></a>
                                    </div>
                                    <div class="prt-animation-hover-button">
                                        <div class="prt-project-readmore-btn">
                                            <h3><a href="portfolio-details.html" rel="bookmark">Interior Texture</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>
        <!-- portfolio-section-end -->

        <!--service01-section-->
        <section class="prt-row prt-bg bg-base-grey prt-bgimage-yes bg-img5 service-section01 clearfix">
            <div class="prt-row-wrapper-bg-layer prt-bg-layer bg-base-grey"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-5 prt-sticky-column">
                        <!-- section title -->
                        <div class="section-title">
                            <div class="title-header">
                                <h3>Our Mission</h3>
                                <h2 class="title">Empowering home building & renovation dreams</h2>
                            </div>
                        </div><!-- section title end -->
                    </div>
                    <div class="col-xl-5 col-lg-7">
                        <div>
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox featured-imagebox-service style2">
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3>Who we are</h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p>A team of passionate experts dedicated to providing the top-quality resources and various information on home building and renovation.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- featured-imagebox end-->
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox featured-imagebox-service style2">
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3>Who we do</h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p>We provide a comprehensive range of resources, information to help users navigate every aspect of home building and renovation process.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- featured-imagebox end-->
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox featured-imagebox-service style2">
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3>Our Mission</h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p>Our mission is to empower our users to achieve their home building and renovation dreams by providing top-quality resources and information.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- featured-imagebox end-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--service01-section end-->

        <!--listimgbox-section-->
        <section class="prt-row prt-bg bg-base-dark prt-bgimage-yes bg-img6 listimgbox-section overflow-hidden clearfix">
            <div class="prt-row-wrapper-bg-layer prt-bg-layer bg-base-dark"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-12 m-auto">
                        <!-- section title -->
                        <div class="section-title title-style-center_text">
                            <div class="title-header">
                                <h3 class="text-base-skin">Our Project</h3>
                                <h2 class="title">We help you overcome your technology challenges</h2>
                            </div>
                        </div><!-- section title end -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="prt_listimgbox mt-70 res-991-mt-30 res-575-mt-0">
                            <div class="prt_listimgbox_wrapper">
                                <ul class="prt_listimgbox_list_content">
                                    <li class="prt_listimgbox_wrap active">
                                        <h3 class="box-title">The Custom Home Building Project 2019</h3>
                                        <div class="prt-listimgbox-desc">
                                            <p>We completed a custom home building project for a family in a suburban neighbourhood.</p>
                                        </div>
                                        <div class="award_picture">
                                            <img width="402" height="250" src="images/listbox1.jpg" class="img-fluid" alt="image" decoding="async" loading="lazy">
                                        </div>
                                    </li>
                                    <li class="prt_listimgbox_wrap">
                                        <h3 class="box-title">The Outdoor Living Space Project 2020</h3>
                                        <div class="prt-listimgbox-desc">
                                            <p>We completed an outdoor living space project for family who want to create an entertainment space in their backyard.</p>
                                        </div>
                                        <div class="award_picture">
                                            <img width="402" height="250" src="images/listbox2.jpg" class="img-fluid" alt="image" decoding="async" loading="lazy">
                                        </div>
                                    </li>
                                    <li class="prt_listimgbox_wrap">
                                        <h3 class="box-title">The Basement Remodelling Project 2021</h3>
                                        <div class="prt-listimgbox-desc">
                                            <p>We completed a basement remodelling project for homeowner who wanted to create functional and comfortable living space.</p>
                                        </div>
                                        <div class="award_picture">
                                            <img width="402" height="250" src="images/single-img-01.jpg" class="img-fluid" alt="image" decoding="async" loading="lazy">
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--listimgbox-section end-->

        <!--blog-section-->
        <section class="prt-row prt-bg blog-section clearfix">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-6 col-md-6 col-sm-6">
                        <div class="d-flex justify-content-between align-items-center">
                            <!-- section title -->
                            <div class="section-title">
                                <div class="title-header">
                                    <h3>Our Blog</h3>
                                    <h2 class="title">Our recent blog</h2>
                                </div>
                            </div><!-- section title end -->
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 col-md-6 col-sm-6">
                        <div class="pricingplan-text">
                            <span>20+</span>
                            <p>Best Latest<br>Blogs</p>
                        </div>
                    </div>
                </div>
                <!-- row -->
                <div class="row row-equal-height res-575-mt-15">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <!-- featured-imagebox-post -->
                        <div class="featured-imagebox featured-imagebox-post">
                            <div class="featured-thumbnail">
                                <img width="354" height="200" class="img-fluid" src="images/blog/blog-img-01.jpg" alt="">
                            </div>
                            <!-- featured-content -->
                            <div class="featured-content">
                                <div class="featured-content-inner">
                                    <!-- post-meta -->
                                    <div class="post-meta">
                                        <span class="prt-meta-category"><a href="blog-details.html">Builders</a></span>
                                        <span class="prt-meta-comment"><i class="icon-comment-1"></i> 0 Comments</span>
                                    </div><!-- post-meta end -->
                                    <div class="post-title">
                                        <h3><a href="blog-details.html">Best Cement Roof Manufacture Company</a></h3>
                                    </div>
                                    <div class="post-btn">
                                        <a href="blog-details.html" class="prt-btn prt-btn-size-md prt-btn-color-whitecolor btn-inline btn-underline">View More</a>
                                    </div>
                                </div>
                            </div><!-- featured-content end -->
                        </div><!-- featured-imagebox-post end -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <!-- featured-imagebox-post -->
                        <div class="featured-imagebox featured-imagebox-post">
                            <div class="featured-thumbnail">
                                <img width="354" height="200" class="img-fluid" src="images/blog/blog-img-02.jpg" alt="">
                            </div>
                            <!-- featured-content -->
                            <div class="featured-content">
                                <div class="featured-content-inner">
                                    <!-- post-meta -->
                                    <div class="post-meta">
                                        <span class="prt-meta-category"><a href="blog-details.html">Builders</a></span>
                                        <span class="prt-meta-comment"><i class="icon-comment-1"></i> 0 Comments</span>
                                    </div><!-- post-meta end -->
                                    <div class="post-title">
                                        <h3><a href="blog-details.html">Improve Workflow With Agile Construction</a></h3>
                                    </div>
                                    <div class="post-btn">
                                        <a href="blog-details.html" class="prt-btn prt-btn-size-md prt-btn-color-whitecolor btn-inline btn-underline">View More</a>
                                    </div>
                                </div>
                            </div><!-- featured-content end -->
                        </div><!-- featured-imagebox-post end -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <!-- featured-imagebox-post -->
                        <div class="featured-imagebox featured-imagebox-post">
                            <div class="featured-thumbnail">
                                <img width="354" height="200" class="img-fluid" src="images/blog/blog-img-03.jpg" alt="">
                            </div>
                            <!-- featured-content -->
                            <div class="featured-content">
                                <div class="featured-content-inner">
                                    <!-- post-meta -->
                                    <div class="post-meta">
                                        <span class="prt-meta-category"><a href="blog-details.html">Builders</a></span>
                                        <span class="prt-meta-comment"><i class="icon-comment-1"></i> 0 Comments</span>
                                    </div><!-- post-meta end -->
                                    <div class="post-title">
                                        <h3><a href="blog-details.html">The 9 Best Guideline For The Construction</a></h3>
                                    </div>
                                    <div class="post-btn">
                                        <a href="blog-details.html" class="prt-btn prt-btn-size-md prt-btn-color-whitecolor btn-inline btn-underline">View More</a>
                                    </div>
                                </div>
                            </div><!-- featured-content end -->
                        </div><!-- featured-imagebox-post end -->
                    </div>
                </div>
                <!-- row end -->
            </div>
        </section>
        <!--blog-section end-->

    </div><!-- site-main end-->

@endsection
