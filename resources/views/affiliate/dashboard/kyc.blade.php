@extends('affiliate.layout.dashboard',[
    $title = 'KYC Verification',
    $pager = 'KYC Verification',
    $class = 'max-w-screen-xl'
])

@section('content')

    @if(me()->kyc && !me()->kyc->approved)

        <div class="card mb-3">
            <div class="card-body text-center">
                <i class="fa fa-hourglass-half fa-3x mb-3"></i>
                <h4 class="text-muted">KYC Verification In Progress</h4>
                <p class="metric-label">You will be notified when your KYC information has been verified and approved.</p>
                <a href="{{ url()->current() }}" class="btn btn-primary mt-3">Refresh Page</a>
            </div>
        </div>

    @elseif(me()->kyc && me()->kyc->approved)

        <div class="card mb-3">
            <div class="card-body text-center">
                <i class="fa fa-check-circle col-green fa-3x mb-3"></i>
                <h4 class="text-muted">KYC Verified</h4>
                <p class="metric-label">Your KYC information has been verified and approved.</p>
            </div>
        </div>

    @endif

    @if(!me()->kyc)

        <div class="card">
            <div class="card-body">

                <div class="mb-4 row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Update KYC Information</h3>
                        <p class="text-muted">Fill the form below to update your KYC details</p>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-edit fa-2x"></i>
                    </div>
                </div>

                <form method="post" action="{{ route('affiliate.dashboard.kyc.update') }}" enctype="multipart/form-data">

                    @csrf

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label>State of Origin</label>
                                <select class="form-control input-bottom" name="state" required>
                                    <option value="">Select State</option>
                                    @foreach(\App\Models\State::all() as $state)
                                        <option value="{{ $state->key }}" {{ old('state') == $state->key ? 'selected' : '' }}>{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label>L.G.A of Origin</label>
                                <input type="text" class="form-control input-bottom" name="lga" value="{{ old('lga') }}" placeholder="Enter your L.G.A of Origin" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label>Date of Birth</label>
                                <input type="date" class="form-control input-bottom" name="birthdate" value="{{ old('birthdate') }}" placeholder="Select date of birth" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label>Marital Status</label>
                                <select class="form-control input-bottom" name="marital" required>
                                    <option value="">Select Status</option>
                                    <option value="single" {{ old('marital') == 'single' ? 'selected' : '' }}>Single</option>
                                    <option value="married" {{ old('marital') == 'married' ? 'selected' : '' }}>Married</option>
                                    <option value="divorced" {{ old('marital') == 'divorced' ? 'selected' : '' }}>Divorced</option>
                                    <option value="widow" {{ old('marital') == 'widow' ? 'selected' : '' }}>Widow</option>
                                    <option value="widower" {{ old('marital') == 'widower' ? 'selected' : '' }}>Widower</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label>ID Card Front</label>
                                <input type="file" class="form-control input-bottom" name="front" accept="image/*" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label>ID Card Back</label>
                                <input type="file" class="form-control input-bottom" name="back" accept="image/*" required>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success rounded-0"><i class="fas fa-save m-r-10"></i> Update KYC</button>

                </form>

            </div>
        </div>

    @endif

@endsection
