<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover" />
    <meta name="color-scheme" content="dark light" />
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />

    <title>{{ $title ?? 'Welcome' }} | {{ config('app.name') }}</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}" sizes="128x128" />

    <link rel="stylesheet" type="text/css" href="/referrers/css/main.css" />
    <link rel="stylesheet" type="text/css" href="/referrers/css/utilities.css" />
    <link rel="stylesheet" href="{{ asset('kit/assets/css/helpers.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome/css/all.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
</head>
<body>
<div>
    <div class="px-5 py-5">
        <div class="d-flex justify-content-center">
            <div class="col-12 col-md-9 col-lg-6">
                <div class="row">
                    <div class="col-lg-10 col-md-9 col-xl-7 mx-auto">

                        @yield('content')

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/referrers/js/main.js"></script>
</body>
</html>
