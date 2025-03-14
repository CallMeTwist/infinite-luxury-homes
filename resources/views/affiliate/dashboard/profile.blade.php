@extends('affiliate.layout.dashboard',[
    $title = 'Account Settings',
    $pager = 'My Profile',
    $class = 'max-w-screen-xl'
])

@section('content')

    <div class="card mb-5">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-auto">
                    <img alt="{{ me()->name }}" src="{{ asset(me()->avatar ?? '/assets/images/favicon.png') }}" width="80px"/>
                </div>
                <div class="col">
                    <h4>{{ me()->name }}</h4>
                    <p>{{ me()->email }}</p>
                    <p>{{ me()->phone }}</p>
                </div>
                <div class="col-auto">
                    <a href="{{ route('affiliate.logout') }}" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-5">
        <div class="card-body">

            <div class="mb-4 row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Update Account</h3>
                    <p class="text-muted">Fill the form below to update your account details</p>
                </div>
                <div class="col-auto">
                    <i class="fa fa-edit fa-2x"></i>
                </div>
            </div>

            <form method="post" action="{{ route('affiliate.dashboard.profile.update') }}">

                @csrf

                <div class="row">
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>First Name</label>
                            <input type="text" class="form-control input-bottom" name="first_name" value="{{ old('name', me()->first_name) }}" placeholder="Enter your name" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>Last Name</label>
                            <input type="text" class="form-control input-bottom" name="last_name" value="{{ old('name', me()->last_name) }}" placeholder="Enter your name" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label>Select Gender</label>
                            <select class="form-control input-bottom" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="male" {{ old('gender', me()->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender', me()->gender) == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label>Email Address</label>
                            <input type="email" class="form-control input-bottom" name="email" value="{{ old('email', me()->email) }}" placeholder="Enter email address" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label>Phone Number</label>
                            <input type="text" class="form-control input-bottom" name="phone" value="{{ old('phone', me()->phone) }}" placeholder="Enter phone number" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Home Address</label>
                    <input type="text" class="form-control input-bottom" name="address" value="{{ old('address', me()->address) }}" placeholder="Enter home address" required>
                </div>

                <button type="submit" class="btn btn-success rounded-0"><i class="fas fa-save m-r-10"></i> Update Profile</button>

            </form>

            <hr>

            <h6 class="mb-3">Profile Photo</h6>

            <form method="post" action="{{ route('affiliate.dashboard.profile.avatar') }}" enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label>Change Photo</label>
                    <input type="file" class="form-control input-bottom" name="avatar" accept="image/*" required>
                </div>

                <button type="submit" class="btn btn-primary rounded-0"><i class="fas fa-user-circle m-r-10"></i> Change Photo</button>

            </form>

        </div>
    </div>

    <div class="card">
        <div class="card-body">

            <div class="mb-4 row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Password Setting</h3>
                    <p class="text-muted">Fill the form below to update your account password</p>
                </div>
                <div class="col-auto">
                    <i class="fa fa-lock fa-2x"></i>
                </div>
            </div>

            <form method="post" action="{{ route('affiliate.dashboard.profile.password') }}">

                @csrf

                <div class="mb-3">
                    <label>Current Password</label>
                    <input type="password" class="form-control input-bottom" name="old_password" value="{{ old('old_password') }}" placeholder="Enter your current password" required>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label>New Password</label>
                            <input type="password" class="form-control input-bottom" name="password" value="{{ old('password') }}" placeholder="Enter your new password" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control input-bottom" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm password" required>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-warning rounded-0"><i class="fas fa-save m-r-10"></i> Update Password</button>

            </form>

        </div>
    </div>

@endsection
