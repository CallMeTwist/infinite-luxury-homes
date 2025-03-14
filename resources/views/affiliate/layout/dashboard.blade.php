<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover" />
    <meta name="color-scheme" content="dark light" />
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />

    <title>{{ $title ?? 'Welcome' }} | {{ config('app.name') }}</title>

    <link rel="icon" type="image/png" href="{{ asset('/assets/images/favicon.png') }}" sizes="128x128" />

    <link rel="stylesheet" type="text/css" href="/referrers/css/main.css" />
    <link rel="stylesheet" type="text/css" href="/referrers/css/utilities.css" />
    <link rel="stylesheet" href="{{ asset('kit/assets/css/helpers.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome/css/all.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
</head>
<body>
<div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg scrollbar" id="sidebar">
        <div class="container-fluid">
            <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand d-inline-block py-lg-2 mb-lg-5 px-lg-6 me-0 text-center" href="{{ route('affiliate.dashboard.manage') }}">
                <img src="{{ asset('/assets/images/logo.jpg') }}" width="120px" alt="..." />
            </a>
            <div class="navbar-user d-lg-none">
                <div class="dropdown">
                    <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar-parent-child">
                            <img alt="{{ me()->first_name }}" src="{{ asset(me()->avatar ?? '/assets/images/favicon.png') }}" class="avatar avatar- rounded-circle" />
                            <span class="avatar-child avatar-badge bg-success"></span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
                        <a href="{{ route('affiliate.dashboard.profile') }}" class="dropdown-item">Profile</a>
                        <hr class="dropdown-divider" />
                        <a href="{{ route('affiliate.logout') }}" class="dropdown-item">Logout</a>
                    </div>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <div class="text-center p-3 bg-gray-50 shadow-lg">
                    <img alt="{{ me()->first_name }}" src="{{ asset(me()->avatar ?? '/assets/images/favicon.png') }}" class="avatar avatar-lg rounded-circle" />
                    <h6>{{ me()->name }}</h6>
                    <span class="badge bg-success font-15">{!! config('currency')[get_settings()->currency] !!}{{ number_format(me()->balance) }}</span>
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('affiliate/dashboard') ? 'active' : '' }}" href="{{ route('affiliate.dashboard.manage') }}"><i class="fa fa-home"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('affiliate/dashboard/profile') ? 'active' : '' }}" href="{{ route('affiliate.dashboard.profile') }}"><i class="fa fa-user-cog"></i> Profile</a>
                    </li>
                    @if(me()->approved)
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('affiliate/dashboard/kyc') ? 'active' : '' }}" href="{{ route('affiliate.dashboard.kyc.manage') }}"><i class="fa fa-id-badge"></i> KYC Verification</a>
                        </li>
                        @if(me()->kyc && me()->kyc->approved)
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('affiliate/dashboard/referrals') ? 'active' : '' }}" href="{{ route('affiliate.dashboard.referrals.manage') }}"><i class="fa fa-users"></i> My Referrals</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('affiliate/dashboard/clients') || request()->is('affiliate/dashboard/clients/*') ? 'active' : '' }}" href="{{ route('affiliate.dashboard.clients.manage') }}"><i class="fa fa-users-cog"></i> My Clients</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('affiliate/dashboard/withdrawals') ? 'active' : '' }}" href="{{ route('affiliate.dashboard.withdrawals.manage') }}"><i class="fa fa-hand-holding-usd"></i> Withdraw Funds</a>
                            </li>
                        @endif
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="/contact"><i class="fa fa-phone"></i> Contact Support</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/"><i class="fa fa-globe"></i> Home Page</a>
                    </li>
                </ul>
                <div class="mt-auto"></div>
                <div class="my-4 px-lg-6 position-relative">
                    <div class="dropup w-full">
                        <button class="btn-primary d-flex w-full py-3 ps-3 pe-4 align-items-center shadow shadow-3-hover rounded-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="me-3">
                                <img alt="{{ me()->first_name }}" src="{{ asset(me()->avatar ?? 'assets/images/favicon.png') }}" class="avatar avatar-sm rounded-circle" />
                            </span>
                            <span class="flex-fill text-start text-sm font-semibold">{{ me()->first_name .' '.me()->last_name }} </span>
                            <span><i class="bi bi-chevron-expand text-white text-opacity-70"></i></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end w-full">
                            <div class="dropdown-header"><span class="d-block text-sm text-muted mb-1">Signed in as</span> <span class="d-block text-heading font-semibold">{{ me()->first_name .' '.me()->last_name }}</span></div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('affiliate.dashboard.manage') }}"><i class="bi bi-house me-3"></i>Home </a>
                            <a class="dropdown-item" href="{{ route('affiliate.dashboard.profile') }}"><i class="bi bi-pencil me-3"></i>Profile </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('affiliate.logout') }}"><i class="bi bi-box-arrow-left me-3"></i>Logout</a>
                        </div>
                    </div>
                    <div class="d-flex gap-3 justify-content-center align-items-center mt-6 d-none">
                        <div><i class="bi bi-moon-stars me-2 text-warning me-2"></i> <span class="text-heading text-sm font-bold">Dark mode</span></div>
                        <div class="ms-auto">
                            <div class="form-check form-switch me-n2"><input class="form-check-input" type="checkbox" id="switch-dark-mode" /></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="flex-lg-1 h-screen overflow-y-lg-auto">
        <nav class="navbar navbar-light position-lg-sticky top-lg-0 d-none d-lg-block overlap-10 flex-none bg-white border-bottom px-0 py-3" id="topbar">
            <div class="container-fluid">
                <form class="form-inline ms-auto me-4 d-none d-md-flex">
                    <div class="input-group input-group-inline shadow-none">
                        <span class="input-group-text border-0 shadow-none ps-0 pe-3"><i class="bi bi-search"></i> </span><input type="text" class="form-control form-control-flush" placeholder="Search" aria-label="Search" />
                    </div>
                </form>
                <div class="navbar-user d-none d-sm-block">
                    <div class="hstack gap-3 ms-4">
                        <div class="dropdown">
                            <a class="d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                <div>
                                    <div class="avatar avatar-sm bg-warning rounded-circle text-white">
                                        <img alt="..." src="{{ asset(me()->avatar ?? 'assets/images/favicon.png') }}" />
                                    </div>
                                </div>
                                <div class="d-none d-sm-block ms-3"><span class="h6">{{ me()->first_name }}</span></div>
                                <div class="d-none d-md-block ms-md-2"><i class="bi bi-chevron-down text-muted text-xs"></i></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="dropdown-header">
                                    <span class="d-block text-sm text-muted mb-1">Signed in as</span>
                                    <span class="d-block text-heading font-semibold">{{ me()->first_name .' '.me()->last_name }}</span>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('affiliate.dashboard.manage') }}"><i class="bi bi-house me-3"></i>Home </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('affiliate.dashboard.profile') }}"><i class="bi bi-pencil me-3"></i>Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('affiliate.logout') }}"><i class="bi bi-person me-3"></i>Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <header>
            <div class="container-fluid">
                <div class="border-bottom pt-6">
                    <div class="row align-items-center">
                        <div class="col-sm col-12">
                            <h1 class="h2 ls-tight">{{ $pager ?? 'Dashboard' }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main class="py-6 bg-surface-secondary">
            <div class="container-fluid {{ $class ?? '' }}">

                @include('layouts._partials._errors')
                @include('layouts._partials._alert')

                @yield('content')

            </div>
        </main>
    </div>
</div>

<script src="/referrers/js/main.js"></script>

@yield('scripts')
</body>
</html>
