<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ config('app.name') }}">

    <!-- FAVICONS ICON -->
    <link rel="icon" href="/assets/images/favicon2.png" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/favicon2.png" />

    <title>{{ $title ?? 'Welcome' }} | {{ config('app.name') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('kit/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('kit/assets/css/bootstrap-utilities.min.css') }}" rel="stylesheet">
    <link href="{{ asset('kit/assets/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('kit/assets/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('kit/assets/css/helpers.css') }}" rel="stylesheet">

    {{ $css ?? '' }}

</head>
<body>
    <nav class="sb-topnav navbar navbar-expand navbar-light bg-whitesmoke">
        <a class="navbar-brand text-center" href="{{ route('panel.dashboard') }}">
            <img src="{{ asset('assets/images/infinite luxury logo 2.png') }}" class="w-100 p-t-70" />
        </a>
        <div class="d-flex align-items-center justify-content-between">
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('panel.settings.profile.manage') }}">Settings</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="{{ route('panel.logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light bg-whitesmoke m-t-50" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Home</div>
                        <a class="nav-link {{ request()->is('panel/dashboard') ? 'active' : '' }}" href="{{ route('panel.dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt m-r-10"></i></div>
                            Dashboard
                        </a>

                        <a class="nav-link collapsed {{ request()->is('panel/dashboard/settings/*') ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSettings"
                           aria-expanded="{{ request()->is('panel/dashboard/settings/*') ? 'true' : 'false' }}" aria-controls="collapseRealtors">
                            <div class="sb-nav-link-icon"><i class="fas fa-cogs m-r-10"></i></div>
                            System Settings
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse {{ request()->is('panel/dashboard/settings/*') ? 'show' : '' }}" id="collapseSettings" aria-labelledby="System Settings" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link {{ request()->is('panel/dashboard/settings/profile') ? 'active' : '' }}" href="{{ route('panel.settings.profile.manage') }}">
                                    <i class="fa fa-user-cog m-r-10"></i> Account Settings</a>
                                <a class="nav-link {{ request()->is('panel/dashboard/settings/manage') ? 'active' : '' }}" href="{{ route('panel.settings.manage') }}">
                                    <i class="fa fa-cogs m-r-10"></i> System Settings</a>
                                <a class="nav-link {{ request()->is('panel/dashboard/settings/legals') ? 'active' : '' }}" href="{{ route('panel.settings.legals.manage') }}">
                                    <i class="fa fa-gavel m-r-10"></i> Legal Terms</a>
                            </nav>
                        </div>

{{--                        <a class="nav-link collapsed {{ request()->is('panel/dashboard/marketing/*') ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseRealtors"--}}
{{--                           aria-expanded="{{ request()->is('panel/dashboard/marketing/*') ? 'true' : 'false' }}" aria-controls="collapseRealtors">--}}
{{--                            <div class="sb-nav-link-icon"><i class="fas fa-briefcase m-r-10"></i></div>--}}
{{--                            Marketing System--}}
{{--                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>--}}
{{--                        </a>--}}
{{--                        <div class="collapse {{ request()->is('panel/dashboard/marketing/*') ? 'show' : '' }}" id="collapseRealtors" aria-labelledby="Realtors System" data-bs-parent="#sidenavAccordion">--}}
{{--                            <nav class="sb-sidenav-menu-nested nav">--}}
{{--                                <a href="{{ route('panel.marketing.clients.manage') }}" class="nav-link {{ request()->is('panel/dashboard/marketing/clients') || request()->is('panel/dashboard/marketing/clients/*') ? 'active' : '' }}">--}}
{{--                                    <i class="fas fa-users-cog m-r-10"></i> Clients</a>--}}
{{--                                <a href="{{ route('panel.marketing.affiliates') }}" class="nav-link {{ request()->is('panel/dashboard/marketing/affiliates') || request()->is('panel/dashboard/marketing/affiliates/*') ? 'active' : '' }}">--}}
{{--                                    <i class="fas fa-users-rays m-r-10"></i> Realtors</a>--}}
{{--                                <a href="{{ route('panel.marketing.affiliates.kyc.manage') }}" class="nav-link {{ request()->is('panel/dashboard/marketing/kyc') ? 'active' : '' }}">--}}
{{--                                    <i class="fas fa-user-check m-r-10"></i> KYC Manager</a>--}}
{{--                                <a href="{{ route('panel.marketing.affiliates.withdrawals.manage') }}" class="nav-link {{ request()->is('panel/dashboard/marketing/withdrawals') || request()->is('panel/dashboard/marketing/withdrawals/*') ? 'active' : '' }}">--}}
{{--                                    <i class="fas fa-money-bill m-r-10"></i> Withdrawals</a>--}}
{{--                                <a href="{{ route('panel.marketing.estates.manage') }}" class="nav-link {{ request()->is('panel/dashboard/marketing/estates') || request()->is('panel/dashboard/marketing/estates/*') ? 'active' : '' }}">--}}
{{--                                    <i class="fas fa-map m-r-10"></i> Estates</a>--}}
{{--                                <a href="{{ route('panel.marketing.sales') }}" class="nav-link {{ request()->is('panel/dashboard/marketing/sales') || request()->is('panel/dashboard/marketing/sales/*') ? 'active' : '' }}">--}}
{{--                                    <i class="fas fa-receipt m-r-10"></i>Sales</a>--}}
{{--                                <a href="{{ route('panel.marketing.locations.manage') }}" class="nav-link {{ request()->is('panel/dashboard/marketing/locations') || request()->is('panel/dashboard/marketing/locations/*') ? 'active' : '' }}">--}}
{{--                                    <i class="fas fa-map-location m-r-10"></i>Location</a>--}}
{{--                            </nav>--}}
{{--                        </div>--}}

                        <a class="nav-link collapsed {{ request()->is('panel/dashboard/website/*') ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseWebsite"
                           aria-expanded="{{ request()->is('panel/dashboard/website/*') ? 'true' : 'false' }}" aria-controls="collapseWebsite">
                            <div class="sb-nav-link-icon"><i class="fas fa-globe m-r-10"></i></div>
                            Website Elements
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse {{ request()->is('panel/dashboard/website/*') ? 'show' : '' }}" id="collapseWebsite" aria-labelledby="Website Elements" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link {{ request()->is('panel/dashboard/website/testimonials') ? 'active' : '' }}" href="{{ route('panel.website.testimonials.manage') }}">
                                    <i class="fas fa-comment-dots m-r-10"></i> Testimonials</a>
                                <a class="nav-link {{ request()->is('panel/dashboard/website/faqs') ? 'active' : '' }}" href="{{ route('panel.website.faqs.manage') }}">
                                    <i class="fas fa-question-circle m-r-10"></i> FAQs</a>
                                <a class="nav-link {{ request()->is('panel/dashboard/website/team') ? 'active' : '' }}" href="{{ route('panel.website.team.manage') }}">
                                    <i class="fas fa-users-cog m-r-10"></i> Team Members</a>
                                <a class="nav-link {{ request()->is('panel/dashboard/website/brands') ? 'active' : '' }}" href="{{ route('panel.website.brands.manage') }}">
                                    <i class="fas fa-braille m-r-10"></i> Manage Brands</a>
                                <a class="nav-link {{ request()->is('panel/dashboard/website/projects') ? 'active' : '' }}" href="{{ route('panel.website.projects.manage') }}">
                                    <i class="fas fa-road m-r-10"></i> Manage Projects</a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    {{ me()->name }}
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4 pb-4">
                    <h1 class="mt-4">{{ $title ?? 'Dashboard'}}</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{ route('panel.dashboard') }}">Dashboard</a></li>
                        {!! $breadcrumb ?? '' !!}
                    </ol>

                    <x-kit._partials._alert />
                    <x-kit._partials._errors />

                    {!! $slot !!}

                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; {{ config('app.name') }} {{ date('Y') }}</div>
                        <span class="text-muted text-uppercase">Gizmo v3.5.6</span>
                        <p class="mb-0">A product of <a href="https://thepragmaticapproach.com" target="_blank" class="col-red">The Pragmatic Approach</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('kit/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('kit/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('kit/assets/js/datatables-simple-demo.js') }}"></script>
    <script src="{{ asset('kit/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('kit/assets/js/clipboard.min.js') }}"></script>
    <script>
        new ClipboardJS('.btn');
    </script>

    {{ $scripts ?? '' }}
</body>
</html>
