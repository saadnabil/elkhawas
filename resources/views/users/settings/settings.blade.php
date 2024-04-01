@extends('admin.layout.index')

@section('content')
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

        <h6 class="card-title">Change Password</h6>

        <form class="forms-sample">

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Password">
          </div>

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">New assword</label>
            <input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="New Password">
          </div>

          <button type="submit" class="btn btn-primary me-2">Submit</button>
          <button class="btn btn-secondary">Cancel</button>
        </form>

      </div>
    </div>
  </div>
@endsection
