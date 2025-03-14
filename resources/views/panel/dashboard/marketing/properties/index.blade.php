@extends('kit.layouts.dashboard',[
    $title = 'Manage Properties',
    $pager = 'Manage Properties'
])

@section('content')

    <div class="row g-2">
        <div class="col-12 col-xl-3 mb-5">
            <div class="card border-primary">
                <div class="h-100 row g-0 card-body align-items-center">
                    <div class="col-auto">
                        <div class="bg-gradient-light sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center">
                            <i data-acorn-icon="notebook-1" class="text-white"></i>
                        </div>
                    </div>
                    <div class="col">
                        <div class="heading mb-0 sh-8 d-flex align-items-center lh-1-25 ps-3">Total Properties</div>
                    </div>
                    <div class="col-auto ps-3">
                        <div class="display-5 text-primary">{{ $properties->count() }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-3 mb-5">
            <div class="card border-success">
                <div class="h-100 row g-0 card-body align-items-center">
                    <div class="col-auto">
                        <div class="bg-success sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center">
                            <i data-acorn-icon="check-circle" class="text-white"></i>
                        </div>
                    </div>
                    <div class="col">
                        <div class="heading mb-0 sh-8 d-flex align-items-center lh-1-25 ps-3">Sold Properties</div>
                    </div>
                    <div class="col-auto ps-3">
                        <div class="display-5 text-success">{{ $properties->where('sold', true)->count() }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-3 mb-5">
            <div class="card border-dark">
                <div class="h-100 row g-0 card-body align-items-center">
                    <div class="col-auto">
                        <div class="bg-grey sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center">
                            <i data-acorn-icon="info-circle" class="text-white"></i>
                        </div>
                    </div>
                    <div class="col">
                        <div class="heading mb-0 sh-8 d-flex align-items-center lh-1-25 ps-3">Active Properties</div>
                    </div>
                    <div class="col-auto ps-3">
                        <div class="display-5 text-muted">{{ $properties->where('sold', false)->count() }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-3 mb-5">
            <div class="card border-danger">
                <div class="h-100 row g-0 card-body align-items-center">
                    <div class="col-auto">
                        <div class="bg-danger sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center">
                            <i data-acorn-icon="lock-on" class="text-white"></i>
                        </div>
                    </div>
                    <div class="col">
                        <div class="heading mb-0 sh-8 d-flex align-items-center lh-1-25 ps-3">Locked Properties</div>
                    </div>
                    <div class="col-auto ps-3">
                        <div class="display-5 text-danger">{{ \App\Property::onlyTrashed()->count() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="scroll-section">

        <h2 class="small-title">Add A New Property</h2>

        @include('layouts._partials._errors')
        @include('layouts._partials._alert')

        <div class="card mb-5">
            <div class="card-body">
                <form method="post" action="{{ route('kit.property.save') }}" enctype="multipart/form-data">

                    @csrf

                    <div class="row">
                        <div class="col-sm-8">
                            <div class="mb-3">
                                <label class="form-label">Property Title</label>
                                <div class="filled">
                                    <i data-acorn-icon="file-text"></i>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Enter property title" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">Asking Price</label>
                                <div class="filled">
                                    <i data-acorn-icon="activity"></i>
                                    <input type="number" class="form-control" name="price" value="{{ old('price') }}" placeholder="Enter asking price" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">Property Location</label>
                                <div class="filled w-100">
                                    <i data-acorn-icon="pin"></i>
                                    <select data-placeholder="Choose..." name="area" required>
                                        <option value="">Choose...</option>
                                        @foreach(\App\Area::all() as $area)
                                            <option value="{{ $area->id }}">{{ $area->name }} ({{ $area->location->name .', '.$area->location->state->name }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Property Image</label>
                                <input class="form-control" type="file" id="formFile" name="image" accept="image/*">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">Property Size</label>
                                <div class="filled">
                                    <i data-acorn-icon="activity"></i>
                                    <input type="text" class="form-control" name="size" value="{{ old('size') }}" placeholder="Enter property size">
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save Property</button>

                </form>
            </div>
        </div>

    </section>

    <section class="scroll-section" id="basicItems">
        <h2 class="small-title">Manage Properties</h2>

        @foreach($properties->chunk(3) as $chunk)
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 row-cols-xl-4">
                @foreach($chunk as $property)
                    <div class="col-sm-4 mb-5">
                        <div class="card h-100">
                            @if($property->sold)
                                <span class="badge rounded-pill bg-danger me-1 position-absolute e-3 t-n2 z-index-1">SOLD</span>
                            @else
                                <span class="badge rounded-pill bg-success me-1 position-absolute e-3 t-n2 z-index-1">ACTIVE</span>
                            @endif
                            @if($property->media->count())
                                <img src="{{ asset($property->media->first()->media) }}" class="card-img-top sh-22" alt="card image">
                            @else
                                <img src="https://via.placeholder.com/468x60?text=Upload+An+Image" class="card-img-top sh-22" alt="card image">
                            @endif
                            <div class="card-body p-2">
                                <h4 class="heading fw-bold">{{ $property->title }}</h4>
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="mb-0"><i data-acorn-icon="pin" class="me-1"></i> {{ $property->area->name }}</p>
                                    <p class="mb-0">{!! config('currency.ngn') !!}{{ number_format($property->price) }}</p>
                                </div>
                                @if($property->client)
                                    <div class="row g-0 mt-2">
                                        <div class="col-auto">
                                            <div class="sw-5 me-3">
                                                <img src="{{ asset('/uploads/clients/'.$property->client->avatar) }}" class="img-fluid rounded-xl" alt="{{ $property->client->name }}">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <a href="{{ route('kit.client.view', $property->client->code) }}">{{ $property->client->name }}</a>
                                            <div class="text-muted text-small mb-2">{{ $property->client->phone }}</div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body p-2">
                                <a href="{{ route('kit.property.view', $property->slug) }}" class="btn btn-dark w-100">Manage Property</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach

    </section>

@endsection
