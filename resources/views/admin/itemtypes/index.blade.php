@extends('layout.adminmaster')
@section('content')


<div class="col-md-12 ">
    <div class="card">
        <div class="card-body">

            @can('item-type-create')
            <div style="float: right">
                <a href="{{ route('itemtypes.create') }}" type="button" class="btn btn-inverse-primary">
                    <i data-feather="plus"></i>
                    {{ __('translation.Add') }}</a>
            </div>
            @endcan

            @can('item-type-export')
            {{--  <form action="" method="POST" enctype="multipart/form-data">
                <div style="float: right; margin-right: 10px">
                    <button type="button" class="btn btn-inverse-secondary">
                        <img width="20" height="20" src="{{ asset('assets/excel.png') }}" />
                        Export admins</button>
                </div>
            </form>  --}}
            @endcan

            <h6 class="card-title">{{ __('translation.Item types') }}</h6>
            <p class="text-muted mb-3">{{ __('translation.Here you can see all your item types in the table.') }}</p>
            <div class="table-responsive">
                <table id="dataTableExample" class="table">
                    <thead>
                        <tr>
                            <th>{{ __('translation.Title') }}</th>
                            <th>{{ __('translation.Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($itemtypes as $itemtype)
                            <tr>
                            <td>{{ $itemtype->title[app()->getLocale()]}}</td>
                            <td>
                                @can('item-type-edit')
                                <a href="{{ route('itemtypes.edit', $itemtype) }}" type="button"
                                    class="btn btn-white btn-icon">
                                    <i data-feather="check-square"></i>
                                </a>
                                @endcan
                                @can('item-type-delete')
                                <a onclick="" class="btn btn-white btn-icon confirm-delete">
                                    <i data-feather="trash-2"></i>
                                </a>
                                <form action="{{ route('itemtypes.destroy', $itemtype) }}" method="POST">
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
