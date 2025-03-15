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
                                <h2 class="title">Faq</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                    <span>
                                        <a title="Homepage" href="index.html">Home</a>
                                    </span>
                                <span class="active">Faq</span>
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

        <!--faq-section-->
        <section class="prt-row faq-section clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-12 m-auto">
                        <!-- section title -->
                        <div class="section-title title-style-center_text">
                            <div class="title-header">
                                <h3>Have Any Questions?</h3>
                                <h2 class="title">Recently Asked <span>Questions?</span></h2>
                            </div>
                            <div class="title-desc">
                                <p class="w-100">Below you’ll find answers to some of the most frequently asked questions. We are constantly adding most frequently asked question to this page.</p>
                            </div>
                        </div>
                        <!-- section title end -->
                    </div>
                </div>
                <div class="row mt-20 res-991-mt-0">
                    <div class="col-lg-6 col-md-12">
                        <div class="accordion style1">
                            <!-- toggle -->
                            <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                <div class="toggle-title"><a href="#" class="active">How would I go about planning for my retirement?</a></div>
                                <div class="toggle-content show">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                                </div>
                            </div><!-- toggle end -->
                            <!-- toggle -->
                            <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                <div class="toggle-title"><a href="#">What are pools how and how to join them?</a></div>
                                <div class="toggle-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                                </div>
                            </div><!-- toggle end -->
                            <!-- toggle -->
                            <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                <div class="toggle-title"><a href="#">What are the delivery types?</a></div>
                                <div class="toggle-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                                </div>
                            </div><!-- toggle end -->
                            <!-- toggle -->
                            <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                <div class="toggle-title"><a href="#">Is there a discount code?</a></div>
                                <div class="toggle-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                                </div>
                            </div><!-- toggle end -->
                            <!-- toggle -->
                            <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                <div class="toggle-title"><a href="#">Can I change my order?</a></div>
                                <div class="toggle-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                                </div>
                            </div><!-- toggle end -->
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="accordion style1">
                            <!-- toggle -->
                            <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                <div class="toggle-title"><a href="#" class="active">Can I use trademarked names in my items?</a></div>
                                <div class="toggle-content show">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                                </div>
                            </div><!-- toggle end -->
                            <!-- toggle -->
                            <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                <div class="toggle-title"><a href="#">Which countries can I shop online?</a></div>
                                <div class="toggle-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                                </div>
                            </div><!-- toggle end -->
                            <!-- toggle -->
                            <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                <div class="toggle-title"><a href="#">Our Community Mission</a></div>
                                <div class="toggle-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                                </div>
                            </div><!-- toggle end -->
                            <!-- toggle -->
                            <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                <div class="toggle-title"><a href="#">Can I offer my items for free on a promotional basis?</a></div>
                                <div class="toggle-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                                </div>
                            </div><!-- toggle end -->
                            <!-- toggle -->
                            <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                <div class="toggle-title"><a href="#">What is your strategy?</a></div>
                                <div class="toggle-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                                </div>
                            </div><!-- toggle end -->
                        </div>
                    </div>
                </div><!-- row end -->
            </div>
        </section>
        <!--faq-section end-->

    </div><!-- site-main end-->


@endsection
