<x-kit.dashboard>

    <x-slot name="title">Manage Locations</x-slot>
    <x-slot name="breadcrumb">
        <li class="breadcrumb-item active">Marketing System</li>
        <li class="breadcrumb-item active">Locations</li>
    </x-slot>

    <div class="card mb-3">
        <div class="card-body p-3">
            <div class="filled">
                <i data-acorn-icon="search"></i>
                <input class="form-control live-search-box" placeholder="Type affiliate information to search or filter here..."/>
            </div>
        </div>
    </div>

    <x-kit._partials._empty :entity="$states" :class="'my-4'"/>

    <div class="datalist">
        @foreach($states->chunk(3) as $chunk)
            <div class="row">
                @foreach($chunk as $state)
                    <div class="col-sm-4 mb-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center g-2">
                                    <div class="col-auto">
                                        <span class="fa-stack fa-2x">
                                            <i class="fas fa-circle fa-stack-2x"></i>
                                            <i class="fas fa-map-marked fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                    <div class="col">
                                        <h6 class="mb-0 col-bold">{{ $state->name }}</h6>
                                        <p class="mb-0">{{ $state->estates_count }} Estates | {{ $state->cities_count }} Cities | {{ $state->realtors_count }} Realtors</p>
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{ route('panel.marketing.locations.state.view', $state->key) }}" class="btn btn-success btn-sm"><i class="fa fa-map-signs"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

</x-kit.dashboard>
