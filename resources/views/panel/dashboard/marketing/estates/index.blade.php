<x-kit.dashboard>

    <x-slot name="title">Manage Estates</x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item active">Marketing Elements</li>
        <li class="breadcrumb-item active">Manage Estates</li>
    </x-slot>

    <div class="card mb-4">
        <div class="card-body">

            <x-kit._card_title
                :title="'Add New Estate'"
                :icon="'fa fa-briefcase'"
                :description="'Fill the form below to add a new estate'" />

            <form action="{{ route('panel.marketing.estates.save') }}" method="post" enctype="multipart/form-data">

                @csrf

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label>Estate Name</label>
                            <input type="text" class="form-control input-bottom" name="name" value="{{ old('name') }}" placeholder="Enter Estate's name" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label>Select City</label>
                            <select class="form-control input-bottom" name="city" required>
                                <option value="">Select option</option>
                                @foreach(\App\Models\City::all() as $city)
                                    <option value="{{ $city->id }}" {{ old('city') == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label>Estate Price</label>
                            <input type="number" class="form-control input-bottom" name="price" value="{{ old('price') }}" placeholder="E.g 1500000" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label>How Many Plots</label>
                            <input type="number" class="form-control input-bottom" name="plots" value="{{ old('plots') }}" placeholder="E.g 200" required>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success rounded-0"><i class="fas fa-plus-circle m-r-10"></i> Save Estate</button>

            </form>

        </div>
    </div>

    @if($estates->count() == 0)
        <div class="text-center">
            <i class="fa fa-info-circle col-white font-50 my-3"></i>
            <h4 class="text-muted">No estates added here yet.</h4>
            <p class="metric-label">Sorry we can't find any data, if there are estates here, it will show up on this page.</p>
            <a href="{{ url()->current() }}" class="btn btn-primary mt-3">Refresh Page</a>
        </div>
    @endif

    @foreach($estates->chunk(3) as $chunk)
        <div class="row mb-3">
            @foreach($chunk as $estate)
                <div class="col-sm-4">
                    <div class="card rounded-0">
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item d-flex align-items-center justify-content-between">
                                    <h6 class="col-bold mb-0">{{ $estate->name }}</h6>
                                    <p class="mb-0">Name</p>
                                </div>
                                <div class="list-group-item d-flex align-items-center justify-content-between">
                                    <h6 class="col-bold mb-0">{{ $estate->city->name }}, {{ $estate->city->state->name }}</h6>
                                    <p class="mb-0">Location</p>
                                </div>
                                <div class="list-group-item d-flex align-items-center justify-content-between">
                                    <h6 class="col-bold mb-0">{{ $estate->plots }}</h6>
                                    <p class="mb-0">Plots</p>
                                </div>
                                <div class="list-group-item d-flex align-items-center justify-content-between">
                                    <h6 class="col-bold mb-0">{!! config('currency')[get_settings()->currency] !!}{{ number_format($estate->price) }}</h6>
                                    <p class="mb-0">Price</p>
                                </div>
                                <div class="list-group-item d-flex align-items-center justify-content-between">
                                    <h6 class="col-bold mb-0">{{ number_format($estate->sales->count()) }} Sales / {!! config('currency')[get_settings()->currency] !!}{{ number_format($estate->sales->sum('amount')) }}</h6>
                                    <p class="mb-0">Sales</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-danger btn-sm rounded-0" data-bs-toggle="modal" data-bs-target="#del{{ $estate->code }}"><i class="fa fa-trash-can me-1"></i> Delete</button>
                            <button class="btn btn-primary btn-sm rounded-0" data-bs-toggle="modal" data-bs-target="#edit{{ $estate->code }}"><i class="fa fa-edit me-1"></i> Edit</button>
                            <a href="{{ route('panel.marketing.estates.view', $estate->code) }}" class="btn btn-secondary btn-sm rounded-0"><i class="fa fa-street-view me-1"></i> View</a>
                        </div>
                    </div>
                </div>

                <!-- edit{{ $estate->code }} Modal -->
                <div class="modal fade" id="edit{{ $estate->code }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Estate</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('panel.marketing.estates.update') }}" method="post" enctype="multipart/form-data">

                                    @csrf

                                    <input type="hidden" name="estate" value="{{ $estate->code }}" required>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label>Estate Name</label>
                                                <input type="text" class="form-control input-bottom" name="name" value="{{ old('name', $estate->name) }}" placeholder="Enter Estate's name" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label>Select City</label>
                                                <select class="form-control input-bottom" name="city" required>
                                                    <option value="">Select option</option>
                                                    @foreach(\App\Models\City::all() as $city)
                                                        <option value="{{ $city->id }}" {{ old('city', $estate->city_id) == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label>Estate Price</label>
                                                <input type="number" class="form-control input-bottom" name="price" value="{{ old('price', $estate->price) }}" placeholder="E.g 1500000" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label>How Many Plots</label>
                                                <input type="number" class="form-control input-bottom" name="plots" value="{{ old('plots', $estate->plots) }}" placeholder="E.g 200" required>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success rounded-0"><i class="fas fa-save m-r-10"></i> Update Estate</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete Modal -->
                <div class="modal fade" id="del{{ $estate->code }}" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="px-3 pt-3 text-center">
                                    <div class="event-type bg-red">
                                        <div class="event-indicator">
                                            <i class="fas fa-trash text-white" style="font-size: 40px"></i>
                                        </div>
                                    </div>
                                    <h3 class="pt-3">Delete {{ $estate->name }}?</h3>
                                    <p class="text-muted">This action will delete this estate, this action cannot be undone!</p>
                                </div>
                                <div class="text-center">
                                    <form method="post" action="{{ route('panel.marketing.estates.delete') }}">
                                        @csrf
                                        <input type="hidden" name="team" value="{{ $estate->code }}" required>
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

</x-kit.dashboard>
