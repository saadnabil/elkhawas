@extends('layout.adminmaster')


@section('content')

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Orders</li>
    </ol>
  </nav>




  <div class="col-md-12 ">
    <div class="card">
      <div class="card-body">

<div style="float: right; ">
            <input class="form-control" type="search" id="myInput" onkeyup="myFunction()" placeholder="Search for anythings.." title="Type in a name" />
          </div>

        
        <h6 class="card-title">All Orders</h6>
                        <p class="text-muted mb-3">Here you can see all orders from the client</p>
                        <div class="table-responsive">
                                <table id="myInput"  class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th># Orders ID </th>
                                            <th>Customer</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th></th>
                                            <th>Total</th>
                                            <th>Date Purchased</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <tr>
                                            <td><button onclick="location.href='{{route('trackdetails')}}'" class="btn btn-primary">OR756374</button></td>
                                            <td>Bassam Elashqar</td>
                                            <td>bassam@bxtra.de</td>
                                            <td>+90 541 4199 888</td>
                                            <th><span class="badge bg-success">Delivered</span></th>
                                            <td></td>
                                            <th>1000 $</th>
                                            <th>Nov 20, 2024</th>
                                        </tr>
                                        <tr>
                                            <td><button onclick="location.href=''" class="btn btn-primary">OR756372</button></td>
                                            <td>Mohammed ali</td>
                                            <td>mohammed@gmail.de</td>
                                            <td>+90 541 4199 888</td>
                                            <td><span class="badge bg-info">Shipped</span></td>
                                            <td>
                                              <div class="spinner-grow text-info" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                              </div>
                                            </td>
                                            <td>1000 $</td>
                                            <td>Nov 20, 2024</td>
                                        </tr>
                                        <tr>
                                            <td><button onclick="location.href=''" class="btn btn-primary">OR756374</button></td>
                                            <td>Bassam Elashqar</td>
                                            <td>bassam@bxtra.de</td>
                                            <td>+90 541 4199 888</td>
                                            <td><span class="badge bg-warning">Pending</span></td>
                                            <td>
                                              <div class="spinner-grow text-warning" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                              </div>
                                            </td>
                                            <td>1000 $</td>
                                            <td>Nov 20, 2024</td>
                                        </tr>
                                        <tr>
                                            <td><button onclick="location.href=''" class="btn btn-primary">OR756372</button></td>
                                            <td>Mohammed ali</td>
                                            <td>mohammed@gmail.de</td>
                                            <td>+90 541 4199 888</td>
                                            <td><span class="badge bg-danger">Cancelled</span></td>
                                            <td></td>
                                            <td>1000 $</td>
                                            <td>Nov 20, 2024</td>
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