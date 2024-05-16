@extends('layout.adminmaster')
@section('content')


<div class="col-md-12 ">
    <div class="card">
        <div class="card-body">

            @can('coupon-create')
            <div style="float: right">
                <a href="{{ route('admin.coupons.create') }}" type="button" class="btn btn-inverse-primary">
                    <i data-feather="plus"></i>
                    {{ __('translation.Add') }}</a>
            </div>
            @endcan

            @can('coupon-export')
            {{--  <form action="" method="POST" enctype="multipart/form-data">
                <div style="float: right; margin-right: 10px">
                    <button type="button" class="btn btn-inverse-secondary">
                        <img width="20" height="20" src="{{ asset('assets/excel.png') }}" />
                        Export admins</button>
                </div>
            </form>  --}}
            @endcan

            <h6 class="card-title">{{ __('translation.Coupons') }}</h6>
            <p class="text-muted mb-3">{{ __('translation.Here you can see all your coupons in the table.') }}</p>
            <div class="table-responsive">
                <table id="dataTableExample" class="table">
                    <thead>
                        <tr>
                            <th>{{ __('translation.Code') }}</th>
                            <th>{{ __('translation.Description') }}</th>
                            <th>{{ __('translation.Discount') }}</th>
                            <th>{{ __('translation.Quantity') }}</th>
                            <th>{{ __('translation.Used Quantity') }}</th>
                            <th>{{ __('translation.Valid From') }}</th>
                            <th>{{ __('translation.Valid To') }}</th>
                            <th>{{ __('translation.Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupons as $coupon)
                            <tr>
                            <td>{{ $coupon->code}}</td>
                            <td>{{ $coupon->description}}</td>
                            <td>{{ $coupon->discount}}</td>
                            <td>{{ $coupon->quantity}}</td>
                            <td>{{ $coupon->used_quantity}}</td>
                            <td>{{ $coupon-> valid_from}}</td>
                            <td>{{ $coupon-> valid_to}}</td>
                            <td>
                                @can('coupon-edit')
                                    <a href="{{ route('admin.coupons.edit', $coupon) }}" type="button"
                                        class="btn btn-white btn-icon">
                                        <i data-feather="check-square"></i>
                                    </a>
                                @endcan
                                @can('coupon-delete')
                                    <a onclick="" class="btn btn-white btn-icon confirm-delete">
                                        <i data-feather="trash-2"></i>
                                    </a>
                                <form action="{{ route('admin.coupons.destroy', $coupon) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                </form>
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
