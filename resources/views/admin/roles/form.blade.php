@extends('layout.adminmaster')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Create Roles</h6>
                <form action="{{ $action }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if (isset($method))
                        @method('PUT')
                    @endif
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.Role') }}</label>
                                <input required autocomplete="off" name="name" value="{{ old('name', $role->name) }}"
                                    type="text" class="form-control" placeholder="Enter Role Name">
                                @error('name')
                                    <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <!--Start::buttons -->
                            <div class="mb-5">
                                <button class="btn  btn-primary btn-sm checkall">{{ __('Check all') }}</button>
                                <button class="btn  btn-light btn-sm uncheckall">{{ __('Un check all') }}</button>
                            </div>
                            <!--Start::buttons -->
                            <div class="col-md-12">
                                <div class="row">
                                    @foreach ($permissions as $permission)
                                        <div class="col-md-3">
                                            <input  name="permission[]" value="{{ $permission->name }}" multiple
                                             {{ $role->hasAnyPermission($permission->name) ? 'checked' : '' }}
                                                id="permission{{ $permission->id }}"
                                                style="margin-right:10px;display:inline-block;" type="checkbox" />
                                            <!--begin::Label-->
                                            <label style="cursor:pointer;" for="permission{{ $permission->id }}"
                                                class=" form-label">{{ $permission->name }}</label>
                                            <!--end::Label-->
                                        </div>
                                    @endforeach
                                    @error('permission')
                                    <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                        {{ $message }}</div>
                                @enderror
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-4 mt-3">
                            <a href="{{ route('roles.index') }}" type="button" class="btn btn-light submit">
                                {{ __('translation.Back') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('translation.Save') }}</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <br>
    </div>
@endsection

@push('script')
    <script>
        $(".checkall").click(function(e){
            e.preventDefault();
            $("input[type=checkbox]").prop('checked', true);
        });
        $(".uncheckall").click(function(e){
            e.preventDefault();
            $("input[type=checkbox]").prop('checked', false);
        });
    </script>
@endpush
