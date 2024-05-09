@extends('layout.adminmaster')

@section('content')
    <div class="col-md-8 ">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title"> Create User</h6>

                <form action="{{ $action }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    {{ csrf_field() }}
                    @if (isset($method))
                        @method('PUT')
                    @endif
                    <div class="row">

                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input autocomplete="off" name="name" type="text" class="form-control"
                                    placeholder="Enter name" value="{{ old('name', $user->name) }}">
                                @error('name')
                                    <div class="mt-1" style="font-size: 12px; color: red; font-weight: bold;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div><!-- Col -->


                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label"> Email</label>
                                <input autocomplete="off" name="email" type="email" class="form-control"
                                    value="{{ old('email', $user->email) }}" placeholder="Enter  Email">
                                @error('email')
                                    <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                        </div><!-- Col -->


                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <input name="phone" autocomplete="off" type="text" class="form-control"
                                    value="{{ old('phone', $user->phone) }}" placeholder="Phone Number">
                                @error('phone')
                                    <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                        </div><!-- Col -->


                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">image </label>
                                <input autocomplete="off" name="image" type="file" class="form-control">
                                @error('image')
                                    <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div id="imagePreview" class="mt-2">
                                @if (isset($method))
                                    <img width="100" height="100" src="{{ $user->image != null ? url('storage/'.$user->image) : url('avatar.png') }}" class="mt-2"/>
                                @endif
                            </div>

                        </div><!-- Col -->


                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.Status') }}</label>
                                <select name="status" class="form-control" id="exampleFormControlSelect2">
                                    <option value="">{{ __('translation.Select') }}</option>
                                    <option value="1" {{ old('status', $user->status) == 1 ? 'selected' : '-' }}>
                                        Active</option>
                                    <option value="0" {{ old('status', $user->status) == 0 ? 'selected' : '-' }}>
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
                                <label class="form-label">Password</label>
                                <input autocomplete="off" value="" name="password" type="password" class="form-control"
                                    placeholder="Password">
                                @error('password')
                                    <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                        </div><!-- Col -->


                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label"> Confirm Password</label>
                                <input value="" autocomplete="off" name="confirmpassword" type="password" class="form-control"
                                    placeholder=" Confirm Password">
                                @error('confirmpassword')
                                    <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                        </div><!-- Col -->


                    </div><!-- Row -->


                    <a href="{{ route('users.index') }}" class="btn btn-light submit"> Back</a>

                    <button type="submit" class="btn btn-primary submit">Confirm</button>
            </div>
        </div>
    </div>
    </form>
    <br>

    <form action="{{ route('AdminUser.ImportUser') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Add Users By Excel
                        {{-- Uncomment the button below if you want to provide a download link for the Excel file --}}
                        {{-- <button onclick="location.href='{{ route('AdminUser.ImportUser') }}'" class="btn btn-primary" style="float: right">Download Excel file</button> --}}
                    </h6>
                    <br>
                    <div class="col-12">
                        <!-- File input with name attribute -->
                        <input type="file" class="form-control" name="user_excel_file" required>
                        <br>
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-dark">Import Users</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
