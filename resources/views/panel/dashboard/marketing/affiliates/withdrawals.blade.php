<x-kit.dashboard>

    <x-slot name="title">Manage Withdrawals</x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item active">Marketing System</li>
        <li class="breadcrumb-item active">Manage Withdrawals</li>
    </x-slot>

    <div class="row g-2">
        <div class="col-sm-3 mb-3">
            <div class="card border-primary">
                <div class="h-100 row g-0 card-body align-items-center p-3">
                    <div class="col-auto">
                        <span class="fa-stack fa-2x">
                            <i class="fas fa-circle fa-stack-2x col-blue"></i>
                            <i class="fas fa-users fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="col">
                        <div class="heading mb-0 sh-8 d-flex align-items-center lh-1-25 ps-3">Total Withdrawals</div>
                    </div>
                    <div class="col-auto ps-3">
                        <div class="display-5 text-primary">{{ $withdrawals->count() }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mb-3">
            <div class="card border-success">
                <div class="h-100 row g-0 card-body align-items-center p-3">
                    <div class="col-auto">
                        <span class="fa-stack fa-2x">
                            <i class="fas fa-circle fa-stack-2x col-green"></i>
                            <i class="fas fa-user-check fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="col">
                        <div class="heading mb-0 sh-8 d-flex align-items-center lh-1-25 ps-3">Approved Withdrawals</div>
                    </div>
                    <div class="col-auto ps-3">
                        <div class="display-5 text-success">{{ $withdrawals->where('approved', true)->count() }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mb-3">
            <div class="card border-dark">
                <div class="h-100 row g-0 card-body align-items-center p-3">
                    <div class="col-auto">
                        <span class="fa-stack fa-2x">
                            <i class="fas fa-circle fa-stack-2x col-grey"></i>
                            <i class="fas fa-clock fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="col">
                        <div class="heading mb-0 sh-8 d-flex align-items-center lh-1-25 ps-3">Pending Withdrawals</div>
                    </div>
                    <div class="col-auto ps-3">
                        <div class="display-5 text-muted">{{ $withdrawals->where('approved', false)->count() }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3 mb-3">
            <div class="card border-info">
                <div class="h-100 row g-0 card-body align-items-center p-3">
                    <div class="col-auto">
                        <span class="fa-stack fa-2x">
                            <i class="fas fa-circle fa-stack-2x col-blue"></i>
                            <i class="fas fa-chart-area fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="col">
                        <div class="heading mb-0 sh-8 d-flex align-items-center lh-1-25 ps-3">Total Withdrawals</div>
                    </div>
                    <div class="col-auto ps-3">
                        <div class="display-5 text-muted">{!! config('currency')[get_settings()->currency] !!}{{ $withdrawals->sum('amount') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($withdrawals->count() == 0)
        <div class="text-center">
            <i class="fa fa-info-circle col-white font-50 my-3"></i>
            <h4 class="text-muted">No withdrawals here yet.</h4>
            <p class="metric-label">Sorry we can't find any data, if there are withdrawals, it will show up on this page.</p>
            <a href="{{ url()->current() }}" class="btn btn-primary mt-3">Refresh Page</a>
        </div>
    @endif

    <div class="row">
        @foreach($withdrawals as $withdrawal)
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body p-3">
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
                        <div class="alert alert-success mb-0"><i class="fa fa-users me-2"></i> Requested by <b><a href="{{ route('panel.marketing.affiliates.view', $withdrawal->affiliate->code) }}">{{ $withdrawal->referrer->name }}</a></b></div>
                        <div class="mt-2">
                            <button class="btn btn-danger btn-sm"
                                    data-bs-toggle="modal" data-bs-target=".delete{{ $withdrawal->code }}"><i class="fa fa-trash m-r-5"></i> Delete Withdrawal</button>
                            @if(!$withdrawal->approved)
                                <button class="btn btn-success btn-sm"
                                    data-bs-toggle="modal" data-bs-target=".approved{{ $withdrawal->code }}"><i class="fa fa-check-circle m-r-5"></i> Approved Withdrawal</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade delete{{ $withdrawal->code }}" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="px-3 pt-3 text-center">
                                <div class="event-type bg-red">
                                    <div class="event-indicator">
                                        <i class="fa fa-trash text-white" style="font-size: 40px"></i>
                                    </div>
                                </div>
                                <h3 class="pt-3">Delete Withdrawal?</h3>
                                <p class="text-muted">This action will delete this withdrawal, this action cannot be undone!</p>
                                <form method="post" action="{{ route('kit.affiliates.withdrawals.delete') }}">
                                    @csrf
                                    <input type="hidden" name="withdrawal" value="{{ $withdrawal->code }}" required>
                                    <button type="submit" class="btn bg-red">Delete Anyway</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(!$withdrawal->approved)
                <div class="modal fade approved{{ $withdrawal->code }}" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="px-3 pt-3 text-center">
                                    <div class="event-type bg-green">
                                        <div class="event-indicator">
                                            <i class="fa fa-check-circle text-white" style="font-size: 40px"></i>
                                        </div>
                                    </div>
                                    <h3 class="pt-3">Approved Withdrawal?</h3>
                                    <p class="text-muted">This action will approve this withdrawal, this action cannot be undone!</p>
                                    <form method="post" action="{{ route('panel.marketing.affiliates.withdrawals.approve') }}">
                                        @csrf
                                        <input type="hidden" name="withdrawal" value="{{ $withdrawal->code }}" required>
                                        <button type="submit" class="btn bg-green">Approved Anyway</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

</x-kit.dashboard>
