@extends('affiliate.layout.dashboard',[
    $title = 'My Clients',
    $pager = 'My Clients',
    $class = 'max-w-screen-xl'
])

@section('content')

    <div class="card mb-3">
        <div class="card-body p-3">
            <div class="row">
                <div class="col-sm-10">
                    <div class="filled">
                        <i data-acorn-icon="search"></i>
                        <input class="form-control live-search-box" placeholder="Type affiliate information to search or filter here..."/>
                    </div>
                </div>
                <div class="col-sm-2">
                    <a class="btn btn-primary m-r-5 w-100" href="{{ route('affiliate.dashboard.clients.register') }}"><i class="fa fa-user-plus m-r-5"></i> Register</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach(me()->clients()->with('sales')->get() as $affiliate)
            <div class="col-sm-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-start">
                            <img src="{{ asset($affiliate->client->avatar ? '/uploads/clients/'.$affiliate->client->avatar : 'assets/img/logo/logo.png') }}"
                                 class="rounded-circle m-r-20" style="width: 20%;">
                            <div>
                                <h4 class="mb-0">
                                    {{ $affiliate->client->first_name .' '. $affiliate->client->last_name }}
                                    <small class="badge bg-green">Active</small>
                                </h4>
                                <p>{{ $affiliate->client->phone }}</p>
                                <p class="mb-0 text-muted font-12">{{ $affiliate->created_at->format('dS F Y h:i:s a') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
