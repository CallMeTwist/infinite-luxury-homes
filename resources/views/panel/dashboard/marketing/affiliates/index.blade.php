<x-kit.dashboard>

    <x-slot name="title">Manage Realtors</x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item active">Marketing System</li>
        <li class="breadcrumb-item active">Manage Realtors</li>
    </x-slot>

    <div class="row g-2">
        <div class="col-sm-2 mb-3">
            <div class="card border-primary">
                <div class="h-100 row g-0 card-body align-items-center p-3">
                    <div class="col-auto">
                        <span class="fa-stack fa-1x">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fas fa-users fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="col">
                        <div class="heading mb-0 sh-8 d-flex align-items-center lh-1-25 ps-1">Total</div>
                    </div>
                    <div class="col-auto ps-1">
                        <h3 class="mb-0 text-primary">{{ $affiliates->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2 mb-3">
            <div class="card border-success">
                <div class="h-100 row g-0 card-body align-items-center p-3">
                    <div class="col-auto">
                        <span class="fa-stack fa-1x">
                            <i class="fas fa-circle fa-stack-2x col-green"></i>
                            <i class="fas fa-check-circle fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="col">
                        <div class="heading mb-0 sh-8 d-flex align-items-center lh-1-25 ps-1">Approved</div>
                    </div>
                    <div class="col-auto ps-1">
                        <h3 class="mb-0 text-success">{{ $affiliates->where('approved', true)->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2 mb-3">
            <div class="card border-dark">
                <div class="h-100 row g-0 card-body align-items-center p-3">
                    <div class="col-auto">
                        <span class="fa-stack fa-1x">
                            <i class="fas fa-circle fa-stack-2x col-grey"></i>
                            <i class="fas fa-info fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="col">
                        <div class="heading mb-0 sh-8 d-flex align-items-center lh-1-25 ps-1">Pending</div>
                    </div>
                    <div class="col-auto ps-1">
                        <h3 class="mb-0 text-muted">{{ $affiliates->where('approved', false)->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2 mb-3">
            <div class="card border-danger">
                <div class="h-100 row g-0 card-body align-items-center p-3">
                    <div class="col-auto">
                        <span class="fa-stack fa-1x">
                            <i class="fas fa-circle fa-stack-2x col-red"></i>
                            <i class="fas fa-ban fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="col">
                        <div class="heading mb-0 sh-8 d-flex align-items-center lh-1-25 ps-1">Banned</div>
                    </div>
                    <div class="col-auto ps-1">
                        <h3 class="mb-0 text-danger">{{ \App\Affiliate::onlyTrashed()->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2 mb-3">
            <div class="card border-primary">
                <div class="h-100 row g-0 card-body align-items-center p-3">
                    <div class="col-auto">
                        <span class="fa-stack fa-1x">
                            <i class="fas fa-circle fa-stack-2x col-light-green"></i>
                            <i class="fas fa-check fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="col">
                        <div class="heading mb-0 sh-8 d-flex align-items-center lh-1-25 ps-1">Active</div>
                    </div>
                    <div class="col-auto ps-1">
                        <h3 class="mb-0 text-primary">{{ \App\Affiliate::all()->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2 mb-3">
            <div class="card border-dark">
                <div class="h-100 row g-0 card-body align-items-center p-3">
                    <div class="col-auto">
                        <span class="fa-stack fa-1x">
                            <i class="fas fa-circle fa-stack-2x col-blue"></i>
                            <i class="fas fa-users-rays fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="col">
                        <div class="heading mb-0 sh-8 d-flex align-items-center lh-1-25 ps-1">Referred</div>
                    </div>
                    <div class="col-auto ps-1">
                        <h3 class="mb-0">{{ \App\Affiliate::where('referrer_id', '!=', null)->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="scroll-section">

        <div class="row">
            <div class="col">
                <h2 class="small-title">Manage Realtors</h2>
            </div>
            <div class="col-auto">
                <a href="{{ route('panel.marketing.affiliates.paid') }}" class="btn btn-primary">View Paid</a>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body p-3">
				<div class="row">
					<div class="col-sm-10">
                        <input class="form-control form-control-lg live-search-box" type="text" placeholder="Enter information here to filter" aria-label=".form-control-lg example">
					</div>
					<div class="col-sm-2">
						<button class="btn btn-primary m-r-5 w-100" data-bs-toggle="modal" data-bs-target=".register"><i class="fa fa-user-plus m-r-5"></i> Register</button>
					</div>
				</div>
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

	<!-- Register Modal -->
    <div class="modal fade register" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header p-3 d-flex align-items-center justify-content-between">
                    <h5 class="modal-title">Create Account</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-3">

                    <form action="{{ route('panel.marketing.affiliates.register') }}" method="post" enctype="multipart/form-data">

                        @csrf

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label>First Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" placeholder="Enter first name here" required>
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
                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" placeholder="Enter last name here" required>
                                    </div>
                                    @error('last_name')
                                    <span class="text-danger"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label>Affiliate Photo <small>250 x 250</small></label>
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
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter email here">
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
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Enter phone here">
                                    </div>
                                    @error('phone')
                                    <span class="text-danger"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label>Gender</label>
                                    <select class="form-control" name="gender" required>
                                        <option value="">Select Gender</option>
                                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                        @foreach(\App\Models\State::all() as $state)
                                            <option value="{{ $state->key }}" {{ old('state') == $state->key ? 'selected' : '' }}>{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

						<div class="row">
							<div class="col-sm-8">
								<div class="form-group mb-3">
									<label>Address</label>
									<div class="input-group">
										<input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="Enter address here">
									</div>
									@error('address')
										<span class="text-danger"><strong>{{ $message }}</strong></span>
									@enderror
								</div>
							</div>
							<div class="col-sm-4">
                                <div class="mb-3">
                                    <label>Select State</label>
                                    <select class="form-control" name="state" required>
                                        <option value="">Select State</option>
                                        @foreach(\App\Models\State::all() as $state)
                                            <option value="{{ $state->key }}" {{ old('state') == $state->key ? 'selected' : '' }}>{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
						</div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label>Bank Name</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('bank_name') is-invalid @enderror" name="bank_name" value="{{ old('bank_name') }}" placeholder="Enter bank name here">
                                    </div>
                                    @error('bank_name')
                                    <span class="text-danger"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group mb-3">
                                    <label>Account Number</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('account_number') is-invalid @enderror" name="account_number" value="{{ old('account_number') }}" placeholder="Enter account number here">
                                    </div>
                                    @error('account_number')
										<span class="text-danger"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label>Referrer</label>
                                    <select class="form-control" name="gender" required>
                                        <option value="">Select Referrer</option>
                                        @foreach(\App\Affiliate::all() as $referrer)
                                            <option value="{{ $referrer->code }}" {{ old('referrer') == $referrer->code ? 'selected' : '' }}>{{ $referrer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Create Account</button>

                    </form>

                </div>
            </div>
        </div>
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
