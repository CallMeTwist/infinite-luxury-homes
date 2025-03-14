<x-kit.dashboard>

    <x-slot name="title">{{ $state->name }}</x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('panel.marketing.locations.manage') }}">Manage Locations</a></li>
        <li class="breadcrumb-item active">{{ $state->name }}</li>
    </x-slot>

    <!-- Add Modal -->
    <div class="modal fade add" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header p-3 d-flex align-items-center justify-content-between">
                    <h5 class="modal-title">Add New City</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-3">

                    <form action="{{ route('panel.marketing.locations.state.city.save') }}" method="post" enctype="multipart/form-data">

                        @csrf

                        <input type="hidden" name="state" value="{{ $state->key }}">

                        <div class="form-group mb-3">
                            <label>City Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter name of the city" required>
                            </div>
                            @error('name')
                                <span class="text-danger"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-primary">Save City</button>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 col-sm-12">

            <x-kit.states._state_nav :state="$state" />

        </div>
        <div class="col-md-9 col-sm-12">

            <div class="card card-body">
                <div class="row">
                    <div class="col-sm-10">
                        <x-kit._search_filter :placeholder="'Type to filter cities'" />
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-success m-r-5 w-100" data-bs-toggle="modal" data-bs-target=".add"><i class="fa fa-plus m-r-5"></i> Add City</button>
                    </div>
                </div>
            </div>

            <x-kit._partials._empty :entity="$state->cities" :class="'my-4'"/>

            <div class="datalist mt-3">
                @foreach($state->cities->chunk(3) as $chunk)
                    <div class="row g-2">
                        @foreach($chunk as $city)
                            <div class="col-sm-4">
                                <div class="card border-0">
                                    <div class="card-body p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="fa-stack fa-2x">
                                                    <i class="fas fa-circle fa-stack-2x col-green"></i>
                                                    <i class="fas fa-map-marked fa-stack-1x fa-inverse"></i>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <h6 class="mb-0">{{ $city->name }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>

        </div>
    </div>

</x-kit.dashboard>
