@extends('layout.adminmaster')


@section('content')
    <div class="row">
        <div class="col-md-4 ">
            <div class="card">
                <div class="card-body">
                    <h4>
                        <i data-feather="user"></i>
                        Total Users
                    </h4>
                    <br>
                    <strong style="color: green">
                        {{ $totalUser }} Customers</strong>

                </div>
            </div>
        </div>

        <div class="col-md-4 ">
            <div class="card">
                <div class="card-body">
                    <h4>
                        <i data-feather="user"></i>
                        Total Admins
                    </h4>
                    <br>
                    <strong style="color: green">{{ $totalAdmin }} Admins</strong>




                </div>
            </div>
        </div>


        <div class="col-md-4 ">
            <div class="card">
                <div class="card-body">

                    <h4>
                        <i data-feather="shopping-bag"></i>
                        Total Orders
                    </h4>
                    <br>
                    <strong style="color: orange">155 Orders</strong>




                </div>
            </div>
        </div>




        <div class="col-md-4 ">
            <div class="card">
                <div class="card-body">

                    <h4>
                        <i data-feather="dollar-sign"></i>

                        Total Money
                    </h4>
                    <br>
                    <strong style="color: goldenrod">20.500.00 USD</strong>




                </div>
            </div>
        </div>


        <div class="col-md-4 ">
            <div class="card">
                <div class="card-body">
                    <h4> <i data-feather="dollar-sign"></i>
                        Total Money this Mounth</h4>
                    <br>
                    <strong style="color: goldenrod">15.500.00 USD</strong>




                </div>
            </div>
        </div>


        <div class="col-md-4 ">
            <div class="card">
                <div class="card-body">
                    <h4> <i data-feather="dollar-sign"></i>
                        Total Money Last Mounth</h4>
                    <br>
                    <strong style="color: goldenrod"> 12.500.00 USD</strong>


                </div>
            </div>
        </div>



    </div>

    <br>
    <div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline mb-2">
                <h6 class="card-title mb-0">Admin | Employee | Customer</h6>

                <div class="col-4">
                    <div class="form-group">
                        <label for="activeSelect"> Select For Filter:</label>
                        <select class="form-select" aria-label="Default select example" id="activeSelect">
                            <option selected>Select</option>
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="roleSelect">Select For Filter:</label>
                        <select class="form-select" aria-label="Default select example" id="roleSelect">
                            <option selected>Select</option>
                            <option value="admin">Admins</option>
                            <option value="employee">Employee</option>
                            <option value="user">Customers</option>
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th class="pt-0">#</th>
                            <th class="pt-0">Name</th>
                            <th class="pt-0">Email</th>
                            <th class="pt-0">Phone Number</th>
                            <th class="pt-0">Roles</th>
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
                            <td>Admins</td>
                            <td><span class="badge bg-success">active</span></td>
                            <td>01/01/2023</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Ahmed ali</td>
                            <td>ahmed@gmail.com</td>
                            <td>05990942210</td>
                            <td>Employee</td>
                            <td><span class="badge bg-danger">Inactive</span></td>
                            <td>01/01/2023</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Ahmed ali</td>
                            <td>ahmed@gmail.com</td>
                            <td>05990942210</td>
                            <td>Customers</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>01/01/2023</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
