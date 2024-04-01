@extends('layout.master')

@section('content')

<div class="row">
    <div class="col-md-4 ">
    <div class="card">
        <div class="card-body">
        <h4>
            <i data-feather="user"></i>
            Total Users</h4>
<br>
          <strong style="color: green">
            15 Customers</strong>

        </div>
      </div>
    </div>

    <div class="col-md-4 ">
        <div class="card">
            <div class="card-body">
                <h4>
                    <i data-feather="user"></i>
                    Total Admins</h4>
<br>
          <strong style="color: green">5 Admins</strong>




            </div>
          </div>
        </div>


        <div class="col-md-4 ">
            <div class="card">
                <div class="card-body">

                    <h4 >
                        <i data-feather="shopping-bag"></i>
                        Total Orders</h4>
                                <br>
                    <strong style="color: orange">155 Orders</strong>




                </div>
              </div>
            </div>




            <div class="col-md-4 ">
                <div class="card">
                    <div class="card-body">

                        <h4 >
                            <i data-feather="dollar-sign"></i>

                            Total Money</h4>
<br>
                        <strong style="color: goldenrod">20.500.00 USD</strong>




                    </div>
                  </div>
                </div>


                <div class="col-md-4 ">
                    <div class="card">
                        <div class="card-body">
                            <h4>  <i data-feather="dollar-sign"></i>
                                Total Money this Mounth</h4>
<br>
                            <strong style="color: goldenrod">15.500.00 USD</strong>




                        </div>
                      </div>
                    </div>


                    <div class="col-md-4 ">
                        <div class="card">
                            <div class="card-body">
                                <h4>  <i data-feather="dollar-sign"></i>
                                    Total Money Last Mounth</h4>
<br>
                                <strong style="color: goldenrod"> 12.500.00 USD</strong>


                            </div>
                          </div>
                        </div>



                    </div>

<br>
                    <div class="col-lg-12 ">
                        <div class="card">
                          <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline mb-2">
                              <h6 class="card-title mb-0">Admin | Employee | Customer</h6>
                              <hr>
                            </div>
                            <div class="table-responsive">
                              <table class="table table-hover mb-0">
                                <thead>
                                  <tr>
                                    <th class="pt-0">#</th>
                                    <th class="pt-0"> Name</th>
                                    <th class="pt-0">Email</th>
                                    <th class="pt-0">Phone Number</th>
                                    <th class="pt-0">Status</th>
                                    <th class="pt-0">Created at</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>1</td>
                                    <td>Mohammed ali</td>
                                    <td>mohammed@gmail.com</td>
                                    <td>05990942210</td>
                                    <td><span class="badge bg-success">active</span></td>
                                    <td>01/01/2023</td>
                                  </tr>
                                  <tr>
                                    <td>2</td>
                                    <td>ahmed ali</td>
                                    <td>mohammed@gmail.com</td>
                                    <td>05990942210</td>
                                    <td><span class="badge bg-danger">Inactive</span></td>
                                    <td>01/01/2023</td>
                                  </tr>

                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>



@endsection
