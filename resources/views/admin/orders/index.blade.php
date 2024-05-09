@php
    $backgrounds = [
        'delivered' => '#d9f2f2',
        'shipped' => '#cfe8da',
        'pending' => '#fcdfa8',
        'canceled' => '#f5b6c6',
    ];
@endphp
@extends('layout.adminmaster')
@push('style')
    <style>
        .act {
            border: 2px solid #000;
        }
    </style>
@endpush
@section('content')

    <div class="col-md-12 ">

        <div class="card">
        
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div style="float: right; margin-right: 10px">
                        <button type="button" class="btn btn-inverse-secondary">
                            <img width="20" height="20" src="{{ asset('assets/excel.png') }}" />
                            Export Orders</button>
                    </div>
                </form>
                <h6 class="card-title">{{ __('translation.Orders') }}</h6>
                <p class="text-muted mb-3">{{ __('translation.Here you can see all your orders in the table.') }}</p>
                <div class="table-responsive">
                    <div class="mb-3">
                        <a href="{{ route('admin.orders.index') }}" style ="background-color: #ffffff"
                            class="btn btn-light {{ $status == 'all' ? 'act' : '' }}">All</a>
                        <a href="{{ route('admin.orders.index', ['status' => 'pending']) }}"
                            style ="background-color:#fcdfa8"
                            class="btn  {{ $status == 'pending' ? 'act' : '' }} ">Pending</a>
                        <a href="{{ route('admin.orders.index', ['status' => 'delivered']) }}"
                            style ="background-color: #d9f2f2"
                            class="btn  {{ $status == 'delivered' ? 'act' : '' }}">Deliverd</a>
                        <a href="{{ route('admin.orders.index', ['status' => 'shipped']) }}"
                            style ="background-color: #cfe8da"
                            class="btn  {{ $status == 'shipped' ? 'act' : '' }}">Shipped</a>
                        <a href="{{ route('admin.orders.index', ['status' => 'canceled']) }}"
                            style ="background-color: #f5b6c6"
                            class="btn  {{ $status == 'canceled' ? 'act' : '' }}">Canceled</a>
                    </div>
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>#{{ __('translation.ID') }}</th>
                                <th>#{{ __('translation.Order Code') }}</th>
                                <th>{{ __('translation.Customer') }}</th>
                                <th>{{ __('translation.Phone') }}</th>
                                <th>{{ __('translation.Status') }}</th>
                                <th></th>
                                <th>{{ __('translation.Total Price') }}</th>
                                <th>{{ __('translation.Date Purchased') }}</th>
                                <th>{{ __('translation.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $key => $order)
                                <tr style="background-color: {{ $backgrounds[$order->status] }}">
                                    <td>#{{ $order->id }}</td>
                                    <td>{{ $order->order_id }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->user->phone }}</td>
                                    <td>
                                        @if ($order->status == 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($order->status == 'shipped')
                                            <span class="badge bg-success">Shipped</span>
                                        @elseif($order->status == 'delivered')
                                            <span class="badge bg-info">Delivered</span>
                                        @elseif ($order->status == 'canceled')
                                            <span class="badge bg-danger">Cancelled</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($order->status == 'pending')
                                            <div class="spinner-grow text-warning" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        @elseif($order->status == 'delivered')
                                            <div class="spinner-grow text-info" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{ $order->total_price }} $</td>
                                    <td>{{ $order->created_at->diffForHumans() ?? '-' }}</td>
                                    {{--  <td>{{ Carbon\Carbon::parse($order->created_at)->format('Y m d, H:i a') }}</td>  --}}

                                    <td>
                                        @can('order-show')
                                        <a  title="{{ __('translation.Show') }}" style="background:#fff;" href="{{ route('admin.orders.show', $order) }}"
                                            type="button" class="btn  btn-icon btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        @endcan
                                        @can('order-track')
                                        <a title="{{ __('translation.Tracking Order') }}" style="background:#fff;" href="{{ route('admin.orders.trackorderdetails', $order) }}"
                                            type="button" class="btn  btn-icon btn-sm">
                                            <i class="fas fa-map-marked-alt"></i>
                                        </a>
                                        @endcan
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
