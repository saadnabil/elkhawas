@extends('layout.adminmaster')
@section('content')


<div class="col-md-12 ">
    <div class="card">
        <div class="card-body">

            @can('role-create')
            <div style="float: right">
                <a href="{{ route('roles.create') }}" type="button" class="btn btn-inverse-primary">
                    <i data-feather="plus"></i>
                    Add Role</a>
            </div>
            @endcan

            @can('role-export')
            <form action="" method="POST" enctype="multipart/form-data">
                <div style="float: right; margin-right: 10px">
                    <button type="button" class="btn btn-inverse-secondary">
                        <img width="20" height="20" src="{{ asset('assets/excel.png') }}" />
                        Export Roles</button>
                </div>
            </form>
            @endcan

            <h6 class="card-title">{{ __('translation.Roles') }}</h6>
            <p class="text-muted mb-3">{{ __('translation.Here you can see all your orders in the table.') }}</p>
            <div class="table-responsive">
                <table id="dataTableExample" class="table">
                    <thead>
                        <tr>
                            <th>{{ __('translation.Role') }}</th>
                            <th>{{ __('translation.Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rows as $row)
                            <tr>
                                <td>{{ $row->name}}</td>
                                <td>
                                    @can('role-edit')
                                        <a href="{{ route('roles.edit', $row) }}" type="button"
                                            class="btn btn-white btn-icon">
                                            <i data-feather="check-square"></i>
                                        </a>
                                    @endcan
                                    @can('role-delete')
                                        <a onclick="" class="btn btn-white btn-icon confirm-delete">
                                            <i data-feather="trash-2"></i>
                                        </a>
                                        <form action="{{ route('roles.destroy', $row) }}" method="POST">
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
