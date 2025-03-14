@extends('affiliate.layout.dashboard',[
    $title = 'My Referrals',
    $pager = 'My Referrals',
    $class = 'max-w-screen-xl'
])

@section('content')

    <div class="row">
        @foreach(me()->referrals()->with('referred')->get() as $affiliate)
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-start">
                            <img src="{{ asset($affiliate->referred->avatar ?? 'assets/img/logo/logo.png') }}"
                                 class="rounded-circle m-r-20" style="width: 20%;">
                            <div>
                                <h4 class="mb-0">
                                    {{ $affiliate->referred->first_name .' '. $affiliate->referred->last_name }}
                                    @if($affiliate->active)
                                        <small class="badge bg-green">Active</small>
                                    @else
                                        <small class="badge bg-orange">Inactive</small>
                                    @endif
                                </h4>
                                <p>{{ $affiliate->referred->phone }}</p>
                                <p class="mb-0 text-muted font-12">{{ $affiliate->created_at->format('dS F Y h:i:s a') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
