<x-kit.dashboard>

    <x-slot name="title">Manage KYCs</x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item active">Marketing System</li>
        <li class="breadcrumb-item active">Manage KYCs</li>
    </x-slot>

    <div class="row g-2">
        <div class="col-sm-4 mb-3">
            <div class="card border-primary">
                <div class="h-100 row g-0 card-body align-items-center p-3">
                    <div class="col-auto">
                        <span class="fa-stack fa-2x">
                            <i class="fas fa-circle fa-stack-2x col-blue"></i>
                            <i class="fas fa-users fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="col">
                        <div class="heading mb-0 sh-8 d-flex align-items-center lh-1-25 ps-3">Total KYCs</div>
                    </div>
                    <div class="col-auto ps-3">
                        <div class="display-5 text-primary">{{ $kycs->count() }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mb-3">
            <div class="card border-success">
                <div class="h-100 row g-0 card-body align-items-center p-3">
                    <div class="col-auto">
                        <span class="fa-stack fa-2x">
                            <i class="fas fa-circle fa-stack-2x col-green"></i>
                            <i class="fas fa-user-check fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="col">
                        <div class="heading mb-0 sh-8 d-flex align-items-center lh-1-25 ps-3">Approved KYCs</div>
                    </div>
                    <div class="col-auto ps-3">
                        <div class="display-5 text-success">{{ $kycs->where('approved', true)->count() }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mb-3">
            <div class="card border-dark">
                <div class="h-100 row g-0 card-body align-items-center p-3">
                    <div class="col-auto">
                        <span class="fa-stack fa-2x">
                            <i class="fas fa-circle fa-stack-2x col-grey"></i>
                            <i class="fas fa-clock fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="col">
                        <div class="heading mb-0 sh-8 d-flex align-items-center lh-1-25 ps-3">Pending KYCs</div>
                    </div>
                    <div class="col-auto ps-3">
                        <div class="display-5 text-muted">{{ $kycs->where('approved', false)->count() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body p-3">
            <input class="form-control form-control-lg live-search-box" type="text" placeholder="Enter information here to filter" aria-label=".form-control-lg example">
        </div>
    </div>

    <div class="live-search-list mt-4">
        @foreach($kycs->chunk(4) as $chunk)
            <div class="row mb-1">
                @foreach($chunk as $kyc)
                    <div class="col-sm-3 mb-3">
                        <div class="user-item">
                            <div class="card">
                                <div class="card-body p-3 text-center">
                                    <img src="{{ asset($kyc->affiliate->avatar ?? 'assets/images/favicon.png') }}" class="rounded-circle" style="width: 100px; height: 100px;">
                                    <h5 class="mb-1">
                                        {{ $kyc->affiliate->name }}
                                        @if($kyc->approved) <small class="badge bg-green font-11 p-2"><i class="fa fa-user-check"></i></small> @else <small class="badge bg-orange font-11 p-2"><i class="fa fa-user-clock"></i></small> @endif
                                    </h5>
                                    <a href="tel:{{ $kyc->affiliate->phone }}"><p><i class="fa fa-phone m-r-10"></i> {{ $kyc->affiliate->phone }}</p></a>
                                    @if(!$kyc->approved)
                                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target=".approve{{ $kyc->id }}"><i class="fa fa-check-circle m-r-5"></i> Approve</button>
                                    @endif
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target=".delete{{ $kyc->id }}"><i class="fa fa-trash m-r-5"></i> Delete</button>
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target=".view{{ $kyc->id }}"><i class="fa fa-id-card m-r-5"></i> View</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- View Modal -->
                    <div class="modal fade view{{ $kyc->id }}" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header p-3 d-flex align-items-center justify-content-between">
                                    <h5 class="modal-title">View KYC Data</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body p-0">
                                    <div class="list-group list-group-flush">
                                        <div class="list-group-item">
                                            <h6 class="mb-0 col-bold">State of Origin</h6>
                                            <p class="mb-0">{{ $kyc->state_of_origin }}</p>
                                        </div>
                                        <div class="list-group-item">
                                            <h6 class="mb-0 col-bold">LGA of Origin</h6>
                                            <p class="mb-0">{{ $kyc->lga_of_origin }}</p>
                                        </div>
                                        <div class="list-group-item">
                                            <h6 class="mb-0 col-bold">Date of Birth</h6>
                                            <p class="mb-0">{{ $kyc->date_of_birth }} <span class="font-italic">({{ age($kyc->date_of_birth) }})</span></p>
                                        </div>
                                        <div class="list-group-item">
                                            <h6 class="mb-0 col-bold">Marital Status</h6>
                                            <p class="mb-0">{{ title_case($kyc->marital_status) }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <h6 class="mb-2 col-bold">Front View</h6>
                                    <img src="{{ asset($kyc->front_document) }}" class="w-100" style="height: 200px">
                                    <hr>
                                    <h6 class="mb-2 col-bold">Back View</h6>
                                    <img src="{{ asset($kyc->back_document) }}" class="w-100" style="height: 200px">
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(!$kyc->approved)
                        <!-- Approve Modal -->
                        <div class="modal fade approve{{ $kyc->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="px-3 pt-3 text-center">
                                            <div class="event-type bg-green">
                                                <div class="event-indicator">
                                                    <i class="fas fa-check-circle text-white" style="font-size: 40px"></i>
                                                </div>
                                            </div>
                                            <h3 class="pt-3">Approve {{ $kyc->affiliate->name }} KYC</h3>
                                            <p class="text-muted">This action will approve this realtor's kyc account and enable them to start earning.</p>
                                        </div>
                                        <div class="text-center">
                                            <form method="post" action="{{ route('panel.marketing.affiliates.kyc.approve') }}">
                                                @csrf
                                                <input type="hidden" name="kyc" value="{{ $kyc->id }}" required>
                                                <button type="submit" class="btn bg-green rounded-0 w-100">Approve Anyway</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Ends -->
                    @endif

                    <!-- Delete Modal -->
                    <div class="modal fade delete{{ $kyc->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="px-3 pt-3 text-center">
                                        <div class="event-type bg-red">
                                            <div class="event-indicator">
                                                <i class="fas fa-trash text-white" style="font-size: 40px"></i>
                                            </div>
                                        </div>
                                        <h3 class="pt-3">Delete {{ $kyc->affiliate->name }} KYC Data</h3>
                                        <p class="text-muted">This action will delete this affiliate KYC data and all the records attached to them, this action cannot be undone!</p>
                                    </div>
                                    <div class="text-center">
                                        <form method="post" action="{{ route('panel.marketing.affiliates.kyc.delete') }}">
                                            @csrf
                                            <input type="hidden" name="kyc" value="{{ $kyc->id }}" required>
                                            <button type="submit" class="btn bg-red rounded-0 w-100">Delete Anyway</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

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
