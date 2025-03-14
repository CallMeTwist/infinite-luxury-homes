<x-kit.dashboard>

    <x-slot name="title">{{ $affiliate->name }}</x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item active">Marketing System</li>
        <li class="breadcrumb-item"><a href="{{ route('panel.marketing.clients.manage') }}">Manage Clients</a></li>
        <li class="breadcrumb-item active">Manage {{ $affiliate->name }}</li>
    </x-slot>

    <div class="row g-2">
        <div class="col-sm-4 mb-3">
            <div class="card border-primary">
                <div class="h-100 row g-0 card-body align-items-center p-3">
                    <div class="col-auto">
                        <span class="fa-stack fa-2x">
                            <i class="fas fa-circle fa-stack-2x col-green"></i>
                            <i class="fas fa-bank fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="col">
                        <div class="heading mb-0 sh-8 d-flex align-items-center lh-1-25 ps-3 col-bold">Account Balance</div>
                    </div>
                    <div class="col-auto ps-3">
                        <div class="display-5 text-primary">{!! config('currency')[get_settings()->currency] !!}{{ number_format($affiliate->balance, 2) }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mb-3">
            <div class="card border-success">
                <div class="h-100 row g-0 card-body align-items-center p-3">
                    <div class="col-auto">
                        <span class="fa-stack fa-2x">
                            <i class="fas fa-circle fa-stack-2x col-blue"></i>
                            <i class="fas fa-users-rays fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="col">
                        <div class="heading mb-0 sh-8 d-flex align-items-center col-bold lh-1-25 ps-3">Referrals Count</div>
                    </div>
                    <div class="col-auto ps-3">
                        <div class="display-5 text-success">{{ $affiliate->referrals->count() }}</div>
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
                            <i class="fas fa-users-cog fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="col">
                        <div class="heading mb-0 sh-8 d-flex align-items-center col-bold ps-3">Total Clients</div>
                    </div>
                    <div class="col-auto ps-3">
                        <div class="display-5 text-muted">{{ $affiliate->clients->count() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts._partials._errors')
    @include('layouts._partials._alert')

    <div class="row">
        <div class="col-12 col-xl-4 col-xxl-3">
            <div class="card mb-3">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center flex-column">
                        <div class="d-flex align-items-center flex-column">
                            <div class="sw-13 position-relative mb-3">
                                <img src="{{ asset($affiliate->avatar ?? 'assets/images/favicon.png') }}" class="img-fluid rounded-xl" alt="thumb">
                            </div>
                            <h4 class="mb-1">
                                {{ $affiliate->name }}
                                @if(!$affiliate->trashed()) <small class="badge bg-green font-11 p-2"><i class="fa fa-lock"></i></small> @else <small class="badge bg-orange font-11 p-2"><i class="fa fa-ban"></i></small> @endif
                                @if($affiliate->approved) <small class="badge bg-green font-11 p-2"><i class="fa fa-user-check"></i></small> @else <small class="badge bg-orange font-11 p-2"><i class="fa fa-user-clock"></i></small> @endif
                            </h4>
                            <span class="badge bg-success font-18 mb-3">{!! config('currency')[get_settings()->currency] !!}{{ number_format($affiliate->balance) }}</span>
                            <div class="text-muted">{{ $affiliate->phone }}</div>
                            <div class="text-muted mb-3">
                                <i data-acorn-icon="email" class="me-1"></i>
                                <span class="align-middle">{{ $affiliate->email }}</span>
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-danger m-r-5" data-bs-toggle="modal" data-bs-target=".delete{{ $affiliate->code }}"><i class="fa fa-trash"></i></button>
                                <button class="btn btn-primary m-r-5" data-bs-toggle="modal" data-bs-target=".edit{{ $affiliate->code }}"><i class="fa fa-edit"></i></button>
                                @if($affiliate->approved)
                                    @if($affiliate->trashed())
                                        <button class="btn btn-outline-success m-r-5" data-bs-toggle="modal" data-bs-target=".restore{{ $affiliate->code }}"><i class="fa fa-check"></i></button>
                                    @else
                                        <button class="btn btn-outline-warning m-r-5" data-bs-toggle="modal" data-bs-target=".suspend{{ $affiliate->code }}"><i class="fa fa-times-circle"></i></button>
                                    @endif
                                @endif
                                @if(!$affiliate->approved)
                                    <button class="btn btn-warning m-r-5" data-bs-toggle="modal" data-bs-target=".ban{{ $affiliate->code }}"><i class="fa fa-ban"></i></button>
                                    @if($affiliate->payment_proof)
                                        <button class="btn btn-success m-r-5" data-bs-toggle="modal" data-bs-target=".approve{{ $affiliate->code }}"><i class="fa fa-check-circle"></i></button>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if($affiliate->referrer_id)
                <div class="card mb-3">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="{{ asset($affiliate->referred()->avatar ?? 'assets/images/favicon.png') }}" class="w-100 rounded-xl" alt="thumb">
                            </div>
                            <div class="col-sm-8">
                                <h6 class="mb-1">{{ $affiliate->referred()->name }}</h6>
                                <p class="text-muted">{{ $affiliate->referred()->phone }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-12 col-xl-8 col-xxl-9">
            <div class="card mb-3">
                <div class="card-body p-3">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">
                            <div class="row">
                                <div class="col-sm-4 mb-2">
                                    <div class="d-flex align-items-center justify-content-start">
                                        <i class="fa fa-user fa-2x text-muted"></i>
                                        <div class="m-l-20">
                                            <h6 class="mb-0 col-bold">{{ $affiliate->first_name }}</h6>
                                            <p class="mb-0">First Name</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 mb-2">
                                    <div class="d-flex align-items-center justify-content-start">
                                        <i class="fa fa-user fa-2x text-muted"></i>
                                        <div class="m-l-20">
                                            <h6 class="mb-0 col-bold">{{ $affiliate->last_name }}</h6>
                                            <p class="mb-0">Last Name</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 mb-2">
                                    <div class="d-flex align-items-center justify-content-start">
                                        <i class="fa fa-flag fa-2x text-muted"></i>
                                        <div class="m-l-20">
                                            <h6 class="mb-0 col-bold">{{ title_case($affiliate->gender) }}</h6>
                                            <p class="mb-0">Gender</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item">
                            <div class="row">
                                <div class="col-sm-8 mb-2">
                                    <div class="d-flex align-items-center justify-content-start">
                                        <i class="fa fa-envelope fa-2x text-muted"></i>
                                        <div class="m-l-20">
                                            <h6 class="mb-0 col-bold">{{ $affiliate->email }}</h6>
                                            <p class="mb-0">Email Address</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 mb-2">
                                    <div class="d-flex align-items-center justify-content-start">
                                        <i class="fa fa-phone fa-2x text-muted"></i>
                                        <div class="m-l-20">
                                            <h6 class="mb-0 col-bold"><a href="tel:{{ $affiliate->phone }}">{{ $affiliate->phone }}</a></h6>
                                            <p class="mb-0">Phone Number</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item">
                            <div class="row">
                                <div class="col-sm-6 mb-2">
                                    <div class="d-flex align-items-center justify-content-start">
                                        <i class="fa fa-bank fa-2x text-muted"></i>
                                        <div class="m-l-20">
                                            <h6 class="mb-0 col-bold">{{ $affiliate->bank_name }}</h6>
                                            <p class="mb-0">Bank Name</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-2">
                                    <div class="d-flex align-items-center justify-content-start">
                                        <i class="fa fa-key fa-2x text-muted"></i>
                                        <div class="m-l-20">
                                            <h6 class="mb-0 col-bold">{{ $affiliate->account_number }}</h6>
                                            <p class="mb-0">Account Number</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item">
                            <div class="d-flex align-items-center justify-content-start">
                                <i class="fa fa-map fa-2x text-muted"></i>
                                <div class="m-l-20">
                                    <h6 class="mb-0 col-bold">{{ $affiliate->address }}</h6>
                                    <p class="mb-0">Home Address</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade delete{{ $affiliate->code }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="px-3 pt-3 text-center">
                        <div class="event-type bg-red">
                            <div class="event-indicator">
                                <i class="fas fa-trash text-white" style="font-size: 40px"></i>
                            </div>
                        </div>
                        <h3 class="pt-3">Delete Realtor</h3>
                        <p class="text-muted">This action will delete this affiliate and all the records attached to them, this action cannot be undone!</p>
                    </div>
                    <div class="text-center">
                        <form method="post" action="{{ route('panel.marketing.affiliates.delete') }}">
                            @csrf
                            <input type="hidden" name="affiliate" value="{{ $affiliate->code }}" required>
                            <button type="submit" class="btn bg-red rounded-0 w-100">Delete Anyway</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Ends -->

    <!-- Edit Modal -->
    <div class="modal fade edit{{ $affiliate->code }}" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header p-3 d-flex align-items-center justify-content-between">
                    <h5 class="modal-title">Edit Account</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-3">

                    <form action="{{ route('panel.marketing.affiliates.update') }}" method="post" enctype="multipart/form-data">

                        @csrf

                        <input type="hidden" name="affiliate" value="{{ $affiliate->code }}" required>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label>First Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name', $affiliate->first_name) }}" placeholder="Enter first name here" required>
                                    </div>
                                    @error('first_name')
                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label>Last Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name', $affiliate->last_name) }}" placeholder="Enter last name here" required>
                                    </div>
                                    @error('last_name')
                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label>Realtor Photo <small>250 x 250</small></label>
                                    <div class="input-group">
                                        <input type="file" accept="image/*" class="form-control @error('avatar') is-invalid @enderror" name="avatar" value="{{ old('avatar') }}">
                                    </div>
                                    @error('avatar')
                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label>Email Address</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $affiliate->email) }}" placeholder="Enter email here">
                                    </div>
                                    @error('email')
                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label>Phone Number</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $affiliate->phone) }}" placeholder="Enter phone here">
                                    </div>
                                    @error('phone')
                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label>Select Gender</label>
                                    <select class="form-control input-bottom" name="gender" required>
                                        <option value="">Select Gender</option>
                                        <option value="male" {{ old('gender', $affiliate->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender', $affiliate->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Address</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $affiliate->address) }}" placeholder="Enter address here">
                            </div>
                            @error('address')
                                <span class="text-danger"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label>Bank Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('bank_name') is-invalid @enderror" name="bank_name" value="{{ old('bank_name', $affiliate->bank_name) }}" placeholder="Enter bank name here">
                                    </div>
                                    @error('bank_name')
                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label>Account Number</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('account_number') is-invalid @enderror" name="account_number" value="{{ old('account_number', $affiliate->account_number) }}" placeholder="Enter account number here">
                                    </div>
                                    @error('account_number')
                                        <span class="text-danger"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Account</button>

                    </form>

                </div>
            </div>
        </div>
    </div>

    @if(!$affiliate->approved)
        <!-- Ban Modal -->
        <div class="modal fade ban{{ $affiliate->code }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="px-3 pt-3 text-center">
                            <div class="event-type bg-orange">
                                <div class="event-indicator">
                                    <i class="fas fa-check-circle text-white" style="font-size: 40px"></i>
                                </div>
                            </div>
                            <h3 class="pt-3">Discard Realtor Account</h3>
                            <p class="text-muted">This action will not approve this affiliate's account but rather delete it.</p>
                        </div>
                        <div class="text-center">
                            <form method="post" action="{{ route('panel.marketing.affiliates.disapprove') }}">
                                @csrf
                                <input type="hidden" name="affiliate" value="{{ $affiliate->code }}" required>
                                <button type="submit" class="btn bg-orange rounded-0 w-100">Discard Anyway</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Ends -->

        @if($affiliate->payment_proof)
            <!-- Approve Modal -->
            <div class="modal fade approve{{ $affiliate->code }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="px-3 pt-3 text-center">
                                <div class="event-type bg-green">
                                    <div class="event-indicator">
                                        <i class="fas fa-check-circle text-white" style="font-size: 40px"></i>
                                    </div>
                                </div>
                                <h3 class="pt-3">Approve Realtor Account</h3>
                                <p class="text-muted">This action will approve this realtor's account and enable them to start earning.</p>

                                <img src="{{ asset($affiliate->payment_proof) }}" class="w-100 mb-2">
                            </div>
                            <div class="text-center">
                                <form method="post" action="{{ route('panel.marketing.affiliates.approve') }}">
                                    @csrf
                                    <input type="hidden" name="affiliate" value="{{ $affiliate->code }}" required>
                                    <button type="submit" class="btn bg-green rounded-0 w-100">Approve Anyway</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Ends -->
        @endif
    @endif

    @if($affiliate->approved)
        @if($affiliate->trashed())
            <!-- Restore Modal -->
            <div class="modal fade restore{{ $affiliate->code }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="px-3 pt-3 text-center">
                                <div class="event-type bg-green">
                                    <div class="event-indicator">
                                        <i class="fas fa-check-circle text-white" style="font-size: 40px"></i>
                                    </div>
                                </div>
                                <h3 class="pt-3">Restore Realtor Account</h3>
                                <p class="text-muted">This action will restore this affiliate's account.</p>
                            </div>
                            <div class="text-center">
                                <form method="post" action="{{ route('panel.marketing.affiliates.restore') }}">
                                    @csrf
                                    <input type="hidden" name="affiliate" value="{{ $affiliate->code }}" required>
                                    <button type="submit" class="btn bg-green rounded-0 w-100">Restore Anyway</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Ends -->
        @else
            <!-- Suspend Modal -->
            <div class="modal fade suspend{{ $affiliate->code }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="px-3 pt-3 text-center">
                                <div class="event-type bg-warning">
                                    <div class="event-indicator">
                                        <i class="fas fa-ban text-white" style="font-size: 40px"></i>
                                    </div>
                                </div>
                                <h3 class="pt-3">Suspend Realtor</h3>
                                <p class="text-muted">This action will suspend this Realtor's account.</p>
                            </div>
                            <div class="text-center">
                                <form method="post" action="{{ route('panel.marketing.affiliates.suspend') }}">
                                    @csrf
                                    <input type="hidden" name="affiliate" value="{{ $affiliate->code }}" required>
                                    <button type="submit" class="btn bg-warning rounded-0 w-100">Suspend Anyway</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Ends -->
        @endif
    @endif

</x-kit.dashboard>
