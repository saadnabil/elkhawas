@extends('admin.layout.index')


@section('content')

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Users</li>
    </ol>
  </nav>




  <div class="col-md-12 ">
    <div class="card">
      <div class="card-body">

        <div style="float: right">
            <button onclick="location.href='/admin/users/add'" type="button" class="btn btn-inverse-primary">Add User</button>
          </div>

          <form action="" method="POST" enctype="multipart/form-data">
            <div style="float: right; margin-right: 10px">
              <button type="button" class="btn btn-inverse-secondary">Export Users</button>
            </div>
          </form>

          <div style="float: right; margin-inline: 10px">
            <input class="form-control" type="search" id="myInput" onkeyup="myFunction()" placeholder="Search for anythings.." title="Type in a name" />
          </div>

         

                        <h6 class="card-title">All Users</h6>
                        <p class="text-muted mb-3">Here you can see all Users </p>
                        <div class="table-responsive">
                                <table id="myInput" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID </th>
                                            <th style="color: goldenrod;">Customer ID</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <tr>
                                            <td>1</td>
                                            <td>131313123</td>
                                            <td>Bassam Elashqar</td>
                                             <td>+90 541 4199 888</td>
                                            <td>Admin</td>
                                            <th><span class="badge bg-success">Active</span></th>
                                            <td>
                                            
                                                <button onclick="location.href='/admin/users/edit'" type="button" class="btn btn-warning btn-icon">
                                                  <i data-feather="check-square"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-icon">
                                                  <i data-feather="trash-2"></i>
                                                </button>
                                              
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>131313123</td>
                                            <td> Mohammed</td>
                                            <td>+90 541 4199 888</td>
                                            <td>Employee</td>
                                            <th><span class="badge bg-danger">InActive</span></th>
                                            <td>
                                            
                                                <button type="button" class="btn btn-warning btn-icon">
                                                  <i data-feather="check-square"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-icon">
                                                  <i data-feather="trash-2"></i>
                                                </button>
                                             
                                            </td>
                                        </tr>
                                        <td>3</td>
                                        <td>131313123</td>
                                        <td> Ahmed ali</td>
                                        <td>+90 541 4199 888</td>
                                            <td>Customer</td>
                                        <th><span class="badge bg-success">Active</span></th>
                                        <td>
                                        
                                            <button type="button" class="btn btn-warning btn-icon">
                                              <i data-feather="check-square"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-icon">
                                              <i data-feather="trash-2"></i>
                                            </button>
                                         
                                        </td>
                                        <tr>
                                            <td>4</td>
                                            <td>131313123</td>
                                            <td>Abdullah </td>
                                            <td>+90 541 4199 888</td>
                                            <td>Customer</td>
                                            <th><span class="badge bg-success">Active</span></th>
                                            <td>
                                            
                                                <button type="button" class="btn btn-warning btn-icon">
                                                  <i data-feather="check-square"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-icon">
                                                  <i data-feather="trash-2"></i>
                                                </button>
                                             
                                            </td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                        </div>
      </div>
    </div>
            </div>





            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

    
@endsection