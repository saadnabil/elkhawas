@extends('admin.layout.index')

@section('content')




<div class="col-md-8 ">
    <div class="card">
      <div class="card-body">

        <h6 class="card-title">Contact us Settings</h6>

        <form class="forms-sample">
            <div class="row">
            <div class="col-sm-4">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Phone">
          </div>
            </div>

            <div class="col-sm-4">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
          </div>
            </div>


            <div class="col-sm-4">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Company Name</label>
            <input type="text" name="companyName" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Company Name">
          </div>
            </div>

            <div class="col-sm-4">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Address">
          </div>
            </div>



            <div class="col-sm-4">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Street</label>
            <input type="text" name="street" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Street">
          </div>
            </div>



            <div class="col-sm-4">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Zip Code</label>
            <input type="text" name="zip" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Zip Code">
          </div>
            </div>


            <div class="col-sm-4">
          <div class="mb-3">
            <label for="exampleInputUsername1" class="form-label">Url Link</label>
            <input type="text" name="url_link" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Url Link">
          </div>
            </div>



         
          
            </div>
        </form>
        <button type="submit" class="btn btn-primary me-2">Submit</button>
        <button class="btn btn-secondary">Cancel</button>
      </div>
    </div>
  </div>
    
@endsection