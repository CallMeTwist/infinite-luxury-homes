@extends('affiliate.layout.auth',[
    $title = 'Account Login'
])

@section('content')

    <div class="text-center mb-12">
        <a class="d-inline-block" href="#"><img src="{{ asset('/assets/images/favicon.png') }}" class="w-25" alt="..." /></a>
        <h1 class="ls-tight font-bolder mt-6">Login to your account</h1>
        <p class="mt-2">Monitor your referrals and earnings through our user-friendly tracking system. Payouts are processed on a regular basis.</p>
    </div>

    @include('layouts._partials._errors')
    @include('layouts._partials._alert')

    <form method="post" action="{{ route('affiliate.login.post') }}">

        @csrf

        <div class="mb-5">
            <label class="form-label col-grey" for="email">Email address</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Your email address" required/>
        </div>

        <div class="mb-5">
            <label class="form-label col-grey" for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password" required/>
        </div>

        <div class="mb-5 d-flex align-items-center justify-content-between">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="check-remind-me" />
                <label class="form-check-label font-semibold text-muted" for="check-remind-me">Keep me logged in</label>
            </div>
            <a href="{{ route('affiliate.password.reset') }}" class="text-danger text-sm font-semibold">Reset Password</a>
        </div>

        <button type="submit" class="btn bg-red w-full">Login</button>

    </form>
    <div class="my-6 text-center">
        <small>Don't have an account?</small> <a href="{{ route('affiliate.register') }}" class="text-danger text-sm font-semibold">Register Now</a>
    </div>

@endsection
