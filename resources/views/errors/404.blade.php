@extends('layouts.master', [
])


@section('content')

    <div class="site-main">

        <section class="prt-row error-404 bg-base-dark">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="page-content-main text-center">
                            <div class="page-content">
                                <h2><i class="fa fa-thumbs-o-down"></i></h2>
                                <h3>404 Error</h3>
                                <p>This page isn’t available right now, but it will be soon. We appreciate your patience—good things take time!</p>
                            </div>
                            <div class="prt-404-search-form">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
