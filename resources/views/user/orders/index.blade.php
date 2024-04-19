@extends('users.layout.index')


@section('content')

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Orders</li>
    </ol>
  </nav>



  <!-- ul tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="icon-tab-0" data-bs-toggle="tab" href="#icon-tabpanel-0" role="tab" aria-controls="icon-tabpanel-0" aria-selected="true"> All Order</a>
    </li>
    <li class="nav-item" role="presentation">
      <a style="background: rgb(252, 223, 168);" class="nav-link" id="icon-tab-1" data-bs-toggle="tab" href="#icon-tabpanel-1" role="tab" aria-controls="icon-tabpanel-1" aria-selected="false"> Pending</a>
    </li>
    <li class="nav-item" role="presentation">
      <a style="background: #d9f2f2;" class="nav-link" id="icon-tab-2" data-bs-toggle="tab" href="#icon-tabpanel-2" role="tab" aria-controls="icon-tabpanel-2" aria-selected="false"> Delivered </a>
    </li>

    <li class="nav-item" role="presentation">
      <a style="background: #cfe8da;" class="nav-link" id="icon-tab-3" data-bs-toggle="tab" href="#icon-tabpanel-3" role="tab" aria-controls="icon-tabpanel-3" aria-selected="false"> Shipped </a>
    </li>


    <li class="nav-item" role="presentation">
      <a style="background: #f5b6c6;" class="nav-link" id="icon-tab-4" data-bs-toggle="tab" href="#icon-tabpanel-4" role="tab" aria-controls="icon-tabpanel-4" aria-selected="false"> Cancelled </a>
    </li>

  </ul>
<!-- end ul tabs -->




<!-- ul div tabs -->

 <!-- start all order  -->
 <div class="tab-content pt-5" id="tab-content">
  <div class="tab-pane active" id="icon-tabpanel-0" role="tabpanel" aria-labelledby="icon-tab-0">


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
                                          <th># ID </th>
                                          <th>Customer</th>
                                          <th>Phone</th>
                                          <th>Status</th>
                                          <th></th>
                                          <th>Total</th>
                                          <th>Date Purchased</th>
                                      </tr>
                                      </thead>
                                      <tbody  id="myTable">

                                        <tr style="background-color: #d9f2f2">

                                          <td><button onclick="location.href='/ordersdetails'" class="btn btn-outline-dark">#454</button></td>
                                          <td>Bassam Elashqar</td>
                                            <td>+90 541 4199 888</td>
                                            <th><span class="badge bg-info">Delivered</span></th>
                                            <td> <div class="spinner-grow text-info" role="status">
                                              <span class="visually-hidden">Loading...</span>
                                            </div></td>
                                            <th>€82.00</th>
                                            <th>Nov 20, 2024</th>



                                        </tr>
                                        <tr style="background-color: #cfe8da">
                                          <td><button onclick="location.href=''" class="btn btn-outline-dark">#453</button></td>
                                          <td>Mohammed ali</td>
                                            <td>+90 541 4199 888</td>
                                            <th><span class="badge bg-success">Shipped</span></th>
                                            <td>

                                            </td>
                                            <th>€82.00</th>
                                            <th>Nov 20, 2024</th>

                                        </tr>
                                        <tr style="background-color: #fcdfa8">
                                            <td><button onclick="location.href=''" class="btn btn-outline-dark">#451</button></td>
                                            <td>Bassam Elashqar</td>
                                            <td>+90 541 4199 888</td>
                                            <th><span class="badge bg-warning">Pending</span></th>
                                            <td>

                                                <div class="spinner-grow text-warning" role="status">
                                                  <span class="visually-hidden">Loading...</span>
                                                </div>
                                              </td>
                                              <th>€82.00</th>
                                            <th>Nov 20, 2024</th>
                                          </tr>
                                        <tr style="background-color: #f5b6c6">
                                          <td><button onclick="location.href=''" class="btn btn-outline-dark">#452</button></td>
                                          <td>Mohammed ali</td>
                                            <td>+90 541 4199 888</td>
                                            <th><span class="badge bg-danger">Cancelled</span></th>
                                            <td></td>
                                            <th>€82.00</th>
                                            <th>Nov 20, 2024</th>

                                        </tr>

                                      </tbody>
                                  </table>
                          </div>
                          </div>
                        </div>
                     </div>


  </div>

<!-- end all order -->



<!-- start pending order  -->
  <div class="tab-pane" id="icon-tabpanel-1" role="tabpanel" aria-labelledby="icon-tab-1">

    <div class="col-md-12 ">
      <div class="card">
        <div class="card-body">
          <div style="float: right; ">
              <input class="form-control" type="search" id="Pendingsearch" onkeyup="myFunction()" placeholder="Search for anythings.." title="Type in a name" />
            </div>
                          <h6 class="card-title">Pending Orders</h6>
                          <p class="text-muted mb-3">Here you can see all orders from the client</p>
                          <div class="table-responsive">
                                  <table id="Pendingsearch"  class="table table-hover">
                                      <thead>
                                        <tr>
                                          <th># ID </th>
                                          <th>Customer</th>
                                          <th>Phone</th>
                                          <th>Status</th>
                                          <th></th>
                                          <th>Total</th>
                                          <th>Date Purchased</th>
                                      </tr>
                                      </thead>
                                      <tbody  id="PendingFilter">


                                        <tr style="background-color: #fcdfa8">
                                          <td><button onclick="location.href=''" class="btn btn-outline-dark">#451</button></td>
                                          <td>Bassam Elashqar</td>
                                          <td>+90 541 4199 888</td>
                                          <th><span class="badge bg-warning">Pending</span></th>
                                          <td>

                                              <div class="spinner-grow text-warning" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                              </div>
                                            </td>
                                            <th>€82.00</th>
                                          <th>Nov 20, 2024</th>
                                        </tr>


                                      </tbody>
                                  </table>
                          </div>
                      </div>
                  </div>
              </div>




  </div>
  <!-- end pending order -->


   <!-- start Delivered order  -->
  <div class="tab-pane" id="icon-tabpanel-2" role="tabpanel" aria-labelledby="icon-tab-2">


    <div class="col-md-12 ">
      <div class="card">
        <div class="card-body">
          <div style="float: right; ">
              <input class="form-control" type="search" id="Deliveredsearch" onkeyup="myFunction()" placeholder="Search for anythings.." title="Type in a name" />
            </div>
                          <h6 class="card-title">Delivered Orders</h6>
                          <p class="text-muted mb-3">Here you can see all orders from the client</p>
                          <div class="table-responsive">
                                  <table id="Deliveredsearch"  class="table table-hover">
                                      <thead>
                                        <tr>
                                          <th># ID </th>
                                          <th>Customer</th>
                                          <th>Phone</th>
                                          <th>Status</th>
                                          <th></th>
                                          <th>Total</th>
                                          <th>Date Purchased</th>
                                      </tr>
                                      </thead>
                                      <tbody  id="DeliveredFilter">
                                        <tr style="background-color: #d9f2f2">

                                          <td><button onclick="location.href='/ordersdetails'" class="btn btn-outline-dark">#454</button></td>
                                          <td>Bassam Elashqar</td>
                                            <td>+90 541 4199 888</td>
                                            <th><span class="badge bg-info">Delivered</span></th>
                                            <td> <div class="spinner-grow text-info" role="status">
                                              <span class="visually-hidden">Loading...</span>
                                            </div></td>
                                            <th>€82.00</th>
                                            <th>Nov 20, 2024</th>



                                        </tr>




                                      </tbody>
                                  </table>
                          </div>
                         </div>
                       </div>
                     </div>


  </div>
<!-- end Delivered order -->




<!-- start Shipped order  -->
  <div class="tab-pane" id="icon-tabpanel-3" role="tabpanel" aria-labelledby="icon-tab-3">


    <div class="col-md-12 ">
      <div class="card">
        <div class="card-body">
          <div style="float: right; ">
              <input class="form-control" type="search" id="shippedsearch" onkeyup="myFunction()" placeholder="Search for anythings.." title="Type in a name" />
            </div>
                          <h6 class="card-title">Shipped Orders</h6>
                          <p class="text-muted mb-3">Here you can see all orders from the client</p>
                          <div class="table-responsive">
                                  <table id="shippedsearch"  class="table table-hover">
                                      <thead>
                                        <tr>
                                          <th># ID </th>
                                          <th>Customer</th>
                                          <th>Phone</th>
                                          <th>Status</th>
                                          <th></th>
                                          <th>Total</th>
                                          <th>Date Purchased</th>
                                      </tr>
                                      </thead>
                                      <tbody  id="shippedFilter">

                                        <tr style="background-color: #cfe8da">

                                          <td><button onclick="location.href='/ordersdetails'" class="btn btn-outline-dark">#454</button></td>
                                          <td>Bassam Elashqar</td>
                                            <td>+90 541 4199 888</td>
                                            <th><span class="badge bg-success">Delivered</span></th>
                                            <td></td>
                                            <th>€82.00</th>
                                            <th>Nov 20, 2024</th>



                                        </tr>


                                      </tbody>
                                  </table>
                          </div>
                       </div>
                     </div>
                      </div>


  </div>
<!-- end Shipped order -->


<!-- start Cancelled order  -->
  <div class="tab-pane" id="icon-tabpanel-4" role="tabpanel" aria-labelledby="icon-tab-4">


    <div class="col-md-12 ">
      <div class="card">
        <div class="card-body">
          <div style="float: right; ">
              <input class="form-control" type="search" id="cancelsearch" onkeyup="myFunction1()" placeholder="Search for anythings.." title="Type in a name" />
            </div>
                          <h6 class="card-title">Cancelled Orders</h6>
                          <p class="text-muted mb-3">Here you can see all orders from the client</p>
                          <div class="table-responsive">
                                  <table id="cancelsearch"  class="table table-hover">
                                      <thead>
                                        <tr>
                                          <th># ID </th>
                                          <th>Customer</th>
                                          <th>Phone</th>
                                          <th>Status</th>
                                          <th></th>
                                          <th>Total</th>
                                          <th>Date Purchased</th>
                                      </tr>
                                      </thead>
                                      <tbody  id="CancelFilter">



                                        <tr style="background-color: #f5b6c6">
                                          <td><button onclick="location.href=''" class="btn btn-outline-dark">#452</button></td>
                                          <td>Mohammed ali</td>
                                            <td>+90 541 4199 888</td>
                                            <th><span class="badge bg-danger">Cancelled</span></th>
                                            <td></td>
                                            <th>€82.00</th>
                                            <th>Nov 20, 2024</th>

                                        </tr>

                                      </tbody>
                                  </table>
                          </div>
                       </div>
                     </div>
                      </div>




  </div>
<!-- end Cancelled order -->



</div>
<!-- end ul div tabs -->









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


$(document).ready(function(){
  $("#cancelsearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#CancelFilter tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});


$(document).ready(function(){
  $("#shippedsearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#shippedFilter tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});


$(document).ready(function(){
  $("#Deliveredsearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#DeliveredFilter tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});


$(document).ready(function(){
  $("#Pendingsearch").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#PendingFilter tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});


</script>


@endsection
