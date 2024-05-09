@extends('layout.adminmaster')
@section('content')


<div class="col-md-12 ">
    <div class="card">
        <div class="card-body">

            @can('admin-create')
            <div style="float: right">
                <a href="{{ route('admins.create') }}" type="button" class="btn btn-inverse-primary">
                    <i data-feather="plus"></i>
                    {{ __('translation.Add') }}</a>
            </div>
            @endcan

            @can('admin-export')
            <form action="" method="POST" enctype="multipart/form-data">
                <div style="float: right; margin-right: 10px">
                    <button type="button" class="btn btn-inverse-secondary">
                        <img width="20" height="20" src="{{ asset('assets/excel.png') }}" />
                        Export admins</button>
                </div>
            </form>
            @endcan

            <h6 class="card-title">{{ __('translation.Admins') }}</h6>
            <p class="text-muted mb-3">{{ __('translation.Here you can see all your admins in the table.') }}</p>

            <div class="table-responsive">
                <table id="dataTableExample" class="table">
                    <thead>
                        <tr>
                            <th>{{ __('translation.Admins') }}</th>
                            <th>{{ __('translation.Name') }}</th>
                            <th>{{ __('translation.Email') }}</th>
                            <th>{{ __('translation.Phone') }}</th>
                            <th>{{ __('translation.Status') }}</th>
                            <th>{{ __('translation.Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                            <tr>

                                <td>
                                    <img data-bs-toggle="modal" data-bs-target="#exampleModal-{{$admin->id }}"
                                        style="height: 50px;width:50px;"
                                        src="{{$admin->image != null ? url('storage/' .$admin->image) : url('item.png') }}" />

                                    {{$admin->name }}
                                </td>

                                <td>{{ $admin->name}}</td>
                                <td>{{ $admin->email}}</td>
                                <td>{{ $admin->phone}}</td>
                                <td>
                                    @if($admin->status == 0)
                                        <span class="badge bg-warning">Not Active</span>
                                    @elseif($admin->status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @endif
                                </td>
                                <td>
                                    @can('admin-edit')
                                    <a href="{{ route('admins.edit', $admin) }}" type="button"
                                        class="btn btn-white btn-icon">
                                        <i data-feather="check-square"></i>
                                    </a>
                                    @endcan
                                    @can('admin-delete')
                                    <a onclick="" class="btn btn-white btn-icon confirm-delete">
                                        <i data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('admins.destroy', $admin) }}" method="POST">
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
