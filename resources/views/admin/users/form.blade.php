@extends('layout.adminmaster')

@section('content')
    <div class="col-md-8 ">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title"> Create User</h6>

                @if ($errors->any())
                    <div>
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <form action="{{ $action }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    {{ csrf_field() }}
                    @if (isset($method))
                        @method('PUT')
                    @endif
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label"> Customer ID</label>
                                <input autocomplete="off" value="{{ old('usercode', $users->usercode) }}" name="usercode"
                                    type="number" class="form-control" placeholder="customer Id">
                            </div>
                        </div><!-- Col -->


                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input autocomplete="off" name="name" type="text" class="form-control"
                                    placeholder="Enter name" value="{{ old('name', $users->name) }}">
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
                                    value="{{ old('email', $users->email) }}" placeholder="Enter  Email">
                            </div>
                        </div><!-- Col -->


                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <input name="phone" autocomplete="off" type="text" class="form-control"
                                    value="{{ old('phone', $users->phone) }}" placeholder="Phone Number">
                            </div>
                        </div><!-- Col -->


                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">image </label>
                                <input autocomplete="off" name="image" type="file" class="form-control">
                            </div>
                            @if (isset($method))
                                <img src="{{ asset('images/' . old('image', $users->image)) }}" width="80"
                                    height="80" />
                            @endif

                        </div><!-- Col -->


                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">status</label>
                                <select name="status" class="form-control" id="exampleFormControlSelect2">
                                    <option value="" {{ old('status', $users->status) == '' ? 'selected' : '-' }}>
                                        select</option>
                                    <option value="1" {{ old('status', $users->status) == '1' ? 'selected' : '-' }}>
                                        Active</option>
                                    <option value="2" {{ old('status', $users->status) == '2' ? 'selected' : '-' }}>
                                        Inactive</option>
                                </select>
                            </div>
                        </div><!-- Col -->




                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input autocomplete="off" name="password" type="password" class="form-control"
                                    placeholder="Password">
                            </div>
                        </div><!-- Col -->


                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label"> Confirm Password</label>
                                <input autocomplete="off" name="confirmpassword" type="password" class="form-control"
                                    placeholder=" Confirm Password">
                            </div>
                        </div><!-- Col -->


                    </div><!-- Row -->



                    <button onclick="location.href='{{ route('users.index') }}'" type="button"
                        class="btn btn-light submit"> Back</button>

                    <button type="submit" class="btn btn-primary submit">Confirm</button>
            </div>
        </div>
    </div>
    </form>
    <br>

    <form action="" method="POST" enctype="multipart/form-data">

        <div class="col-md-6 ">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Add Users By Excel
                        <button class="btn btn-primary" style="float: right">Download Excel file </button>
                    </h6>
                    <br>
                    <div class="col-12">
                        <input type="file" class="form-control">
                        <br>
                        <button type="button" class="btn btn-dark">Import Users</button>
                    </div>


                </div>
            </div>
        </div>
    </form>
@endsection
