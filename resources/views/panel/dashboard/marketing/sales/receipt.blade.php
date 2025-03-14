<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="generator" content="pdf2htmlEX" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <style>
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #fff;
            font: 12pt "Tahoma";
        }
        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }
        .page {
            width: 210mm;
            min-height: 297mm;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .subpage {
            padding: 1cm;
            border: 5px red solid;
            height: 257mm;
            outline: 2cm #FFEAEA solid;
        }

        @page {
            size: A4;
            margin: 0;
        }
        @media print {
            html, body {
                width: 210mm;
                height: 297mm;
            }
            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/helpers.css') }}" />
    <title></title>
    <style>
        .text-right{text-align: right;}
        .col-blue{color: #004e9d !important}
        .bg-blue{background-color: #004e9d !important}
    </style>
</head>
<body>
<div class="page">
    <div id="sidebar">
        <div id="outline"></div>
    </div>
    <div id="page-container">
        <div id="pf1" class="pf w0 h0" data-page-no="1">
            <div class="pc pc1 w0 h0">
                <div class="container-fluid pt-3">
                    <div class="row">
                        <div class="col-2" style="height: 290mm">
                            <img src="{{ asset('assets/img/background/blue-stripe.jpg') }}" class="w-100 h-100">
                        </div>
                        <div class="col-10 pt-3">

                            <div class="row">
                                <div class="col-9">
                                    <h6 class="col-blue col-bold">BROST GLOBAL RESOURCES</h6>
                                    <p class="col-blue font-11 mb-1">THE LORD IS OUR BANNER (EXODUS 17:15)</p>
                                    <h6 class="col-blue font-11 mb-1">{!! get_settings()->address !!}</h6>
                                    <p class="col-blue font-11 mb-0">{{ get_settings()->phone }}</p>
                                    <p class="col-blue font-11 mb-0">{{ get_settings()->email }}</p>
                                </div>
                                <div class="col-3">
                                    <img src="{{ asset('assets/img/logo/logo.png') }}" class="w-100 mt-3">
                                </div>
                            </div>

                            <div class="m-t-60 row">
                                <div class="col-6">
                                    <h6>{{ now()->format('d M Y') }} #{{ generate_random_numbers(5) }}</h6>
                                    <h1 class="bg-blue p-3 w-75">Invoice</h1>

                                    <h6 class="font-15"><b>Payment Date:</b> {{ $sale->created_at->format('d M Y') }}</h6>
                                    <h6 class="font-15"><b>Order ID:</b> {{ $sale->code }}</h6>
                                </div>
                                <div class="col-6">
                                    <p class="text-right mb-0">To</p>
                                    <h5 class="col-blue text-right mb-0">{{ $sale->client->name }}</h5>
                                    <h6 class="col-blue text-right mb-0">{{ $sale->client->address }}</h6>
                                    <h6 class="col-blue text-right mb-0">{{ $sale->client->phone }}</h6>
                                    <h6 class="col-blue text-right mb-0">{{ $sale->client->email }}</h6>
                                </div>
                            </div>

                            <div class="m-t-60">
                                <table class="table">
                                    <thead class="bg-blue">
                                        <tr>
                                            <th scope="col">Description</th>
                                            <th scope="col">Size</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>{{ $sale->property->title }}</th>
                                            <td>{{ $sale->property->size }}</td>
                                            <td>{!! config('currency.ngn') !!}{{ number_format($sale->amount) }}</td>
                                            <td>{!! config('currency.ngn') !!}{{ number_format($sale->amount) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div style="
                                background-image: url({{ asset('assets/img/logo/grey-logo.jpg') }});
                                background-size: contain;
                                background-color: rgba(255,255,255,0.9);
                                background-blend-mode: lighten;
                                background-repeat: no-repeat;">
                                <div class="m-t-60">
                                    <div class="row">
                                        <div class="col-sm-6"></div>
                                        <div class="col-sm-6">
                                            <div>
                                                <h6 class="font-14"><b>Subtotal:</b> <span class="pull-right">{!! config('currency.ngn') !!}{{ number_format($sale->amount) }}</span></h6>
                                            </div>
                                            <div>
                                                <h6 class="font-14"><b>VAT(0%):</b> <span class="pull-right">{!! config('currency.ngn') !!}0.00</span></h6>
                                            </div>
                                            <div class="m-b-20">
                                                <h6 class="font-14"><b>Total:</b> <span class="pull-right bg-blue p-2 col-bold">{!! config('currency.ngn') !!}{{ number_format($sale->amount) }}</span></h6>
                                            </div>
                                            <div>
                                                <h6 class="font-14"><b>Amount Paid:</b> <span class="pull-right col-bold">{!! config('currency.ngn') !!}{{ number_format($sale->amount) }}</span></h6>
                                            </div>
                                            <div>
                                                <h6 class="font-14"><b>Balance:</b> <span class="pull-right col-bold col-orange">{!! config('currency.ngn') !!}{{ number_format($sale->balance) }}</span></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="m-t-80">
                                    <h6 class="mb-0 font-13 col-bold">Thank you</h6>
                                    <h6 class="m-b-20 font-13 col-bold">{{ $sale->client->name }}, we really appreciate your trust in us</h6>

                                    <h6 class="col-blue mb-0 font-13 col-bold">Pay To:</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="col-blue mb-0 font-12">Account: <b>1023903141</b></p>
                                            <p class="col-blue mb-0 font-12">Bank: <b>UBA Bank</b></p>
                                            <p class="col-blue mb-0 font-12">Account Name: <b>Brost Global Resources LTD</b></p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="text-right col-blue mb-0 font-12">Account: <b>2117289084</b></p>
                                            <p class="text-right col-blue mb-0 font-12">Bank: <b>UBA Bank</b></p>
                                            <p class="text-right col-blue mb-0 font-12">Account Name: <b>Stanley Uzor</b></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <img src="{{ asset('assets/img/background/signature.jpg') }}" class="m-t-40 m-b-30" style="width: 20%">
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
