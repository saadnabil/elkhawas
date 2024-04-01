@extends('admin.layout.index')

@section('content')

<div class="col-md-8 ">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title"> Create User</h6>
          <form action="" method="POST" autocomplete="off" >
            <div class="row">

              <div class="col-sm-4">
                <div class="mb-3">
                  <label class="form-label"> Customer ID</label>
                  <input required autocomplete="off" name="customerId" type="text" class="form-control" placeholder="customer Id">
                </div>
              </div><!-- Col -->


              <div class="col-sm-4">
                <div class="mb-3">
                  <label class="form-label">First Name</label>
                  <input required autocomplete="off" name="firstname" type="text" class="form-control" placeholder="Enter first name">
                </div>
              </div><!-- Col -->


              <div class="col-sm-4">
                <div class="mb-3">
                  <label class="form-label">Last Name</label>
                  <input required autocomplete="off" name="lasetname" type="text" class="form-control" placeholder="Enter last name">
                </div>
              </div><!-- Col -->

              <div class="col-sm-4">
                <div class="mb-3">
                  <label class="form-label"> Email</label>
                  <input autocomplete="off" name="email" type="email" class="form-control" placeholder="Enter  Email">
                </div>
              </div><!-- Col -->


              <div class="col-sm-4">
                <div class="mb-3">
                  <label class="form-label">Phone Number</label>
                  <input required autocomplete="off" name="phone" type="text" class="form-control" placeholder="Phone Number">
                </div>
              </div><!-- Col -->

              <div class="col-sm-4">
                <div class="mb-3">
                  <label class="form-label">Password</label>
                  <input required autocomplete="off" name="password" type="password" class="form-control" placeholder="Password">
                </div>
              </div><!-- Col -->


              <div class="col-sm-4">
                <div class="mb-3">
                  <label class="form-label"> Confirm Password</label>
                  <input required autocomplete="off" name="confirm_password" type="password" class="form-control" placeholder=" Confirm Password">
                </div>
              </div><!-- Col -->


            </div><!-- Row -->


           </form>
           <button type="button" class="btn btn-light submit"> Back</button>

          <button type="button" class="btn btn-primary submit">Confirm</button>
      </div>
    </div>
  </div>

  <form action="" method="POST" enctype="multipart/form-data">

    <div class="col-md-6 ">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Add Users By Excel</h6>
          <hr>
          <div style="float: right; margin-right: 10px">
            <input type="file" class="form-control" >
            <br>
            <button type="button" class="btn btn-dark">Import Users</button>
          </div>
  
        </div>
      </div>
    </div>
  </form>
    
@endsection