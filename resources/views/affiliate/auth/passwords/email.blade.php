@extends('affiliate.layout.auth',[
    $title = 'Forgotten Password'
])

@section('content')

    <div class="text-center mb-12">
        <a class="d-inline-block" href="#"><img src="{{ asset('/assets/images/favicon.png') }}" class="w-25" alt="..." /></a>
        <h1 class="ls-tight font-bolder mt-6">Forgotten Password</h1>
        <p class="mt-2">Earn commissions for every referral that results in a successful transaction.</p>
    </div>

    @include('layouts._partials._errors')
    @include('layouts._partials._alert')

    <form method="post" action="{{ route('affiliate.password.request') }}">

        @csrf

        <div class="mb-5">
            <label class="form-label col-grey" for="email">Email address</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Your email address" required/>
        </div>

        <button type="submit" class="btn bg-red w-full">Send Password Reset Link</button>

    </form>

@endsection
