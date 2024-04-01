@extends('users.layout.index')


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

                <button onclick="location.href='/orders/details'"  type="button" class="btn btn-outline-primary position-relative">
                  <i class="link-icon" data-feather="shopping-cart"></i>
                  View Cart
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    5+
                    <span class="visually-hidden">Orders</span>
                  </span>
                </button>


                {{-- <button onclick="location.href='/orders/details'" type="button" class="btn btn-inverse-primary">
                    <i class="link-icon" data-feather="shopping-cart"></i>
                    View Cart
                </button> --}}
              </div>


              <h6 class="card-title">Your Products</h6>

              <p class="text-muted mb-3">Here you can see all your Products in the table.</p>


             <!-- we need to put in serach | search by barcode -->



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
                      <th>Main Price</th>
                      <th>Total Price</th>
                      <th>Actions</th>





                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                         {{-- <button type="button" class="btn btn-primary" > --}}
                          <img data-bs-toggle="modal" data-bs-target="#exampleModal" style="height: 50px;width:50px;"
                           src="{{ asset('elkhawas/elkhawas_images/Baba-Ganoush-.jpg') }}" />
                        Baba Ganouj
                        {{-- </button> --}}
                      </td>

                      <td>Corn Item</td>
                      <td>1 Carton</td>
                      <td>1.45 $</td>
                      <td>2</td>
                      <td>24</td>
                      <td>50 $</td>
                      <td>100$</td>
                      <td>



                            <button type="button" data-bs-toggle="modal"
                            data-bs-target="#varyingModal" class="btn btn-primary"><i class="link-icon" data-feather="shopping-cart">
                              </i></button>

                          <button type="button" class="btn btn-danger">
                            <i class="feather icon" data-feather="heart"></i>
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
                      <td>70 $</td>
                      <td>70$</td>
                      <td>


                            <button type="button" data-bs-toggle="modal"
                            data-bs-target="#varyingModal" class="btn btn-primary"><i class="link-icon" data-feather="shopping-cart">
                              </i></button>


                          <button type="button" class="btn btn-danger">
                            <i class="feather icon" data-feather="heart"></i>
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
                      <td>70 $</td>
                      <td>70$</td>
                      <td>


                        <button type="button" data-bs-toggle="modal"
                        data-bs-target="#varyingModal" class="btn btn-primary"><i class="link-icon" data-feather="shopping-cart">
                          </i></button>

                          <button type="button" class="btn btn-danger">
                            <i class="feather icon" data-feather="heart"></i>
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
                      <td>50 $</td>
                      <td>50$</td>
                      <td>



                            <button type="button" data-bs-toggle="modal"
                            data-bs-target="#varyingModal" class="btn btn-primary"><i class="link-icon" data-feather="shopping-cart">
                              </i></button>

                          <button type="button" class="btn btn-danger">
                            <i class="feather icon" data-feather="heart"></i>
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
                      <td>50 $</td>
                      <td>50$</td>
                      <td>



                            <button type="button" data-bs-toggle="modal"
                            data-bs-target="#varyingModal" class="btn btn-primary"><i class="link-icon" data-feather="shopping-cart">
                              </i></button>

                          <button type="button" class="btn btn-danger">
                            <i class="feather icon" data-feather="heart"></i>
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
                      <td>70 $</td>
                      <td>70$</td>
                      <td>


                            <button type="button" data-bs-toggle="modal"
                            data-bs-target="#varyingModal" class="btn btn-primary"><i class="link-icon" data-feather="shopping-cart">
                              </i></button>


                          <button type="button" class="btn btn-danger">
                            <i class="feather icon" data-feather="heart"></i>
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
                      <td>50 $</td>
                      <td>50$</td>
                      <td>



                            <button type="button" data-bs-toggle="modal"
                            data-bs-target="#varyingModal" class="btn btn-primary"><i class="link-icon" data-feather="shopping-cart">
                              </i></button>

                          <button type="button" class="btn btn-danger">
                            <i class="feather icon" data-feather="heart"></i>
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
                      <td>50 $</td>
                      <td>50$</td>
                      <td>



                            <button type="button" data-bs-toggle="modal"
                            data-bs-target="#varyingModal" class="btn btn-primary"><i class="link-icon" data-feather="shopping-cart">
                              </i></button>

                          <button type="button" class="btn btn-danger">
                            <i class="feather icon" data-feather="heart"></i>
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
                      <td>50 $</td>
                      <td>50$</td>
                      <td>




                          <button type="button" data-bs-toggle="modal"
                          data-bs-target="#varyingModal" class="btn btn-primary"><i class="link-icon" data-feather="shopping-cart">
                            </i></button>


                          <button type="button" class="btn btn-danger">
                            <i class="feather icon" data-feather="heart"></i>
                            </button>

                      </td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!--  model for products-->


<div class="modal fade" id="varyingModal" tabindex="-1" aria-labelledby="varyingModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="varyingModalLabel">Cart Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" enctype="multipart/form-data">


        <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>ITEM	</th>
                  <th>Price</th>
                  <th>Qty</th>
                  <th>Total</th>
                  <th>Remove</th>
                </tr>
              </thead>
              <tbody>

                <tr>
                    <td>
                        <img src="{{ asset('elkhawas/elkhawas_images/9.jpg') }}" alt="not found" width="60" height="60">
                        Baba Ganuj 250grm
                      </td>
                      <td>500 $</td>
                      <td>
                        <button type="button" class="btn btn-icon btn-danger">
                            <i class="link-icon" data-feather="minus"></i>
                          </button>




                        1

                        <button type="button" class="btn btn-icon  btn-success">
                            <i class="link-icon" data-feather="plus"></i>
                          </button>


                    </td>
                      <td>1000 $</td>
                      <td>
                        <button onclick="" class="btn btn-sm btn-danger"> <i class="link-icon" data-feather="trash-2"></i>
                        </button>
                      </td>
                </tr>

              </tbody>
            </table>



  </div>




        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Ok</button>
      </div>
    </div>
  </div>
</div>


        <!-- Button trigger modal -->


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
