@extends('kit.layouts.dashboard',[
    $title = 'Manage Properties',
    $pager = 'Manage Properties'
])

@section('content')

    @include('layouts._partials._errors')
    @include('layouts._partials._alert')

    <div class="row g-3">
        <div class="col-sm-4">
            <div class="card h-100">
                @if($property->sold)
                    <span class="badge rounded-pill bg-danger me-1 position-absolute e-3 t-n2 z-index-1">SOLD</span>
                @else
                    <span class="badge rounded-pill bg-warning me-1 position-absolute e-3 t-n2 z-index-1">NOT SOLD</span>
                @endif
                @if($property->media->count())
                    <img src="{{ asset($property->media->first()->media) }}" class="card-img-top sh-22" alt="card image">
                @else
                    <img src="https://via.placeholder.com/468x60?text=Upload+An+Image" class="card-img-top sh-22" alt="card image">
                @endif
                <div class="card-body">
                    <h4 class="heading fw-bold">{{ $property->title }} <small class="text-muted">{{ $property->size }}</small></h4>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="mb-0"><i data-acorn-icon="pin" class="me-1"></i> {{ $property->area->name }}</p>
                        <p class="mb-0">{!! config('currency.ngn') !!}{{ number_format($property->price) }}</p>
                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <button class="btn btn-sm w-100 btn-icon btn-icon-start btn-danger mb-1"
                                data-bs-toggle="modal" data-bs-target=".delete{{ $property->code }}"><i class="fa fa-trash-o m-r-5"></i><small>Delete</small></button>
                        @if($property->trashed())
                            <button class="btn btn-sm w-100 btn-icon btn-icon-start btn-success m-l-10 mb-1"
                                    data-bs-toggle="modal" data-bs-target=".activate{{ $property->code }}"><i class="fa fa-check-circle m-r-5"></i><small>Activate</small></button>
                        @else
                            <button class="btn btn-sm w-100 btn-icon btn-icon-start btn-warning m-l-10 mb-1"
                                    data-bs-toggle="modal" data-bs-target=".suspend{{ $property->code }}"><i class="fa fa-ban m-r-5"></i><small>Deactivate</small></button>

                            @if(!$property->sold)
                                <button class="btn btn-sm w-100 btn-icon btn-icon-start btn-primary m-l-10 mb-1"
                                        data-bs-toggle="modal" data-bs-target=".sold{{ $property->code }}"><i class="fa fa-user-circle m-r-5"></i><small>Sold</small></button>
                            @endif
                        @endif
                    </div>
                    @if($property->client)
                        <div class="row g-0 mt-3">
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
            </div>

            @if($property->trashed())
                <div class="modal fade activate{{ $property->code }}" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="px-3 pt-3 text-center">
                                    <div class="event-type bg-light-green">
                                        <div class="event-indicator">
                                            <i class="fa fa-check-circle text-white" style="font-size: 40px"></i>
                                        </div>
                                    </div>
                                    <h3 class="pt-3">Restore Property?</h3>
                                    <p class="text-muted">
                                        This action will restore this property and all the documents and media files attached to it, do you want to continue?
                                    </p>
                                    <form method="post" action="{{ route('kit.property.activate') }}">
                                        @csrf
                                        <input type="hidden" name="property" value="{{ $property->code }}" required>
                                        <button type="submit" class="btn bg-light-green">Restore Anyway</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="modal fade suspend{{ $property->code }}" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="px-3 pt-3 text-center">
                                    <div class="event-type bg-orange">
                                        <div class="event-indicator">
                                            <i class="fa fa-ban text-white" style="font-size: 40px"></i>
                                        </div>
                                    </div>
                                    <h3 class="pt-3">Deactivate Property?</h3>
                                    <p class="text-muted">
                                        This action will make this property and all the documents and media files attached to it invisible to the public eye, do you want to continue?
                                    </p>
                                    <form method="post" action="{{ route('kit.property.deactivate') }}">
                                        @csrf
                                        <input type="hidden" name="property" value="{{ $property->code }}" required>
                                        <button type="submit" class="btn bg-orange">Deactivate Anyway</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="modal fade delete{{ $property->code }}" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="px-3 pt-3 text-center">
                                <div class="event-type bg-red">
                                    <div class="event-indicator">
                                        <i class="fa fa-trash-o text-white" style="font-size: 40px"></i>
                                    </div>
                                </div>
                                <h3 class="pt-3">Delete Property?</h3>
                                <p class="text-muted">
                                    This action will delete this property and all the documents and media files attached to it, this action cannot be undone!
                                </p>
                                <form method="post" action="{{ route('kit.property.delete') }}">
                                    @csrf
                                    <input type="hidden" name="property" value="{{ $property->code }}" required>
                                    <button type="submit" class="btn bg-red">Delete Anyway</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(!$property->trashed())
                @if(!$property->sold)

                    <!-- Sold .sold{{ $property->code }} Modal -->
                    <div class="modal fade sold{{ $property->code }}" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header py-3">
                                    <h5 class="modal-title">Mark Property As Sold</h5>
                                </div>
                                <div class="modal-body">

                                    <form method="post" action="{{ route('kit.property.sold') }}">

                                        @csrf

                                        <input type="hidden" name="property" value="{{ $property->code }}" />

                                        <div class="mb-3">
                                            <label class="form-label">Property Buyer</label>
                                            <div class="filled w-100">
                                                <i data-acorn-icon="pin"></i>
                                                <select id="mySelect2" data-placeholder="Choose..." name="client" required>
                                                    <option value="">Choose...</option>
                                                    @foreach(\App\Client::all() as $client)
                                                        <option value="{{ $client->code }}" {{ old('client') == $client->code ? 'selected' : '' }}>{{ $client->surname .' '.$client->other_names }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Amount Sold</label>
                                                    <div class="filled">
                                                        <i data-acorn-icon="file-text"></i>
                                                        <input type="number" class="form-control" name="amount" value="{{ old('amount') }}" placeholder="Enter amount sold" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Outstanding Balance</label>
                                                    <div class="filled">
                                                        <i data-acorn-icon="file-text"></i>
                                                        <input type="number" class="form-control" name="balance" value="{{ old('balance', 0) }}" placeholder="Enter balance" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Date Sold</label>
                                                    <div class="filled">
                                                        <i data-acorn-icon="file-text"></i>
                                                        <input type="date" class="form-control" name="sold_at" value="{{ old('sold_at') }}" placeholder="Select date sold" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Payment Method</label>
                                                    <div class="filled">
                                                        <i data-acorn-icon="file-text"></i>
                                                        <input type="text" class="form-control" name="payment" value="{{ old('payment') }}" placeholder="Enter means of payment" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Additional Comments</label>
                                            <div class="filled">
                                                <i data-acorn-icon="file-text"></i>
                                                <input type="text" class="form-control" name="comment" value="{{ old('comment') }}" placeholder="Any note about the transaction">
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-secondary">Update Property</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                @endif
            @endif

        </div>
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('kit.property.update') }}" enctype="multipart/form-data">

                        @csrf

                        <input type="hidden" name="property" value="{{ $property->code }}" />

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="mb-3">
                                    <label class="form-label">Property Title</label>
                                    <div class="filled">
                                        <i data-acorn-icon="file-text"></i>
                                        <input type="text" class="form-control" name="title" value="{{ old('title', $property->title) }}" placeholder="Enter property title" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Asking Price</label>
                                    <div class="filled">
                                        <i data-acorn-icon="activity"></i>
                                        <input type="number" class="form-control" name="price" value="{{ old('price', $property->price) }}" placeholder="Enter asking price" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="mb-3">
                                    <label class="form-label">Property Location</label>
                                    <div class="filled w-100">
                                        <i data-acorn-icon="pin"></i>
                                        <select id="select2Filled" data-placeholder="Choose..." name="area" required>
                                            <option value="">Choose...</option>
                                            @foreach(\App\Area::all() as $area)
                                                <option value="{{ $area->id }}" {{ $property->area_id == $area->id ? 'selected' : '' }}>{{ $area->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">Property Size</label>
                                    <div class="filled">
                                        <i data-acorn-icon="activity"></i>
                                        <input type="text" class="form-control" name="size" value="{{ old('size', $property->size) }}" placeholder="Enter property size">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-secondary">Update Property</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body p-3">

                    <form method="post" action="{{ route('kit.properties.document.save') }}" enctype="multipart/form-data">

                        @csrf

                        <input type="hidden" name="property" value="{{ $property->code }}" />

                        <div class="mb-3">
                            <label class="form-label">Document Title</label>
                            <div class="filled">
                                <i data-acorn-icon="file-text"></i>
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Enter document title" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Document Type</label>
                                    <div class="filled w-100">
                                        <i data-acorn-icon="pin"></i>
                                        <select data-placeholder="Choose..." name="type" required>
                                            <option value="">Choose...</option>
                                            <option value="pdf">PDF Document</option>
                                            <option value="docx">Word Document</option>
                                            <option value="text">Text File</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Property Document</label>
                                    <input class="form-control" type="file" name="document" required>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Upload Document</button>

                    </form>

                </div>
            </div>

            <div class="row mt-4">
                @foreach($property->documents as $document)
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="d-flex align-items-center justify-content-start">
                                    @if($document->type == 'pdf')
                                        <i class="fa fa-file-pdf-o col-red fa-3x m-r-10"></i>
                                    @endif
                                    @if($document->type == 'text')
                                        <i class="fa fa-file-text-o col-grey fa-3x m-r-10"></i>
                                    @endif
                                    @if($document->type == 'docx')
                                        <i class="fa fa-file-word-o col-blue fa-3x m-r-10"></i>
                                    @endif
                                    <div>
                                        <h6 class="mb-0 col-bold">{{ $document->title }}</h6>
                                        <p class="mb-0">{{ $document->document }}</p>
                                    </div>
                                </div>
                                <div class="d-flex mt-3 justify-content-between">
                                    <a href="{{ asset('/uploads/properties/'.$property->code.'/documents/'.$document->document) }}"
                                       class="btn btn-sm w-100 btn-icon btn-icon-start btn-secondary mb-1"><i class="fa fa-download"></i><small>Download</small></a>
                                    <button class="btn btn-sm w-100 btn-icon btn-icon-start btn-danger m-l-10 mb-1"
                                            data-bs-toggle="modal" data-bs-target=".delete{{ $document->id }}"><i class="fa fa-trash-o"></i><small>Delete</small></button>
                                    <button class="btn btn-sm w-100 btn-icon btn-icon-start btn-primary m-l-10 mb-1"
                                            data-bs-toggle="modal" data-bs-target=".edit{{ $document->id }}"><i class="fa fa-pencil"></i><small>Edit</small></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Modal -->
                    <div class="modal fade edit{{ $document->id }}" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header py-3">
                                    <h5 class="modal-title">Edit Document</h5>
                                </div>
                                <div class="modal-body">

                                    <form method="post" action="{{ route('kit.properties.document.update') }}" enctype="multipart/form-data">

                                        @csrf

                                        <input type="hidden" name="_document" value="{{ $document->id }}" />
                                        <input type="hidden" name="property" value="{{ $property->code }}" />

                                        <div class="mb-3">
                                            <label class="form-label">Document Title</label>
                                            <div class="filled">
                                                <i data-acorn-icon="file-text"></i>
                                                <input type="text" class="form-control" name="title" value="{{ old('title', $document->title) }}" placeholder="Enter document title" required>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Document Type</label>
                                            <div class="filled w-100">
                                                <i data-acorn-icon="pin"></i>
                                                <select data-placeholder="Choose..." name="type" required>
                                                    <option value="">Choose...</option>
                                                    <option value="pdf" {{ $document->type == 'pdf' ? 'selected' : '' }}>PDF Document</option>
                                                    <option value="docx" {{ $document->type == 'docx' ? 'selected' : '' }}>Word Document</option>
                                                    <option value="text" {{ $document->type == 'text' ? 'selected' : '' }}>Text File</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Property Document</label>
                                            <input class="form-control" type="file" name="document">
                                        </div>

                                        <button type="submit" class="btn btn-primary">Update Document</button>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade delete{{ $document->id }}" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="px-3 pt-3 text-center">
                                        <div class="event-type bg-red">
                                            <div class="event-indicator">
                                                <i class="fa fa-trash-o text-white" style="font-size: 40px"></i>
                                            </div>
                                        </div>
                                        <h3 class="pt-3">Delete Document?</h3>
                                        <h4 class="col-red">{{ $document->document }}</h4>
                                        <p class="text-muted">
                                            This action will delete this document, this action cannot be undone!
                                        </p>
                                        <form method="post" action="{{ route('kit.properties.document.delete') }}">
                                            @csrf
                                            <input type="hidden" name="document" value="{{ $document->id }}" required>
                                            <button type="submit" class="btn bg-red">Delete Anyway</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <div class="col-sm-6">

            <div class="card">
                <div class="card-body p-3">

                    <form method="post" action="{{ route('kit.properties.media.save') }}" enctype="multipart/form-data">

                        @csrf

                        <input type="hidden" name="property" value="{{ $property->code }}" />

                        <div class="mb-3">
                            <label class="form-label">Media Title</label>
                            <div class="filled">
                                <i data-acorn-icon="file-text"></i>
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Enter media title" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Media Type</label>
                                    <div class="filled w-100">
                                        <i data-acorn-icon="pin"></i>
                                        <select class="type" id="select1Filled" data-placeholder="Choose..." name="type" required>
                                            <option value="">Choose...</option>
                                            <option value="video">Video Link</option>
                                            <option value="image">Image Media</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3 image hidden">
                                    <label for="formFile" class="form-label">Media Image</label>
                                    <input class="form-control" type="file" name="image">
                                </div>

                                <div class="mb-3 video hidden">
                                    <label class="form-label">Video Link</label>
                                    <div class="filled">
                                        <i data-acorn-icon="file-link"></i>
                                        <input type="text" class="form-control" name="link" value="{{ old('link') }}" placeholder="Your video link goes here">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Upload Media</button>

                    </form>

                </div>
            </div>

            <div class="row mt-4">
                @foreach($property->media as $media)
                    <div class="col-sm-6">
                        <div class="card">
                            @if($media->type == 'image')
                                <img src="{{ asset($media->media) }}" class="card-img-top sh-22" alt="{{ $media->title }}">
                            @else
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="{{ $media->media }}"></iframe>
                                </div>
                            @endif
                            <div class="card-body p-3">
                                <div class="d-flex align-items-center justify-content-start">
                                    @if($media->type == 'image')
                                        <i class="fa fa-file-image-o col-blue fa-3x m-r-10"></i>
                                    @endif
                                    @if($media->type == 'link')
                                        <i class="fa fa-file-video-o col-red fa-3x m-r-10"></i>
                                    @endif
                                    <div>
                                        <h6 class="mb-0 col-bold">{{ $media->title }}</h6>
                                        <p class="mb-0">{{ explode('/', $media->media)[5] }}</p>
                                    </div>
                                </div>
                                <div class="d-flex mt-3 justify-content-between">
                                    <a href="{{ asset($media->media) }}"
                                       class="btn btn-sm w-100 btn-icon btn-icon-start btn-secondary mb-1"><i class="fa fa-download m-l-5"></i><small>Download</small></a>
                                    <button class="btn btn-sm w-100 btn-icon btn-icon-start btn-danger m-l-10 mb-1"
                                            data-bs-toggle="modal" data-bs-target=".deleteMedia{{ $media->id }}"><i class="fa fa-trash-o m-l-5"></i><small>Delete</small></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade deleteMedia{{ $media->id }}" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="px-3 pt-3 text-center">
                                        <div class="event-type bg-red">
                                            <div class="event-indicator">
                                                <i class="fa fa-trash-o text-white" style="font-size: 40px"></i>
                                            </div>
                                        </div>
                                        <h3 class="pt-3">Delete Media?</h3>
                                        <h4 class="col-red">{{ explode('/', $media->media)[5] }}</h4>
                                        <p class="text-muted">
                                            This action will delete this media, this action cannot be undone!
                                        </p>
                                        <form method="post" action="{{ route('kit.properties.media.delete') }}">
                                            @csrf
                                            <input type="hidden" name="media" value="{{ $media->id }}" required>
                                            <button type="submit" class="btn bg-red">Delete Anyway</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $('body').on('change','.type', function(){
            if($('.type').val() === 'image'){
                $('.image').removeClass('hidden')
                $('.video').addClass('hidden')
            }
            else if($('.type').val() === 'video'){
                $('.image').addClass('hidden')
                $('.video').removeClass('hidden')
            }
        })
        $('#mySelect2').select2({
            dropdownParent: $('.sold{{ $property->code }}')
        });
        $('#mySelect3').select2({
            dropdownParent: $('.sold{{ $property->code }}')
        });
    </script>
@endsection
