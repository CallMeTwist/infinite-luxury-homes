@extends('kit.layouts.dashboard',[
    $title = 'Manage Sales',
    $pager = 'Manage Sales'
])

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/datatables.min.css') }}">
@endsection

@section('content')

    <div class="row g-2">
        <div class="col-12 col-xl-4 mb-5">
            <div class="card border-primary">
                <div class="h-100 row g-0 card-body align-items-center">
                    <div class="col-auto">
                        <div class="bg-gradient-light sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center">
                            <i data-acorn-icon="notebook-1" class="text-white"></i>
                        </div>
                    </div>
                    <div class="col">
                        <div class="heading mb-0 sh-8 d-flex align-items-center lh-1-25 ps-3">Total Sales</div>
                    </div>
                    <div class="col-auto ps-3">
                        <div class="display-5 text-primary">{{ $sales->count() }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4 mb-5">
            <div class="card border-success">
                <div class="h-100 row g-0 card-body align-items-center">
                    <div class="col-auto">
                        <div class="bg-success sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center">
                            <i data-acorn-icon="check-circle" class="text-white"></i>
                        </div>
                    </div>
                    <div class="col">
                        <div class="heading mb-0 sh-8 d-flex align-items-center lh-1-25 ps-3">Amount Realised</div>
                    </div>
                    <div class="col-auto ps-3">
                        <div class="display-5 text-success">{!! config('currency.ngn') !!}{{ number_format($sales->sum('amount'), 2) }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4 mb-5">
            <div class="card border-dark">
                <div class="h-100 row g-0 card-body align-items-center">
                    <div class="col-auto">
                        <div class="bg-grey sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center">
                            <i data-acorn-icon="info-circle" class="text-white"></i>
                        </div>
                    </div>
                    <div class="col">
                        <div class="heading mb-0 sh-8 d-flex align-items-center lh-1-25 ps-3">Outstanding Balance</div>
                    </div>
                    <div class="col-auto ps-3">
                        <div class="display-5 text-muted">{!! config('currency.ngn') !!}{{ number_format($sales->sum('balance'), 2) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="scroll-section">
        <h2 class="small-title">Sales History</h2>
        <div class="card mb-5">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-5 col-lg-3 col-xxl-2 mb-1">
                        <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 border border-separator bg-foreground search-sm">
                            <input class="form-control form-control-sm datatable-search" placeholder="Search" data-datatable="#datatableStripe">
                            <span class="search-magnifier-icon">
                                <i data-acorn-icon="search"></i>
                            </span>
                            <span class="search-delete-icon d-none">
                                <i data-acorn-icon="close"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-7 col-lg-9 col-xxl-10 text-end mb-1">
                        <div class="d-inline-block">
                            <button class="btn btn-icon btn-icon-only btn-outline-muted btn-sm datatable-print" type="button" data-datatable="#datatableStripe">
                                <i data-acorn-icon="print"></i>
                            </button>
                            <div class="d-inline-block datatable-export" data-datatable="#datatableStripe">
                                <button class="btn btn-icon btn-icon-only btn-outline-muted btn-sm dropdown" data-bs-toggle="dropdown" type="button" data-bs-offset="0,3">
                                    <i data-acorn-icon="download"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                    <button class="dropdown-item export-copy" type="button">Copy</button>
                                    <button class="dropdown-item export-excel" type="button">Excel</button>
                                    <button class="dropdown-item export-cvs" type="button">Cvs</button>
                                </div>
                            </div>
                            <div class="dropdown-as-select d-inline-block datatable-length" data-datatable="#datatableStripe">
                                <button class="btn btn-outline-muted btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-offset="0,3">
                                    10 Items
                                </button>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                    <a class="dropdown-item" href="#">5 Items</a>
                                    <a class="dropdown-item active" href="#">10 Items</a>
                                    <a class="dropdown-item" href="#">20 Items</a>
                                    <a class="dropdown-item" href="#">50 Items</a>
                                    <a class="dropdown-item" href="#">100 Items</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="data-table data-table-pagination data-table-standard responsive nowrap stripe" id="datatableStripe" data-order='[[ 0, "desc" ]]'>
                    <thead>
                        <tr>
                            <th class="text-muted text-small text-uppercase">Invoice ID</th>
                            <th class="text-muted text-small text-uppercase">Property Name</th>
                            <th class="text-muted text-small text-uppercase">Client Name</th>
                            <th class="text-muted text-small text-uppercase">Amount Sold</th>
                            <th class="text-muted text-small text-uppercase">Balance</th>
                            <th class="text-muted text-small text-uppercase">Date Sold</th>
                            <th class="text-muted text-small text-uppercase">Sold By</th>
                            <th class="text-muted text-small text-uppercase">Comments</th>
                            <th class="text-muted text-small text-uppercase">Date Recorded</th>
                            <th class="text-muted text-small text-uppercase"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($sales as $sale)
                        <tr>
                            <td>{{ $sale->code }}</td>
                            <td class="text-alternate">{{ $sale->property->title }} <a href="{{ route('kit.property.view', $sale->property->code) }}"><i class="fa fa-external-link ml-2"></i></a></td>
                            <td class="text-alternate">{{ $sale->client->name }} <a href="{{ route('kit.client.view', $sale->client->code) }}"><i class="fa fa-external-link ml-2"></i></a></td>
                            <td class="text-alternate">{!! config('currency.ngn') !!}{{ number_format($sale->amount, 2) }}</td>
                            <td class="text-alternate">{!! config('currency.ngn') !!}{{ number_format($sale->balance, 2) }}</td>
                            <td class="text-alternate">{{ $sale->sold_at->format('dS F Y') }}</td>
                            <td class="text-alternate">{{ $sale->sold_by }}</td>
                            <td class="text-alternate">{{ $sale->comments }}</td>
                            <td class="text-alternate">{{ $sale->created_at->format('dS F Y h:i:s a') }}</td>
                            <td><a href="{{ route('kit.sale.receipt', $sale->code) }}" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> </a> </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script src="{{ asset('assets/js/vendor/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/cs/datatable.extend.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatable.boxedvariations.js') }}"></script>
@endsection
