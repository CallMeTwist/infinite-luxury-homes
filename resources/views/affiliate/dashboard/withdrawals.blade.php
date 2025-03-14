@extends('affiliate.layout.dashboard',[
    $title = 'Withdraw Funds',
    $pager = 'Withdraw Funds',
    $class = 'max-w-screen-xl'
])

@section('content')

    <div class="row align-items-center">
        <div class="col-sm-3">
            <div class="d-flex align-items-center justify-content-start">
                <span class="fa-stack fa-2x">
                    <i class="fas fa-circle fa-stack-2x col-green"></i>
                    <i class="fas fa-money-bill fa-stack-1x fa-inverse"></i>
                </span>
                <div>
                    <h1 class="col-green mb-0">{!! config('currency')[get_settings()->currency] !!}{{ number_format(me()->balance) }}</h1>
                    <p class="mb-0">Current Balance</p>
                </div>
            </div>
        </div>
        <div class="col-sm-9 mt-3">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('affiliate.dashboard.withdrawals.account') }}">

                        @csrf

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label>Bank Name</label>
                                    <input type="text" class="form-control input-bottom" name="bank_name" value="{{ old('bank_name', me()->bank_name) }}" placeholder="Enter your bank name" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label>Account Number</label>
                                    <input type="number" maxlength="10"
                                           oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                           class="form-control input-bottom" name="account_number" value="{{ old('account_number', me()->account_number) }}" placeholder="Enter your account number" required>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn bg-red btn-sm rounded-0"><i class="fas fa-save m-r-10"></i> Update Bank Details</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4 mb-4">
        <div class="card-body">

            <form method="post" action="{{ route('affiliate.dashboard.withdrawals.send') }}">

                @csrf

                <div class="mb-3">
                    <label>How much do you want to withdraw?</label>
                    <input type="number" class="form-control form-control-lg font-20 input-bottom" name="amount" value="{{ old('amount', 0) }}" placeholder="Enter your amount" required>
                </div>

                <button type="submit" class="btn bg-red rounded-0"><i class="fas fa-save m-r-10"></i> Send Request</button>

            </form>
        </div>
    </div>

    <div class="row">
        @foreach(me()->withdrawals as $withdrawal)
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h3 class="mb-0 text-success">{!! config('currency')[get_settings()->currency] !!}{{ number_format($withdrawal->amount) }}</h3>
                                <p class="text-muted font-12">Requested Amount</p>
                                <p class="mb-0 text-muted font-12">{{ $withdrawal->created_at->format('dS F Y h:i:s a') }}</p>
                            </div>
                            @if($withdrawal->approved)
                                <i class="fas fa-check-circle col-green fa-2x"></i>
                            @else
                                <i class="fas fa-clock col-orange fa-2x"></i>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
