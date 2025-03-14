@extends('affiliate.layout.dashboard',[
    $title = 'Dashboard',
    $pager = 'Welcome '. me()->first_name
])

@section('content')

    @if(me()->approved && me()->kyc)
        <div class="card mb-3">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="text-center">
                            <img src="{{ asset(me()->avatar ?? '/assets/images/favicon.png') }}" alt="{{ me()->name }}" width="80px" class="rounded-circle shadow-lg">
                        </div>
                    </div>
                    <div class="col">
                        <h4>Welcome, {{ me()->name }}</h4>
                        <div class="list-group list-group-flush">
                            <a class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">Referral Link:</h5>
                                </div>
                                <p class="mb-1" id="referral_link">{{ route('affiliate.register') }}?ref={{ me()->email }}</p>
                                <button class="btn btn-dark btn-sm" data-clipboard-target="#referral_link" id="button1"><i class="fas fa-copy mr-2"></i> Copy Referral Link</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(me()->approved && !me()->kyc)

        <div class="card mb-3">
            <div class="card-body text-center">
                <i class="fa fa-id-card col-red fa-3x mb-3"></i>
                <h4 class="text-muted">KYC Verification Needed</h4>
                <p class="metric-label">You are required to complete your KYC verification before you can begin earning and interacting with clients, please complete this important stage.</p>
                <a href="{{ route('affiliate.dashboard.kyc.manage') }}" class="btn btn-danger mt-3">Begin KYC Verification</a>
            </div>
        </div>

    @endif

    @if(is_null(me()->payment_proof) && !me()->approved)

        <div class="row">
            <div class="col-md-8 offset-md-2">

                <div class="card bg-dark mb-3">
                    <div class="card-body text-center">
                        <p class="col-white mb-4">Congratulations on taking the first step towards a rewarding career in real estate! To kickstart your exciting journey, we invite you to register with us and unlock a world of opportunities that will shape your path to success.</p>
                        <h1 class="col-green">{!! config('currency')[get_settings()->currency] !!}{{ number_format(get_settings()->affiliate_registration_fee) }}</h1>
                    </div>
                </div>

                <div class="row">
                    @foreach(\App\Models\BankAccount::all() as $account)
                        <div class="col-sm-6">
                            <div class="card shadow-lg mb-3">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center justify-content-start">
                                        <img src="{{ asset($account->logo) }}" class="rounded-0" style="width: 15%"/>
                                        <div class="m-l-10">
                                            <h6 class="col-bold mb-0">{{ $account->name }} <small>({{ $account->bank }})</small></h6>
                                            <p class="mb-0">{{ $account->number }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="alert bg-dark d-flex align-items-center justify-content-start mb-3">
                    <i class="fa fa-receipt col-pink fa-2x m-r-10"></i>
                    <span class="col-white">Choose any of the accounts above and make transfer, then screenshot or keep the picture of your transaction slip and upload it with the form below.</span>
                </div>

                <form method="post" action="{{ route('affiliate.dashboard.subscribe') }}" enctype="multipart/form-data">

                    @csrf

                    <div class="row">
                        <div class="col-sm-8">
                            <div class="mb-3">
                                <label for="file">Payment Proof</label>
                                <input type="file" class="form-control input-bottom" name="proof" accept="image/*" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label>Select Current State</label>
                                <select class="form-control input-bottom" name="state" required>
                                    <option value="">Select State</option>
                                    @foreach(\App\Models\State::all() as $state)
                                        <option value="{{ $state->key }}" {{ old('state') == $state->key ? 'selected' : '' }}>{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary rounded-0"><i class="fa fa-upload m-r-10"></i> Upload Payment Proof</button>

                </form>

            </div>
        </div>

    @endif

    @if(me()->payment_proof && !me()->approved)
        <div class="alert bg-green-600 d-flex align-items-center justify-content-center mb-3">
            <i class="fa fa-question-circle col-white fa-2x m-r-10"></i>
            <span class="col-white">Your payment slip has been uploaded, please wait while we go through it and approve your account.</span>
        </div>
    @endif

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
    <script>
        new ClipboardJS('#button1');
    </script>
@endsection
