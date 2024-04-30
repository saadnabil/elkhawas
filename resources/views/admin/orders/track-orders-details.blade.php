@extends('layout.adminmaster')

@section('content')
    @php
        $status_arr = [
            'pending' => 'text-warning',
            'canceled' => 'text-danger',
            'delivered' => 'text-success',
        ];
    @endphp
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header pt-3">
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            <h1 class="h5 mb-3">{{ __('translation.Shipping Address') }}</h1>
                            <address>
                                <strong>{{ $order->address->address }}</strong><br>
                                {{ $order->address->city }},<br>
                                {{ $order->address->state }}<br>
                                {{ __('translation.Phone') }}: {{ $order->user->phone }}<br>
                                {{ __('translation.Email') }}: {{ $order->user->email }}
                            </address>
                        </div>

                        <div class="col-sm-4 invoice-col">
                            <b>{{ __('translation.Invoice') }} #{{ $order->order_id }}</b><br>
                            <br>
                            <b>{{ __('translation.Order ID') }}:</b> {{ $order->order_id }}<br>
                            <b>{{ __('translation.Total') }}:</b> ${{ $order->total_price }}<br>
                            <b>{{ __('translation.Status') }}:</b> <span
                                class="{{ isset($status_arr[$order->status]) ? $status_arr[$order->status] : 'text-success' }}">{{ $order->status }}</span>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th width="100">{{ __('translation.Unit Price') }}</th>
                                <th width="100">{{ __('translation.Price') }}</th>
                                <th width="100">{{ __('translation.Quantity') }}</th>
                                <th width="100">{{ __('translation.Total') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->order_details as $orderdetail)
                                <tr>
                                    <td>{{ $orderdetail->item->title[app()->getLocale()] }}</td>
                                    <td>${{ $orderdetail->item->unit_price }}</td>
                                    <td>${{ $orderdetail->item->total_price }}</td>
                                    <td>{{ $orderdetail->quantity }}</td>
                                    <td>${{ $orderdetail->total_price }}</td>
                                </tr>
                            @endforeach

                            <tr>
                                <th colspan="4" class="text-right">{{ __('translation.Sub Total') }}:</th>
                                <td>${{ $order->subtotal }}</td>
                            </tr>
                            @if ($order->coupon)
                                <tr>
                                    <th colspan="4" class="text-right">{{ __('translation.Discount') }}:</th>
                                    <td>${{ $order->coupon->discount }}</td>
                                </tr>
                            @endif
                            <tr>
                                <th colspan="4" class="text-right">{{ __('translation.Grand Total') }}:</th>
                                <td>${{ $order->total_price }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h2 class="h4 mb-3">{{ __('translation.Order Status') }}</h2>
                    <form method="post" action="{{ route('admin.orders.updatestatus') }}">
                        @csrf
                        <input type="hidden" name="order_id" value="{{ $order->id }}"/>
                        <div class="mb-3">
                            <select name="status" id="status" class="form-control">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                            @error('status')
                                <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                    {{ $message }}</div>
                            @enderror
                        </div>
                        @php
                            $statusdates = [
                                'pending' => $order->pending_date,
                                'shipped' => $order->pending_date,
                                'delivered' => $order->pending_date,
                                'canceled' => $order->canceled_date,
                            ];
                        @endphp
                        <input type="date" name="date" value="{{ $statusdates[$order->status] }}" class="form-control"/>
                        @error('date')
                            <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                {{ $message }}</div>
                        @enderror
                        <br>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">{{ __('translation.Update') }}</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h2 class="h4 mb-3">{{ __('translation.Send Inovice Email') }}</h2>
                    <div class="btn-group mt-4 ms-2" role="group" aria-label="Button group with nested dropdown">
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="send" class="me-3 icon-md"></i>{{ __('translation.Send Invoice') }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <button form="sendinvoice" class="dropdown-item"
                                    type="submit">{{ __('translation.Customer') }}</button>
                                <form id="sendinvoice" method="post" action="{{ route('admin.orders.sendinvoice') }}"
                                    style="display:none;">
                                    @csrf
                                    <input type="hidden" name="email" value="{{ $order->user->email }}" />
                                    <input type="hidden" name="order_id" value="{{ $order->id }}" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
