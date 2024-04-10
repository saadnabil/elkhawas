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


  <br>
  <div class="col-md-12 ">
    <div class="card">
      <div class="card-body">

       
         

                        <h6 class="card-title">Contact us info </h6>
                        <p class="text-muted mb-3">Contact us  Settings Table </p>
                        <div class="table-responsive">
                                <table id="myInput" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID </th>
                                            <th>Phone</th>
                                            <th>Email address</th>
                                            <th>Company Name</th>
                                            <th>Address</th>
                                            <th>Street</th>
                                            <th>Zip Code</th>
                                            <th>Url Link</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <tr>
                                            <td>1</td>
                                            <td>+90 541 4199 888</td>
                                            <td>info@elkhawas.com</td>
                                             <td>Elkhawas Trade</td>
                                            <td>Germeny 343 cd</td>
                                            <td>18gr street</td>
                                            <td>92128</td>
                                            <td>elkhawas.com</td>
                                            <td>
                                              {{-- <button onclick="location.href=''" type="button" class="btn btn-warning btn-icon">
                                                <i data-feather="check-square"></i>
                                              </button> --}}
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


    
@endsection