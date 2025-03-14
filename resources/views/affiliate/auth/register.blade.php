@extends('affiliate.layout.auth',[
    $title = 'Create Account'
])

@section('content')

    <div class="text-center mb-12">
        <a class="d-inline-block" href="#"><img src="{{ asset('/assets/images/favicon.png') }}" class="w-25" alt="..." /></a>
        <h1 class="ls-tight font-bolder mt-6">Create your account</h1>
        <p class="mt-2">Step into the world of real estate partnerships with the {{ config('app.name') }} Realtors Program.</p>
    </div>

    @include('layouts._partials._errors')
    @include('layouts._partials._alert')

    @if($_GET && !empty($_GET['ref']))

        @php
            $referrer = App\Affiliate::withTrashed()->where('email', $_GET['ref'])->first();
        @endphp

        @if($referrer)
            <div class="alert alert-secondary mb-3">
                <div class="d-flex align-items-center">
                    <img src="{{ asset($referrer->avatar ?? '/assets/images/favicon.png') }}" class="rounded-circle img-fluid m-r-20" width="50" height="50" alt="{{ $referrer->first_name }}">
                    <div>
                        <p class="mb-0">You are currently being referred by</p>
                        <h6 class="mb-0 text-uppercase col-bold col-green">{{ $referrer->name }}</h6>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-danger mb-3 mt-3">
                The referral link you are using does not exist.
            </div>
        @endif
    @endif

    <form method="post" action="{{ route('affiliate.register.post') }}">

        @csrf

        <div class="row">
            <div class="col-sm-6">
                <div class="mb-5">
                    <label class="form-label col-grey" for="name">First Name</label>
                    <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="Enter your name" required/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-5">
                    <label class="form-label col-grey" for="name">Last Name</label>
                    <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="Enter your name" required/>
                </div>
            </div>
        </div>

        <div class="mb-5">
            <label class="form-label col-grey" for="email">Email address</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Your email address" required/>
        </div>

        <div class="mb-5">
            <label class="form-label col-grey" for="email">Phone Number</label>
            <input type="number" class="form-control" maxlength="11" name="phone" value="{{ old('phone') }}" placeholder="Your phone number" required/>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="mb-5">
                    <label class="form-label col-grey" for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" required/>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-5">
                    <label class="form-label col-grey" for="password">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required/>
                </div>
            </div>
        </div>

        <div class="mb-5">
            <label class="form-label col-grey" for="email">Referrer Email</label>
            <input type="email" class="form-control" name="referrer" value="{{ old('referrer', isset($_GET['ref']) ? $_GET['ref'] : '') }}" {{ isset($_GET['ref']) ? 'readonly' : '' }} placeholder="Referrer email address"/>
        </div>

        <div class="mb-5">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="check_example" id="check-remind-me" required/>
                <label class="form-check-label font-semibold text-muted" for="check-remind-me">By creating an account means you agree to the Terms and Conditions, and our Privacy Policy</label>
            </div>
        </div>

        <button type="submit" class="btn bg-red w-full">Register</button>

    </form>
    <div class="my-6 text-center">
        <small>Can't remember your password?</small> <a href="{{ route('affiliate.login') }}" class="text-danger text-sm font-semibold">Sign in</a>
    </div>

@endsection
