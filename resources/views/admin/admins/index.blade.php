@extends('layout.adminmaster')
@section('content')


<div class="col-md-12 ">
    <div class="card">
        <div class="card-body">

            <div style="float: right">
                <a href="{{ route('admins.create') }}" type="button" class="btn btn-inverse-primary">
                    <i data-feather="plus"></i>
                    {{ __('translation.Add') }}</a>
            </div>

            

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
                                    <a href="{{ route('admins.edit', $admin) }}" type="button"
                                        class="btn btn-white btn-icon">
                                        <i data-feather="check-square"></i>
                                    </a>
                                    <a onclick="" class="btn btn-white btn-icon confirm-delete">
                                        <i data-feather="trash-2"></i>
                                    </a>
                                    <form action="{{ route('admins.destroy', $admin) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    {{--  <!--begin::Content-->
    <div class="card card-flush">
        <!--begin::Card header-->
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-4">
                        <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                            <path
                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                fill="currentColor"></path>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" data-kt-ecommerce-category-filter="search"
                        class="form-control form-control-solid w-250px ps-14" placeholder="{{ __('Search') }}">
                </div>
                <!--end::Search-->
            </div>
            <!--end::Card title-->
            @can('role-create')
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Add customer-->
                <a href="{{ route('role.create') }}" class="btn btn-primary">{{ __('Create') }}</a>
                <!--end::Add customer-->
            </div>
            <!--end::Card toolbar-->
            @endcan
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-250px">{{ __('Role') }}</th>
                        <th class="text-end min-w-70px">{{ __('Actions') }}</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="fw-semibold text-gray-600">
                    @foreach ($admins as $admin)
                        <!--begin::Table row-->
                        <tr>
                            <td>
                                {{ $admin -> name }}
                            </td>
                            <!--begin::Action=-->
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">{{ __('Actions') }}
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                    <span class="svg-icon svg-icon-5 m-0">
                                        <svg width="24" height="24" viewbox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="{{ route('roles.edit', $admin) }}" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3 confirm-delete"
                                            data-kt-ecommerce-category-filter="delete_row">Delete</a>
                                        <form method="POST" action="{{ route('roles.destroy', $admin) }}">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                            <!--end::Action=-->
                        </tr>
                        <!--end::Table row-->
                    @endforeach

                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>  --}}
@endsection
