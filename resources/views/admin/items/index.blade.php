@extends('layout.adminmaster')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">{{__('translation.Dashboard')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('translation.All Items')}}</li>
        </ol>
    </nav>

    <div class="col-md-12 ">
        <div class="card">
            <div class="card-body">

                @can('item-create')
                <div style="float: right">
                    <a href="{{ route('admin.items.create') }}" type="button" class="btn btn-inverse-primary">
                        <i data-feather="plus"></i>
                        {{__('translation.Add')}}</a>
                </div>
                @endcan

                @can('item-export')
                <form action="" method="POST" enctype="multipart/form-data">
                    <div style="float: right; margin-right: 10px">
                        <a href="{{route('admin.items.export')}}"
                        type="button" class="btn btn-inverse-secondary">{{__('translation.Export')}}</a>
                    </div>
                </form>
                @endcan

                <h6 class="card-title">{{ __('translation.Items') }}</h6>
                <p class="text-muted mb-3">{{ __('translation.Here you can see all your items in the table.') }}</p>

                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>{{ __('translation.Items') }}</th>
                                <th>{{ __('translation.Type') }}</th>
                                <th>{{ __('translation.Unit') }}</th>
                                <th>{{ __('translation.Unit Price') }}</th>
                                <th>{{ __('translation.Pieces') }}</th>
                                <th>{{ __('translation.Total Price') }}</th>
                                <th>{{ __('translation.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $key => $item)
                                <tr>
                                    <td>
                                        <img data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $item->id }}"
                                            style="height: 40px;width:40px;"
                                            src="{{ $item->image != null ? url('storage/' . $item->image) : url('item.png') }}" />

                                        {{ $item->title[app()->getLocale()] }}
                                    </td>

                                    <td>{{ $item->type->title[app()->getLocale()]}}</td>
                                    <td>{{ $item->unit[app()->getLocale()] }}</td>
                                    <td>{{ $item->unit_price }} $</td>
                                    <td>{{ $item->units_number }}</td>
                                    <td style="color: goldenrod;">   €{{ number_format( $item->total_price, 2, ',', '.') }}</td>
                                    <td>
                                        @can('item-edit')
                                            <a href="{{ route('admin.items.edit', $item) }}" type="button"
                                                class="btn btn-white btn-icon">
                                                <i data-feather="check-square"></i>
                                            </a>
                                        @endcan

                                        @can('item-destroy')
                                            <a onclick="" class="btn btn-white btn-icon confirm-delete">
                                                <i data-feather="trash-2"></i>
                                            </a>
                                            <form action="{{ route('admin.items.destroy', $item) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        @endcan
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    {{ $item->title[app()->getLocale()] }} </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img width="100%" height="100%" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal"
                                                    src="{{ $item->image != null ? url('storage/' . $item->image) : url('item.png') }}" />

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
