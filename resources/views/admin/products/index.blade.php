@extends('admin.layout.index')


@section('content')




<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">All Items</li>
  </ol>
</nav>

        <div class="col-md-12 ">
          <div class="card">
            <div class="card-body">


              <div style="float: right">
                <button onclick="location.href='/admin/product/add'" type="button" class="btn btn-inverse-primary">
                  <i data-feather="plus"></i>
                  Add Product</button>
              </div>


              <form action="" method="POST" enctype="multipart/form-data">
              <div style="float: right; margin-right: 10px">
                <button type="button" class="btn btn-inverse-secondary">
                  <img width="20" height="20" src="{{ asset('assets/excel.png') }}" />
                  Export Product</button>
              </div>
            </form>


            
         


              <h6 class="card-title">Your Items</h6>
             
              <p class="text-muted mb-3">Here you can see all your items in the table.</p>


             

              

              <div class="table-responsive">
                <table id="dataTableExample" class="table">
                  <thead>
                    <tr>
                      <th> Product Name</th>
                      <th>Item Name</th>
                      <th>Unit</th>
                      <th>Unit price</th>
                      <th>Qty</th>
                      <th>  pieces</th>
                      <th>Main Price </th>
                      <th>Total Price</th>
                      <th>Actions</th>
                      
                      
                     

                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td> 
                        {{-- <button type="button" class="btn btn-primary" > --}}
                          <img data-bs-toggle="modal" data-bs-target="#exampleModal" style="height: 50px;width:50px;" src="{{ asset('elkhawas/elkhawas_images/Baba-Ganoush-.jpg') }}" />
                        Baba Ganouj 
                        {{-- </button> --}} 
                      </td>
                       
                      <td>Corn Item</td>
                      <td>1 Carton</td>
                      <td>1.45 $</td>
                      <td>2</td>
                      <td>24</td>
                      <td  style="color: goldenrod;">50 $</td>
                      <td>100$</td>
                      <td>
                        
                          <button onclick="location.href='/admin/product/edit'" type="button" class="btn btn-warning btn-icon">
                            <i data-feather="check-square"></i>
                          </button>
                          <button type="button" class="btn btn-danger btn-icon">
                            <i data-feather="trash-2"></i>
                          </button>
                      
                      </td>
                      
                    </tr>
                    <tr>
                      <td> 
                         {{-- <button type="button" class="btn btn-primary" > --}}
                          <img data-bs-toggle="modal" data-bs-target="#exampleModal" style="height: 50px;width:50px;" src="{{ asset('elkhawas/elkhawas_images/Baba-Ganoush-.jpg') }}" />
                        Baba Ganouj 
                        {{-- </button> --}}
                      </td>   
                      <td>Corn Item</td>
                      <td>1 Carton</td>
                      <td>1.45 $</td>
                      <td>2</td>
                      <td>12</td>
                      <td style="color: goldenrod;">70 $</td>
                      <td>70$</td>
                      <td>
                        
                          <button type="button" class="btn btn-warning btn-icon">
                            <i data-feather="check-square"></i>
                          </button>
                          <button type="button" class="btn btn-danger btn-icon">
                            <i data-feather="trash-2"></i>
                          </button>
                       
                      </td>

                    </tr>
                    <tr>
                      <td> 
                         {{-- <button type="button" class="btn btn-primary" > --}}
                          <img data-bs-toggle="modal" data-bs-target="#exampleModal" style="height: 50px;width:50px;" src="{{ asset('elkhawas/elkhawas_images/Baba-Ganoush-.jpg') }}" />
                        Baba Ganouj 
                        {{-- </button> --}}
                      </td>
                         
                      <td>Corn Item</td>
                      <td>1 Carton</td>
                      <td>1.45 $</td>
                      <td>2</td>
                      <td>12</td>
                      <td style="color: goldenrod;">70 $</td>
                      <td>70$</td>
                      <td>
                        
                          <button type="button" class="btn btn-warning btn-icon">
                            <i data-feather="check-square"></i>
                          </button>
                          <button type="button" class="btn btn-danger btn-icon">
                            <i data-feather="trash-2"></i>
                          </button>
                       
                      </td>
                    </tr>
                    <tr>
                      <td> 
                         {{-- <button type="button" class="btn btn-primary" > --}}
                          <img data-bs-toggle="modal" data-bs-target="#exampleModal" style="height: 50px;width:50px;" src="{{ asset('elkhawas/elkhawas_images/Baba-Ganoush-.jpg') }}" />
                        Baba Ganouj 
                        {{-- </button> --}}
                      </td>
                         
                      <td>Corn Item</td>
                      <td>1 Carton</td>
                      <td>1.45 $</td>
                      <td>2</td>
                      <td>24</td>
                      <td style="color: goldenrod;">50 $</td>
                      <td>50$</td>
                      <td>
                        
                          <button type="button" class="btn btn-warning btn-icon">
                            <i data-feather="check-square"></i>
                          </button>
                          <button type="button" class="btn btn-danger btn-icon">
                            <i data-feather="trash-2"></i>
                          </button>
                       
                      </td>
                    </tr>
                    <tr>
                      <td> 
                        {{-- <button type="button" class="btn btn-primary" > --}}
                          <img data-bs-toggle="modal" data-bs-target="#exampleModal" style="height: 50px;width:50px;" src="{{ asset('elkhawas/elkhawas_images/Baba-Ganoush-.jpg') }}" />
                        Baba Ganouj 
                        {{-- </button> --}}
                      </td>
                         
                      <td>Corn Item</td>
                      <td>1 Carton</td>
                      <td>1.45 $</td>
                      <td>2</td>
                      <td>24</td>
                      <td style="color: goldenrod;">50 $</td>
                      <td>50$</td>
                      <td>
                        
                          <button type="button" class="btn btn-warning btn-icon">
                            <i data-feather="check-square"></i>
                          </button>
                          <button type="button" class="btn btn-danger btn-icon">
                            <i data-feather="trash-2"></i>
                          </button>
                       
                      </td>
                    </tr>
                    <tr>
                      <td> 
                         {{-- <button type="button" class="btn btn-primary" > --}}
                          <img data-bs-toggle="modal" data-bs-target="#exampleModal" style="height: 50px;width:50px;" src="{{ asset('elkhawas/elkhawas_images/Baba-Ganoush-.jpg') }}" />
                        Baba Ganouj 
                        {{-- </button> --}}
                      </td>
                         
                      <td>Corn Item</td>
                      <td>1 Carton</td>
                      <td>1.45 $</td>
                      <td>2</td>
                      <td>12</td>
                      <td style="color: goldenrod;">70 $</td>
                      <td>70$</td>
                      <td>
                        
                          <button type="button" class="btn btn-warning btn-icon">
                            <i data-feather="check-square"></i>
                          </button>
                          <button type="button" class="btn btn-danger btn-icon">
                            <i data-feather="trash-2"></i>
                          </button>
                       
                      </td>
                    </tr>
                    <tr>
                      <td> 
                        {{-- <button type="button" class="btn btn-primary" > --}}
                          <img data-bs-toggle="modal" data-bs-target="#exampleModal" style="height: 50px;width:50px;" src="{{ asset('elkhawas/elkhawas_images/Baba-Ganoush-.jpg') }}" />
                        Baba Ganouj 
                        {{-- </button> --}}
                      </td>
                         
                      <td>Corn Item</td>
                      <td>1 Carton</td>
                      <td>1.45 $</td>
                      <td>2</td>
                      <td>24</td>
                      <td style="color: goldenrod;">50 $</td>
                      <td>50$</td>
                      <td>
                        
                          <button type="button" class="btn btn-warning btn-icon">
                            <i data-feather="check-square"></i>
                          </button>
                          <button type="button" class="btn btn-danger btn-icon">
                            <i data-feather="trash-2"></i>
                          </button>
                       
                      </td>
                    </tr>
                    <tr>
                      <td> 
                         {{-- <button type="button" class="btn btn-primary" > --}}
                          <img data-bs-toggle="modal" data-bs-target="#exampleModal" style="height: 50px;width:50px;" src="{{ asset('elkhawas/elkhawas_images/Baba-Ganoush-.jpg') }}" />
                        Baba Ganouj 
                        {{-- </button> --}}
                      </td>
                         
                      <td>Corn Item</td>
                      <td>1 Carton</td>
                      <td>1.45 $</td>
                      <td>2</td>
                      <td>24</td>
                      <td style="color: goldenrod;">50 $</td>
                      <td>50$</td>
                      <td>
                        
                          <button type="button" class="btn btn-warning btn-icon">
                            <i data-feather="check-square"></i>
                          </button>
                          <button type="button" class="btn btn-danger btn-icon">
                            <i data-feather="trash-2"></i>
                          </button>
                       
                      </td>
                    </tr>
                    <tr>
                      <td> 
                         {{-- <button type="button" class="btn btn-primary" > --}}
                          <img data-bs-toggle="modal" data-bs-target="#exampleModal" style="height: 50px;width:50px;" src="{{ asset('elkhawas/elkhawas_images/Baba-Ganoush-.jpg') }}" />
                        Baba Ganouj 
                        {{-- </button> --}}
                      </td>
                         
                      <td>Corn Item</td>
                      <td>1 Carton</td>
                      <td>1.45 $</td>
                      <td>2</td>
                      <td>24</td>
                      <td style="color: goldenrod;">50 $</td>
                      <td>50$</td>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Baba Ganouj </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img width="100%" height="100%" data-bs-toggle="modal" data-bs-target="#exampleModal"
         style="height: 100%;width:100%;" src="{{ asset('elkhawas/elkhawas_images/Baba-Ganoush-.jpg') }}" />

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


@endsection