@extends('layout.adminmaster')
@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-body print-content">
                <div class="container-fluid d-flex justify-content-between">
                    <div class="col-lg-3 ps-0">
                        <a href="#" class="noble-ui-logo logo-light d-block mt-3">Elkhawas<span>LTD</span></a>
                        <p class="mt-1 mb-1"><b>Elkhawas Company</b></p>
                        <p>108,<br> Great Russell St,<br>London, WC1B 3NA.</p>
                        <h5 class="mt-5 mb-2 text-muted">{{ __('translation.Invoice To') }} :</h5>
                        <p>{{ $order->user->name }},<br> {{ $order->address->address }},<br> {{ $order->address->city  }}, {{ $order->address->state  }}</p>
                    </div>
                    <div class="col-lg-3 pe-0">
                        <h4 class="fw-bolder text-uppercase text-end mt-4 mb-2">{{ __('translation.Invoice') }}</h4>
                        <h6 class="text-end mb-5 pb-4">#{{ $order->order_id }}</h6>
                        <p class="text-end mb-1">{{ __('translation.Balance Due') }}</p>
                        <h4 class="text-end fw-normal">${{ $order->total_price }}</h4>
                        <h6 class="mb-0 mt-3 text-end fw-normal mb-2"><span class="text-muted">{{ __('translation.Date Purchased') }} :</span> {{Carbon\Carbon::parse($order->created_at)->format('Y M d, H:i a')  }}</h6>
                        @if($order->shipped_date)
                            <h6 class="mb-0 mt-3 text-end fw-normal mb-2"><span class="text-muted"> {{ __('translation.Shipped Date') }} :</span> {{Carbon\Carbon::parse($order->shipped_date)->format('Y M d, H:i a')  }}</h6>
                        @endif
                    </div>
                </div>

                <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                    <div class="table-responsive w-100">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('translation.Item') }}</th>
                                    <th>{{ __('translation.Name') }}</th>
                                    <th class="text-end">{{ __('translation.Unit Price') }}</th>
                                    <th class="text-end">{{ __('translation.Quantity') }}</th>
                                    <th class="text-end">{{ __('translation.Total Price') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $counter = 1;
                                @endphp
                                @foreach($order->order_details as $key => $orderdetail)
                                <tr class="text-end">
                                    <td class="text-start">{{ $counter }}</td>
                                    <td>
                                        <img style="height: 50px;width:50px;" src="{{ $orderdetail->item->image != null ? url('storage/' . $orderdetail->item->image) : url('item.png') }}" />
                                    </td>
                                    <td class="text-start">{{ $orderdetail->item->title[app()->getLocale()] }}</td>
                                    <td>${{ $orderdetail->item->unit_price }}</td>
                                    <td>{{ $orderdetail->quantity }}</td>
                                    <td>${{ $orderdetail->item->total_price }}</td>
                                </tr>
                                @php
                                    $counter++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Content before page break -->
                <div class="container-fluid mt-5 w-100">
                    <div class="row">
                        <div class="col-md-6 ms-auto">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>{{ __('translation.Sub Total') }}</td>
                                            <td class="text-end">${{ $order->subtotal }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('translation.Discount') }}</td>
                                            <td class="text-danger text-end">(-) ${{ $order->coupon ? $order->coupon->discount : 0 }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-bold-800">{{ __('translation.Total') }}</td>
                                            <td class="text-bold-800 text-end"> ${{ $order->total_price }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Page break -->
                <div class="page-break"></div>

                <div class="scissors" style="text-align:center;margin:40px  0px;">
                    <i class="fas fa-cut"></i>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  - - - - - - - - - - - - - - - - - - -
                </div>

                <!--start of second page-->
                <!-- Content after page break -->
                <div class="container-fluid d-flex justify-content-between">
                    <div class="col-lg-3 ps-0">
                        <a href="#" class="noble-ui-logo logo-light d-block mt-3">Elkhawas<span>LTD</span></a>
                        <p class="mt-1 mb-1"><b>Elkhawas Company</b></p>
                        <p>108,<br> Great Russell St,<br>London, WC1B 3NA.</p>
                    </div>
                    <div class="col-lg-3 pe-0">
                        <h4 class="fw-bolder text-uppercase text-end mt-4 mb-2">{{ __('translation.Invoice') }}</h4>
                        <h6 class="text-end mb-5 pb-4">#{{ $order->order_id }}</h6>
                        <p class="text-end mb-1">{{ __('translation.Balance Due') }}</p>
                        <h4 class="text-end fw-normal">${{ $order->total_price }}</h4>
                        <h6 class="mb-0 mt-3 text-end fw-normal mb-2"><span class="text-muted">{{ __('translation.Date Purchased') }} :</span> {{Carbon\Carbon::parse($order->created_at)->format('Y M d, H:i a')  }}</h6>
                        @if($order->shipped_date)
                            <h6 class="mb-0 mt-3 text-end fw-normal mb-2"><span class="text-muted"> {{ __('translation.Shipped Date') }} :</span> {{Carbon\Carbon::parse($order->shipped_date)->format('Y M d, H:i a')  }}</h6>
                        @endif
                    </div>
                </div>

                <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                    <div class="table-responsive w-100">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('translation.Item') }}</th>
                                    <th>{{ __('translation.Name') }}</th>
                                    <th class="text-end">{{ __('translation.Unit Price') }}</th>
                                    <th class="text-end">{{ __('translation.Quantity') }}</th>
                                    <th class="text-end">{{ __('translation.Total Price') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->order_details as $key => $orderdetail)
                                <tr class="text-end">
                                    <td class="text-start">
                                        <div style="width:25px;height:25px;border-radius:5px;background:#eee;margin:10px auto;"></div>
                                    </td>
                                    <td>
                                        <img style="height: 50px;width:50px;" src="{{ $orderdetail->item->image != null ? url('storage/' . $orderdetail->item->image) : url('item.png') }}" />
                                    </td>
                                    <td class="text-start">{{ $orderdetail->item->title[app()->getLocale()] }}</td>
                                    <td>${{ $orderdetail->item->unit_price }}</td>
                                    <td>{{ $orderdetail->quantity }}</td>
                                    <td>${{ $orderdetail->item->total_price }}</td>
                                </tr>
                                @php
                                    $counter++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="signatures container-fluid " style="margin-top:20px;">
                    <br>
                    <hr>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <p style="margin-bottom: 10px;"><strong>Employee</strong></p>
                            <p style="margin-bottom: 10px;">Signature: -----------------------------------</p>
                        </div>
                        <div class="col-6">
                            <p style="margin-bottom: 10px;"><strong>Client</strong></p>
                            <p style="margin-bottom: 10px;">Signature: -----------------------------------</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid w-100 no-print">
        <div class="btn-group float-end mt-4 ms-2" role="group" aria-label="Button group with nested dropdown">
            <div class="btn-group" role="group">
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <a class="dropdown-item" href="#">Customer</a>
                    <a class="dropdown-item" href="#">Admins</a>
                </div>
            </div>
        </div>

        @can('order-send-invoice')
        <div class="btn-group float-end mt-4 ms-2" role="group" aria-label="Button group with nested dropdown">
            <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="send" class="me-3 icon-md"></i>{{ __('translation.Send Invoice') }}
                </button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <button form="sendinvoice" class="dropdown-item" type="submit">{{ __('translation.Customer') }}</button>
                    <form id="sendinvoice" method="post" action="{{ route('admin.orders.sendinvoice') }}" style="display:none;">
                        @csrf
                        <input type="hidden" name="email" value="{{ $order->user->email }}" />
                        <input type="hidden" name="order_id" value="{{ $order->id }}" />
                    </form>
                </div>
            </div>
        </div>
        @endcan

        @can('order-print-invoice')
        <button onclick="window.print();" class="btn btn-outline-primary float-end mt-4 ms-2">
            <i data-feather="printer" class="me-2 icon-md"></i>Print
        </button>
        @endcan
    </div>

    <!-- Include Print.js library -->
    <script src="https://cdn.jsdelivr.net/npm/print-js/dist/print.min.js"></script>

    <!-- Print styles -->
    <style>
        @media print {
            .no-print, .btn, .btn-group, .float-end, .icon-md, .scissors {
                display: none !important;
            }
            body * {
                visibility: hidden;
            }
            .print-content, .print-content * {
                visibility: visible;
            }

            .page-break {
                page-break-before: always;
            }
        }
    </style>



@endsection
