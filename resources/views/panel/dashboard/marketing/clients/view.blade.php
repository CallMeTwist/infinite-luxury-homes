<x-kit.dashboard>

    <x-slot name="title">{{ $client->name }}</x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item active">Marketing System</li>
        <li class="breadcrumb-item"><a href="{{ route('panel.marketing.clients.manage') }}">Manage Clients</a></li>
        <li class="breadcrumb-item active">{{ $client->name }}</li>
    </x-slot>

    <div class="row">
        <div class="col-12 col-xl-4 col-xxl-3">
            <div class="card mb-5">
                <div class="card-body">
                    <div class="d-flex align-items-center flex-column mb-4">
                        <div class="d-flex align-items-center flex-column">
                            <div class="sw-13 position-relative mb-3">
                                <img src="{{ asset($client->avatar) }}" class="img-fluid rounded-xl" alt="thumb">
                            </div>
                            <div class="h5 mb-0">{{ $client->name }}</div>
                            <div class="text-muted">{{ $client->occupation }}</div>
                            <div class="text-muted">
                                <i data-acorn-icon="pin" class="me-1"></i>
                                <span class="align-middle">{{ $client->address }}</span>
                            </div>

                            @if($client->affiliate_id)
                                <div class="alert alert-success my-3"><i class="fa fa-users me-2"></i> Referred by <b><a href="{{ route('panel.marketing.affiliates.view', $client->affiliate->code) }}">{{ $client->affiliate->name }}</a></b></div>
                            @endif

                            <button class="btn btn-danger w-100 btn-lg"
                                    data-bs-toggle="modal" data-bs-target=".delete{{ $client->code }}"><i class="fa fa-trash m-r-5"></i> Delete Client</button>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal fade delete{{ $client->code }}" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="px-3 pt-3 text-center">
                                <div class="event-type bg-red">
                                    <div class="event-indicator">
                                        <i class="fa fa-trash text-white" style="font-size: 40px"></i>
                                    </div>
                                </div>
                                <h3 class="pt-3">Delete Client?</h3>
                                <p class="text-muted">
                                    This action will delete this client and all the records attached to them, this action cannot be undone!
                                </p>
                                <form method="post" action="{{ route('panel.marketing.clients.delete') }}">
                                    @csrf
                                    <input type="hidden" name="client" value="{{ $client->code }}" required>
                                    <button type="submit" class="btn bg-red">Delete Anyway</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-12 col-xl-8 col-xxl-9 mb-5 tab-content">
            <div class="card">
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h5 class="mb-0 col-bold">Full Name</h5>
                                    <p class="mb-0">{{ $client->name }}</p>
                                </div>
                                <div class="col-sm-3 text-center">
                                    <h5 class="mb-0 col-bold">Gender</h5>
                                    <p class="mb-0">{{ title_case($client->gender) }}</p>
                                </div>
                                <div class="col-sm-3 text-center">
                                    <h5 class="mb-0 col-bold">Phone Number</h5>
                                    <p class="mb-0">{{ $client->phone }}</p>
                                </div>
                                <div class="col-sm-3 align-right">
                                    <h5 class="mb-0 col-bold">Email Address</h5>
                                    <p class="mb-0">{{ $client->email }}</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5 class="mb-0 col-bold">Address</h5>
                                    <p class="mb-0">{{ $client->address }}</p>
                                </div>
                                <div class="col-sm-3 text-center">
                                    <h5 class="mb-0 col-bold">Town</h5>
                                    <p class="mb-0">{{ $client->town }}</p>
                                </div>
                                <div class="col-sm-3 align-right">
                                    <h5 class="mb-0 col-bold">Nationality</h5>
                                    <p class="mb-0">{{ title_case($client->nationality) }}</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h5 class="mb-0 col-bold">Occupation</h5>
                                    <p class="mb-0">{{ $client->occupation }}</p>
                                </div>
                                <div class="col-sm-8">
                                    <h5 class="mb-0 col-bold">Business Address</h5>
                                    <p class="mb-0">{{ $client->business_address }}</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h5 class="mb-0 col-bold">Next of Kin Name</h5>
                                    <p class="mb-0">{{ $client->nok_surname .' '. $client->nok_other_name }}</p>
                                </div>
                                <div class="col-sm-4 text-center">
                                    <h5 class="mb-0 col-bold">Next of Kin Gender</h5>
                                    <p class="mb-0">{{ $client->nok_gender }}</p>
                                </div>
                                <div class="col-sm-4 align-right">
                                    <h5 class="mb-0 col-bold">Next of Kin Phone</h5>
                                    <p class="mb-0">{{ $client->nok_phone }}</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h5 class="mb-0 col-bold">Next of Kin Occupation</h5>
                                    <p class="mb-0">{{ $client->nok_occupation }}</p>
                                </div>
                                <div class="col-sm-8">
                                    <h5 class="mb-0 col-bold">Next of Kin Business Address</h5>
                                    <p class="mb-0">{{ $client->nok_business_address }}</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-kit.dashboard>
