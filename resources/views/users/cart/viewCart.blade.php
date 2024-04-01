@extends('users.layout.index')


@section('content')

<div class="row">
<div class="col-md-8 ">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Cart Details</h6>
        {{-- <p class="text-muted mb-3">Add class <code>.table-hover</code></p> --}}
        <hr>
        <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
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
                  <td>1500 $</td>
                  <td>
                    <div class="input-group quantity mx-auto" style="width: 100px;">
                        <div class="input-group-prepend">


                            <button class="btn btn-sm btn-danger btn-minus sub" type="button">
                              <i class="link-icon" data-feather="minus"></i>
                            </button>


                        </div>


                        <input type="text" class="form-control form-control-sm border-0 text-center" name="quantity" value="1">


                        <div class="input-group-append">
                            <button class="btn btn-sm btn-success btn-plus add" type="button">
                              <i class="link-icon" data-feather="plus"></i>
                            </button>
                        </div>


                    </div>

                  </td>
                  <td> 1000 $</td>
                  <td>
                    <button onclick="" class="btn btn-sm btn-danger"> <i class="link-icon" data-feather="trash-2"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                    <td>
                        <img src="{{ asset('elkhawas/elkhawas_images/9.jpg') }}" alt="not found" width="60" height="60">
                        Baba Ganuj 250grm
                      </td>
                      <td>1500 $</td>
                      <td>
                        <div class="input-group quantity mx-auto" style="width: 100px;">
                            <div class="input-group-prepend">
                                <button class="btn btn-sm btn-dark btn-minus sub" type="button">
                                    <i class="link-icon fas fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control form-control-sm border-0 text-center" name="quantity" value="1">
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-dark btn-plus add" type="button">
                                    <i class="link-icon fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
    
                      </td>
                      <td> 1000 $</td>
                      <td>
                        <button onclick="" class="btn btn-sm btn-danger"> <i class="link-icon" data-feather="trash-2"></i>
                        </button>
                      </td>
                </tr>
                <tr>
                    <td>
                        <img src="{{ asset('elkhawas/elkhawas_images/9.jpg') }}" alt="not found" width="60" height="60">
                        Baba Ganuj 250grm
                      </td>
                      <td>1500 $</td>
                      <td>
                        <div class="input-group quantity mx-auto" style="width: 100px;">
                            <div class="input-group-prepend">
                                <button class="btn btn-sm btn-dark btn-minus sub" type="button">
                                    <i class="link-icon fas fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control form-control-sm border-0 text-center" name="quantity" value="1">
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-dark btn-plus add" type="button">
                                    <i class="link-icon fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
    
                      </td>
                      <td> 1000 $</td>
                      <td>
                        <button onclick="" class="btn btn-sm btn-danger"> <i class="link-icon" data-feather="trash-2"></i>
                        </button>
                      </td>
                </tr>
                
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
    

  <div class="col-md-4"> 
                           
    <div class="card">
       
        <div class="card-body">
            <div class="sub-title">
                <h2 class="">Cart Summery</h3>
            </div> 
            <hr>
            <div class="d-flex justify-content-between pb-2">
                <div>Subtotal</div>
                <div>$3000</div>
            </div>
          
            <div class="pt-5">
                <a href="" class="btn-primary btn btn-block w-100">Proceed to Checkout</a>
            </div>
        </div>
    </div>     
    <div class="input-group apply-coupan mt-4">
        <input type="text" placeholder="Coupon Code" class="form-control">
        <button class="btn btn-primary" type="button" id="button-addon2">Apply Coupon</button>
    </div> 
</div>



</div>



  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
      $(document).ready(function () {
          $(".btn-plus").click(function () {
              var input = $(this).parent().prev('input[type="text"]');
              var currentValue = parseInt(input.val());
              input.val(currentValue + 1);
          });
  
          $(".btn-minus").click(function () {
              var input = $(this).parent().next('input[type="text"]');
              var currentValue = parseInt(input.val());
              if (currentValue > 1) {
                  input.val(currentValue - 1);
              }
          });
      });
  </script>

@endsection