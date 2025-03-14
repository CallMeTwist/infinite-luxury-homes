<x-kit.dashboard>

    <x-slot name="title">Manage Clients</x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item active">Marketing System</li>
        <li class="breadcrumb-item active">Manage Clients</li>
    </x-slot>

    <div class="card mb-3">
        <div class="card-body p-3 row">
            <div class="col-sm-9">
                <div class="filled">
                    <i data-acorn-icon="search"></i>
                    <input class="form-control live-search-box" placeholder="Type client information to search or filter here..."/>
                </div>
            </div>
            <div class="col-sm-3">
                <a href="{{ route('panel.marketing.clients.register') }}" class="btn w-100 btn-lg btn-primary"><i class="fa fa-plus-circle m-r-10"></i> Register New Client</a>
            </div>
        </div>
    </div>

    <section class="live-search-list mt-4">
        @foreach($clients->chunk(3) as $chunk)
            <div class="row mb-3">
                @foreach($chunk as $client)
                    <div class="col-sm-4 user-item">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="d-flex align-items-center justify-content-start">
                                    <img src="{{ asset($client->avatar) }}" class="rounded-circle m-r-20" style="width: 100px; height: 100px;">
                                    <div>
                                        <h5 class="mb-1 col-bold">
                                            {{ $client->name }}
                                            @if(!$client->trashed()) <small class="badge bg-green font-11 p-2"><i class="fa fa-check-circle"></i></small> @else <small class="badge bg-orange font-11 p-2"><i class="fa fa-ban"></i></small> @endif
                                            @if($client->approved) <small class="badge bg-green font-11 p-2"><i class="fa fa-user-check"></i></small> @else <small class="badge bg-orange font-11 p-2"><i class="fa fa-user-clock"></i></small> @endif
                                        </h5>
                                        <a href="tel:{{ $client->phone }}"><p class="mb-1"><i class="fa fa-phone m-r-10"></i> {{ $client->phone }}</p></a>
                                        <p class="mb-1"><i class="fa fa-envelope m-r-10"></i> {{ $client->email }}</p>
                                        @if($client->referrer_id)
                                            <div class="alert alert-success"><i class="fa fa-users me-2"></i> Referred by <b><a href="{{ route('panel.marketing.affiliates.view', $client->affiliate->code) }}">{{ $client->referrer->name }}</a></b></div>
                                        @endif
                                        <a href="{{ route('panel.marketing.clients.view', $client->code) }}">View Client <i class="fa fa-long-arrow-right m-l-10"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </section>

    <x-slot name="scripts">
        <script>
            $(".live-search-list").keyup(function() {
                var filter = $(this).val(), count = 0;
                $('.live-search-list .user-item').each(function() {
                    if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                        $(this).hide();
                    } else {
                        $(this).show();
                        count++;
                    }
                });
            });
        </script>
    </x-slot>

</x-kit.dashboard>
