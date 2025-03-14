@extends('affiliate.layout.auth',[
    $title = 'Reset Password'
])

@section('content')

    <div class="text-center mb-12">
        <a class="d-inline-block" href="#"><img src="{{ asset('/assets/images/favicon.png') }}" class="w-25" alt="..." /></a>
        <h1 class="ls-tight font-bolder mt-6">Reset Password</h1>
        <p class="mt-2">Share your unique affiliate link with your network, directing them to explore our range of land offerings.</p>
    </div>

    @include('layouts._partials._errors')
    @include('layouts._partials._alert')

    <form method="post" action="{{ route('affiliate.password.update') }}">

        @csrf

        <div class="mb-5">
            <label class="form-label col-grey" for="email">Email address</label>
            <input type="email" class="form-control" name="email" value="{{ old('email', $email) }}" placeholder="Your email address" required/>
        </div>

        <div class="mb-5">
            <label class="form-label col-grey" for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password" required/>
        </div>

        <div class="mb-5">
            <label class="form-label col-grey" for="password">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required/>
        </div>

        <button type="submit" class="btn bg-red w-full">Reset Password</button>

    </form>

@endsection
