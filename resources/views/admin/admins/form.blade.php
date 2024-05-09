@extends('layout.adminmaster')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">{{ __('translation.Create admin') }}</h6>
                <form action="{{ $action }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if (isset($method))
                        @method('PUT')
                    @endif
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.Name') }}</label>
                                <input required autocomplete="off" name="name" value="{{ old('name', $admin->name) }}"
                                    type="text" class="form-control" placeholder="Enter Name">
                                @error('name')
                                    <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.Email') }}</label>
                                <input required autocomplete="off" name="email" value="{{ old('email', $admin->email) }}"
                                    type="email" class="form-control" placeholder="Enter Email">
                                @error('email')
                                    <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.Phone') }}</label>
                                <input required autocomplete="off" name="phone" value="{{ old('phone', $admin->phone) }}"
                                    type="phone" class="form-control" placeholder="Enter Phone">
                                @error('phone')
                                    <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.Password') }}</label>
                                <input autocomplete="new-password" name="password" value=""
                                    type="password" class="form-control" placeholder="Enter Email">
                                @error('password')
                                    <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.Repassword') }}</label>
                                <input autocomplete="new-password" name="repassword" value=""
                                    type="password" class="form-control" placeholder="Repassword">
                                @error('repassword')
                                    <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.Role') }}</label>
                                <select class="form-control" name="role">
                                    <option>Select Role</option>
                                    @foreach ($roles as $role)
                                        <option {{ $admin->hasAnyRole($role->name) ?'selected' : '' }} value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.Status') }}</label>
                                <select name="status" class="form-control" id="exampleFormControlSelect2">
                                    <option value="">{{ __('translation.Select') }}</option>
                                    <option value="1" {{ old('status', $admin->status) == 1 ? 'selected' : '-' }}>
                                        Active</option>
                                    <option value="0" {{ old('status', $admin->status) == 0 ? 'selected' : '-' }}>
                                        Inactive</option>
                                </select>
                                @error('status')
                                    <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.Image') }}</label>
                                <input name="image" id="imageInput" type="file" class="form-control">
                                @error('image')
                                    <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div id="imagePreview" class="mt-2">
                                @if (isset($method))
                                    <img width="100" height="100" src="{{ $admin->image != null ? url('storage/'.$admin->image) : url('avatar.png') }}" class="mt-2"/>
                                @endif
                            </div>
                        </div><!-- Col -->



                    </div>
                    <div class="mt-3">
                        <a href="{{ route('admins.index') }}" type="button" class="btn btn-light submit">
                            {{ __('translation.Back') }}</a>
                        <button type="submit" class="btn btn-primary">{{ __('translation.Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
        <br>
    </div>
@endsection


