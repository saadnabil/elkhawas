@extends('users.layout.index')

@section('content')

<!-- 
to be the same img width and height in card 
<style>
  .custom-card-img {
    width: 100%;
    height: 200px; /* Adjust the height as needed */
    object-fit: cover; /* Ensure the image covers the entire space */
  }
</style>

<div class="row">
    <div class="col-sm-3">
        <div class="card">
            <img src="{{ asset('elkhawas/nutellajpg.jpg') }}" class="card-img-top custom-card-img" alt="...">
            <div class="card-body">
                <h5 class="card-title">Nutella</h5>
                <p class="card-text mb-3">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                

 <button type="button" data-bs-toggle="modal" 
                            data-bs-target="#varyingModal" class="btn btn-primary"><i class="link-icon" data-feather="shopping-cart">
                              </i></button>

                          <button type="button" class="btn btn-danger">
                            <i class="feather icon" data-feather="heart"></i>
                            </button>


            </div>
        </div>
    </div>

   

</div>


-->

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">All Items</li>
      
    </ol>
    
  </nav>



  

  <div class="row" id="myProducts">


    <div style="float: right;">
        <div style="float: right; margin-left: 15px">
            <input id="myFilter" class="form-control" onkeyup="myFunction()"
             type="text" placeholder="Search by  or name card" />
             {{--  need search by barcode too --}}
        </div>
        <button onclick="location.href='/orders/details'" type="button" class="btn btn-outline-primary position-relative" style="float: right;">
            <i class="link-icon" data-feather="shopping-cart"></i>
            View Cart
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                5+
                <span class="visually-hidden">Orders</span>
            </span>
        </button>
        
    </div>

    <br>
    <br><br>

    <div class="col-sm-3">
        <div class="card">
            <img src="{{ asset('elkhawas/nutellajpg.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Nutella</h5>
                <p class="card-text mb-3">Item Name: Corn Item</p>
                <p class="card-text mb-3">Unit: 1 Carton</p>
                <p class="card-text mb-3">Unit Price: 1.45 $</p>
                <p class="card-text mb-3">Qty: 1</p>
                <p class="card-text mb-3">PIECES: 24</p>
                <p class="card-text mb-3">Main Price: 50 $</p>

                <button type="button" data-bs-toggle="modal" data-bs-target="#varyingModal" class="btn btn-primary">
                    <i class="link-icon" data-feather="shopping-cart"></i>
                </button>

                <button onclick="location.href='/orders/wishlist'" type="button" class="btn btn-danger">
                    <i class="feather icon" data-feather="heart"></i>
                </button>
            </div>
        </div>
    </div>





    <div class="col-sm-3">
      <div class="card">
          <img src="{{ asset('elkhawas/cofee65781d0b74181.png') }}" class="card-img-top" alt="...">
          <div class="card-body">
              <h5 class="card-title">cofee</h5>
              <p class="card-text mb-3">Item Name: Corn Item</p>
              <p class="card-text mb-3">Unit: 1 Carton</p>
              <p class="card-text mb-3">Unit Price: 1.45 $</p>
              <p class="card-text mb-3">Qty: 1</p>
              <p class="card-text mb-3">PIECES: 24</p>
              <p class="card-text mb-3">Main Price: 50 $</p>

              <button type="button" data-bs-toggle="modal" data-bs-target="#varyingModal" class="btn btn-primary">
                  <i class="link-icon" data-feather="shopping-cart"></i>
              </button>

              <button onclick="location.href='/orders/wishlist'" type="button" class="btn btn-danger">
                  <i class="feather icon" data-feather="heart"></i>
              </button>
          </div>
      </div>
  </div>




  <div class="col-sm-3">
    <div class="card">
        <img src="{{ asset('elkhawas/elkhawas_images/Baba-Ganoush-.jpg') }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Baba-Ganoush</h5>
            <p class="card-text mb-3">Item Name: Corn Item</p>
            <p class="card-text mb-3">Unit: 1 Carton</p>
            <p class="card-text mb-3">Unit Price: 1.45 $</p>
            <p class="card-text mb-3">Qty: 1</p>
            <p class="card-text mb-3">PIECES: 24</p>
            <p class="card-text mb-3">Main Price: 50 $</p>

            <button type="button" data-bs-toggle="modal" data-bs-target="#varyingModal" class="btn btn-primary">
                <i class="link-icon" data-feather="shopping-cart"></i>
            </button>

            <button onclick="location.href='/orders/wishlist'" type="button" class="btn btn-danger">
                <i class="feather icon" data-feather="heart"></i>
            </button>
        </div>
    </div>
</div>





<div class="col-sm-3">
  <div class="card">
      <img src="{{ asset('elkhawas/nutellajpg.jpg') }}" class="card-img-top" alt="...">
      <div class="card-body">
          <h5 class="card-title">Nutella</h5>
          <p class="card-text mb-3">Item Name: Corn Item</p>
          <p class="card-text mb-3">Unit: 1 Carton</p>
          <p class="card-text mb-3">Unit Price: 1.45 $</p>
          <p class="card-text mb-3">Qty: 1</p>
          <p class="card-text mb-3">PIECES: 24</p>
          <p class="card-text mb-3">Main Price: 50 $</p>

          <button type="button" data-bs-toggle="modal" data-bs-target="#varyingModal" class="btn btn-primary">
              <i class="link-icon" data-feather="shopping-cart"></i>
          </button>

          <button onclick="location.href='/orders/wishlist'" type="button" class="btn btn-danger">
              <i class="feather icon" data-feather="heart"></i>
          </button>
      </div>
  </div>
</div>



<div class="col-sm-3">
  <div class="card">
      <img src="{{ asset('elkhawas/nutellajpg.jpg') }}" class="card-img-top" alt="...">
      <div class="card-body">
          <h5 class="card-title">Nutella</h5>
          <p class="card-text mb-3">Item Name: Corn Item</p>
          <p class="card-text mb-3">Unit: 1 Carton</p>
          <p class="card-text mb-3">Unit Price: 1.45 $</p>
          <p class="card-text mb-3">Qty: 1</p>
          <p class="card-text mb-3">PIECES: 24</p>
          <p class="card-text mb-3">Main Price: 50 $</p>

          <button type="button" data-bs-toggle="modal" data-bs-target="#varyingModal" class="btn btn-primary">
              <i class="link-icon" data-feather="shopping-cart"></i>
          </button>

          <button onclick="location.href='/orders/wishlist'" type="button" class="btn btn-danger">
              <i class="feather icon" data-feather="heart"></i>
          </button>
      </div>
  </div>
</div>




<div class="col-sm-3">
  <div class="card">
      <img src="{{ asset('elkhawas/nutellajpg.jpg') }}" class="card-img-top" alt="...">
      <div class="card-body">
          <h5 class="card-title">Nutella</h5>
          <p class="card-text mb-3">Item Name: Corn Item</p>
          <p class="card-text mb-3">Unit: 1 Carton</p>
          <p class="card-text mb-3">Unit Price: 1.45 $</p>
          <p class="card-text mb-3">Qty: 1</p>
          <p class="card-text mb-3">PIECES: 24</p>
          <p class="card-text mb-3">Main Price: 50 $</p>

          <button type="button" data-bs-toggle="modal" data-bs-target="#varyingModal" class="btn btn-primary">
              <i class="link-icon" data-feather="shopping-cart"></i>
          </button>

          <button onclick="location.href='/orders/wishlist'" type="button" class="btn btn-danger">
              <i class="feather icon" data-feather="heart"></i>
          </button>
      </div>
  </div>
</div>




<div class="col-sm-3">
  <div class="card">
      <img src="{{ asset('elkhawas/nutellajpg.jpg') }}" class="card-img-top" alt="...">
      <div class="card-body">
          <h5 class="card-title">Nutella</h5>
          <p class="card-text mb-3">Item Name: Corn Item</p>
          <p class="card-text mb-3">Unit: 1 Carton</p>
          <p class="card-text mb-3">Unit Price: 1.45 $</p>
          <p class="card-text mb-3">Qty: 1</p>
          <p class="card-text mb-3">PIECES: 24</p>
          <p class="card-text mb-3">Main Price: 50 $</p>

          <button type="button" data-bs-toggle="modal" data-bs-target="#varyingModal" class="btn btn-primary">
              <i class="link-icon" data-feather="shopping-cart"></i>
          </button>

          <button onclick="location.href='/orders/wishlist'" type="button" class="btn btn-danger">
              <i class="feather icon" data-feather="heart"></i>
          </button>
      </div>
  </div>
</div>




<div class="col-sm-3">
  <div class="card">
      <img src="{{ asset('elkhawas/nutellajpg.jpg') }}" class="card-img-top" alt="...">
      <div class="card-body">
          <h5 class="card-title">Nutella</h5>
          <p class="card-text mb-3">Item Name: Corn Item</p>
          <p class="card-text mb-3">Unit: 1 Carton</p>
          <p class="card-text mb-3">Unit Price: 1.45 $</p>
          <p class="card-text mb-3">Qty: 1</p>
          <p class="card-text mb-3">PIECES: 24</p>
          <p class="card-text mb-3">Main Price: 50 $</p>

          <button type="button" data-bs-toggle="modal" data-bs-target="#varyingModal" class="btn btn-primary">
              <i class="link-icon" data-feather="shopping-cart"></i>
          </button>

          <button onclick="location.href='/orders/wishlist'" type="button" class="btn btn-danger">
              <i class="feather icon" data-feather="heart"></i>
          </button>
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
                          Baba Ganuj 
                        </td>
                        <td>500 $</td>
                        <td>
                          <button type="button" class="btn btn-icon btn-danger">
                              <i class="link-icon" data-feather="minus"></i>
                            </button>
  
                       
                            
                          
                          1
                      
                          <button  type="button" class="btn btn-icon  btn-success">
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
          <button onclick="location.href='/orders/details'" type="button" class="btn btn-primary">Ok</button>
        </div>
      </div>
    </div>
  </div>
  
  
  






<script>
  function myFunction() {
  var input, filter, cards, cardContainer, title, i;
  input = document.getElementById("myFilter");
  filter = input.value.toUpperCase();
  cardContainer = document.getElementById("myProducts");
  cards = cardContainer.getElementsByClassName("card");
  for (i = 0; i < cards.length; i++) {
    title = cards[i].querySelector(".card-title");
    if (title.innerText.toUpperCase().indexOf(filter) > -1) {
      cards[i].style.display = "";
    } else {
      cards[i].style.display = "none";
    }
  }
}

</script>
    
@endsection