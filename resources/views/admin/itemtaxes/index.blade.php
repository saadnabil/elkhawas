@extends('layout.adminmaster')
@section('content')

<div class="col-md-12 ">
    <div class="card">
        <div class="card-body">

            @can('item-tax-create')
            <div style="float: right">
                <a href="{{ route('itemtaxes.create') }}" type="button" class="btn btn-inverse-primary">
                    <i data-feather="plus"></i>
                    {{ __('translation.Add') }}</a>
            </div>
            @endcan

            @can('item-tax-export')
            {{--  <form action="" method="POST" enctype="multipart/form-data">
                <div style="float: right; margin-right: 10px">
                    <button type="button" class="btn btn-inverse-secondary">
                        <img width="20" height="20" src="{{ asset('assets/excel.png') }}" />
                        Export admins</button>
                </div>
            </form>  --}}
            @endcan

            <h6 class="card-title">{{ __('translation.Item taxes') }}</h6>
            <p class="text-muted mb-3">{{ __('translation.Here you can see all your item taxes in the table.') }}</p>
            <div class="table-responsive">
                <table id="dataTableExample" class="table">
                    <thead>
                        <tr>
                            <th>{{ __('translation.Tax') }}</th>
                            <th>{{ __('translation.Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($itemtaxes as $itemtax)
                            <tr>
                            <td>{{ $itemtax->tax}} %</td>
                            <td>
                                @can('item-tax-edit')
                                <a href="{{ route('itemtaxes.edit', $itemtax) }}" type="button"
                                    class="btn btn-white btn-icon">
                                    <i data-feather="check-square"></i>
                                </a>
                                @endcan
                                @can('item-tax-delete')
                                <a onclick="" class="btn btn-white btn-icon confirm-delete">
                                    <i data-feather="trash-2"></i>
                                </a>
                                <form action="{{ route('itemtaxes.destroy', $itemtax) }}" method="POST">
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
