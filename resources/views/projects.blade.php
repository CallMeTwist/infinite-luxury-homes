@extends('layouts.master', [
    $title = 'Our Projects',
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
                                <h2 class="title">Our Portfolio</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                    <span>
                                        <a title="Homepage" href="index.html">Home</a>
                                    </span>
                                <span class="active">Our Portfolio</span>
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

        <!-- portfolio section -->
        <section class="prt-row prt-bg portfolio-section prt-portfoliobox clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
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
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <article class="prt-box prt-box-portfolio prt-portfoliobox-style1 ">
                            <div class="prt-post-item" data-cursor-tooltip="">
                                <div class="prt-post-item-inner">
                                    <div class="prt-featured-wrapper prt-tm_portfolio-featured-wrapper">
                                        <a href="portfolio-details.html"><img width="480" height="500" src="images/portfolio/portfolio-06.jpg" class="img-fluid" alt="image" decoding="async" loading="lazy"></a>
                                    </div>
                                    <div class="prt-animation-hover-button">
                                        <div class="prt-project-readmore-btn">
                                            <h3><a href="portfolio-details.html" rel="bookmark">Kitchen and Living</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
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
                    <div class="col-lg-4 col-md-6 col-sm-12">
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
                    <div class="col-lg-4 col-md-6 col-sm-12">
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
                    <div class="col-lg-4 col-md-6 col-sm-12">
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

    </div>

@endsection
