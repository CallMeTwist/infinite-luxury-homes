<x-kit.dashboard>

    <x-slot name="title">Manage Paid Realtors</x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item active">Marketing System</li>
        <li class="breadcrumb-item active">Manage Paid Realtors</li>
    </x-slot>

    <section class="scroll-section">

        <div class="row">
            <div class="col">
                <h2 class="small-title">Manage Realtors</h2>
            </div>
            <div class="col-auto">
                <a href="{{ route('panel.marketing.affiliates') }}" class="btn btn-primary">All Realtors</a>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body p-3">
                <input class="form-control form-control-lg live-search-box" type="text" placeholder="Enter information here to filter" aria-label=".form-control-lg example">
            </div>
        </div>

        @include('layouts._partials._errors')
        @include('layouts._partials._alert')

        <section class="live-search-list mt-4">
            @foreach($affiliates->chunk(3) as $chunk)
                <div class="row mb-3">
                    @foreach($chunk as $affiliate)
                        <div class="col-sm-4">
                            <div class="user-item">
                                <div class="card">
                                    <div class="card-body p-3">
                                        <div class="d-flex align-items-center justify-content-start flex-sm-row flex-column">
                                            <div class="w-25 m-r-20 text-center">
                                                <img src="{{ asset($affiliate->avatar ?? 'assets/images/favicon.png') }}" class="rounded-circle" style="width: 100px; height: 100px;">
                                                <span class="badge bg-green col-bold mb-0 font-14">{!! config('currency')[get_settings()->currency] !!}{{ number_format($affiliate->balance, 2) }}</span>
                                            </div>
                                            <div>
                                                <h5 class="mb-0">{{ $affiliate->name }}</h5>
                                                @if(!$affiliate->trashed()) <small class="badge bg-green font-10"><i class="fa fa-lock m-r-5"></i> Can Login</small> @else <small class="badge bg-orange font-11"><i class="fa fa-ban m-r-5"></i> Banned</small> @endif
                                                @if($affiliate->approved) <small class="badge bg-green font-10"><i class="fa fa-user-check m-r-5"></i> Approved</small> @else <small class="badge bg-orange font-11"><i class="fa fa-user-clock m-r-5"></i> Not Approved</small> @endif
                                                <p class="mb-0"><i class="fa fa-envelope-open m-r-10"></i> {{ str_limit($affiliate->email, 25) }}</p>
                                                <a href="tel:{{ $affiliate->phone }}"><p><i class="fa fa-phone m-r-10"></i> {{ $affiliate->phone }}</p></a>
                                                <a href="{{ route('panel.marketing.affiliates.view', $affiliate->code) }}">View Realtor <i class="fa fa-long-arrow-right m-l-10"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </section>

    </section>

    <x-slot name="scripts">
        <script>
            jQuery(document).ready(function($){
                $('.live-search-list .user-item').each(function(){
                    $(this).attr('data-search-term', $(this).text().toLowerCase());
                });
                $('.live-search-box').on('keyup', function(){
                    var searchTerm = $(this).val().toLowerCase();
                    $('.live-search-list .user-item').each(function(){
                        if ($(this).filter('[data-search-term*=' + searchTerm + ']').length > 0 || searchTerm.length < 1) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });
                });
            });
        </script>
    </x-slot>

</x-kit.dashboard>
