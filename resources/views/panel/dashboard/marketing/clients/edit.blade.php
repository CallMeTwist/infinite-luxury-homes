<x-kit.dashboard>

    <x-slot name="title">Edit Client Information</x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item active">Marketing System</li>
        <li class="breadcrumb-item"><a href="{{ route('panel.marketing.clients.manage') }}">Manage Clients</a></li>
        <li class="breadcrumb-item"><a href="{{ route('panel.marketing.clients.view', $client->code) }}">{{ $client->name }}</a></li>
        <li class="breadcrumb-item active">Edit Information</li>
    </x-slot>

    <div class="card mb-5">
        <div class="card-body">
            <form method="post" action="{{ route('panel.marketing.clients.update') }}" enctype="multipart/form-data">

                @csrf

                <input type="hidden" name="client" value="{{ $client->code }}">

                <h4 class="my-4 text-uppercase col-red">1. Basic Information</h4>

                <div class="mb-3">
                    <label>Select Affiliate</label>
                    <select class="form-control input-bottom" name="affiliate">
                        <option value="">Select Affiliate</option>
                        @foreach(\App\Affiliate::where('approved', true)->get() as $referrer)
                            <option value="{{ $referrer->code }}" {{ old('affiliate') == $referrer->code ? 'selected' : '' }}>{{ $referrer->first_name .' '. $referrer->last_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>Surname</label>
                            <input type="text" class="form-control input-bottom" name="surname" value="{{ old('surname') }}" placeholder="Enter your name" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>First Name</label>
                            <input type="text" class="form-control input-bottom" name="first_name" value="{{ old('first_name') }}" placeholder="Enter first name" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>Other Names</label>
                            <input type="text" class="form-control input-bottom" name="other_names" value="{{ old('other_names') }}" placeholder="Enter your other names" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>Select Gender</label>
                            <select class="form-control input-bottom" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>Date of Birth</label>
                            <input type="date" class="form-control input-bottom" name="birthdate" value="{{ old('birthdate') }}" placeholder="Select date of birth" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
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

                <h4 class="my-4 text-uppercase col-red">2. Contact Information</h4>

                <div class="row">
                    <div class="col-sm-8">
                        <div class="mb-3">
                            <label>Home Address</label>
                            <input type="text" class="form-control input-bottom" name="address" value="{{ old('address') }}" placeholder="Enter home address" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>Change Photo</label>
                            <input type="file" class="form-control input-bottom" name="avatar" accept="image/*">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>Email Address</label>
                            <input type="email" class="form-control input-bottom" name="email" value="{{ old('email') }}" placeholder="Enter email address">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>Phone Number</label>
                            <input type="text" class="form-control input-bottom" name="phone" value="{{ old('phone') }}" placeholder="Enter phone number" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>Occupation</label>
                            <input type="text" class="form-control input-bottom" name="occupation" value="{{ old('occupation') }}" placeholder="Enter occupation" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>Country of Origin</label>
                            <select class="form-control input-bottom" name="country" required>
                                <option value="">Select Country</option>
                                @foreach(\App\Models\Country::all() as $country)
                                    <option value="{{ $country->iso }}" {{ old('country') == $country->iso ? 'selected' : '' }}>{{ $country->nicename }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
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
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>L.G.A of Origin</label>
                            <input type="text" class="form-control input-bottom" name="lga" value="{{ old('lga') }}" placeholder="Enter L.G.A of Origin" required>
                        </div>
                    </div>
                </div>

                <h4 class="my-4 text-uppercase col-red">3. Next Of Kin Information</h4>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label>Next Of Kin Surname</label>
                            <input type="text" class="form-control input-bottom" name="nok_surname" value="{{ old('nok_surname') }}" placeholder="Enter your name" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label>Next Of Kin Other Names</label>
                            <input type="text" class="form-control input-bottom" name="nok_other_names" value="{{ old('nok_other_names') }}" placeholder="Enter your other names" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Next Of Kin Home Address</label>
                    <input type="text" class="form-control input-bottom" name="nok_address" value="{{ old('nok_address') }}" placeholder="Enter home address" required>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>Next Of Kin Gender</label>
                            <select class="form-control input-bottom" name="nok_gender" required>
                                <option value="">Select Gender</option>
                                <option value="male" {{ old('nok_gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('nok_gender') == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>Next Of Kin Phone Number</label>
                            <input type="text" class="form-control input-bottom" name="nok_phone" value="{{ old('nok_phone') }}" placeholder="Enter phone number" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>Next Of Kin Occupation</label>
                            <input type="text" class="form-control input-bottom" name="nok_occupation" value="{{ old('nok_occupation') }}" placeholder="Enter occupation" required>
                        </div>
                    </div>
                </div>

                <div class="alert bg-orange my-3 col-white"><i class="fas fa-info-circle m-r-5"></i> Please go through the form again and verify the information you just provided before you save the information</div>

                <button type="submit" class="btn btn-primary rounded-0"><i class="fas fa-user-circle m-r-10"></i> Create Client Account</button>

            </form>
        </div>
    </div>

</x-kit.dashboard>
