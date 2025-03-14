@extends('layouts.master', [
    $title = 'Our Projects',
    $tags = "data-page='projects' data-page-parent='projects'"
])

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/projects.min.css') }}">
@endsection

@section('header')
    <header class="page primary-bg">
        <div class="container">
            <div class="section_header">
                <span class="subtitle subtitle--extended">Building communities</span>
                <h1 class="title">Our Projects</h1>
                <ul class="breadcrumbs">
                    <li class="breadcrumbs_item"><a href="/">Home</a></li>
                    <li class="breadcrumbs_item breadcrumbs_item--current"><span>Projects</span></li>
                </ul>
            </div>
        </div>
        <div class="media">
            <picture>
                <img class="" data-src="/assets/img/plan.png" src="/assets/img/plan.png" alt="media">
            </picture>
        </div>
    </header>
@endsection

@section('content')

    <main class="projects section">
        <div class=container>
            <ul class=projects_list>
                @foreach($projects as $project)
                    <li class=projects_list-item>
                        <div class=media data-aos=zoom-in-right>
                            <picture>
                                <img class=lazy data-src="{{ asset($project->image) }}" src="{{ $project->image }}" alt="{{ $project->name }}">
                            </picture>
                        </div>
                        <div class=main>
                            <h3 class=main_title data-aos=fade-in><span class=text>{{ $project->name }}</span> <span class="divider divider--line" data-aos=slide-right></span></h3>
                            <div class=main_info>
                                <span class=location data-aos=fade-in data-aos-delay=50><i class="icon-location icon"></i> {{ $project->location }} </span>
                                <span class="location mb-0 col-green col-bold">{!! config('currency')[get_settings()->currency] !!}{{ $project->pricing }}</span>
                            </div>
                            <div class="card-body p-0 m-t-10">
                                <iframe src="{{ $project->map }}" width="100%" height="220px"></iframe>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </main>

@endsection
