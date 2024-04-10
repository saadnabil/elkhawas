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
        {{-- <button onclick="location.href='/orders/details'" type="button" class="btn btn-outline-primary position-relative" style="float: right;">
            <i class="link-icon" data-feather="shopping-cart"></i>
            View Cart
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                5+
                <span class="visually-hidden">Orders</span>
            </span>
        </button> --}}
        
    </div>

    <br>
    <br><br>

    <div class="col-sm-3">
        <div class="card">
            <img src="{{ asset('elkhawas/elkhawas_images/Baba-Ganoush-.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Baba-Ganoush  <span class="badge bg-warning">€9.99</span></h5>
                <p class="card-text mb-3">Item Name: Corn Item </p>
                <p class="card-text mb-3">Main Price: <span class="badge bg-primary">€50.99</span></p>

                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">
                    <i class="link-icon" data-feather="shopping-cart"></i>
                </button>




<!-- Second Button and Offcanvas Modal -->
{{-- <button type="button" id="secondButton" class="btn btn-light" data-bs-toggle="offcanvas" data-bs-target="#demo">
  <span class="badge bg-danger position-absolute top-0">3</span>
  <i class="link-icon" data-feather="shopping-cart"></i>
</button> --}}

{{-- <div class="offcanvas offcanvas-end" id="demo">
  <!-- Offcanvas Modal Content -->
</div>

<script>
  document.getElementById("firstButton").addEventListener("click", function() {
      document.getElementById("secondButton").click();
  });
</script> --}}











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
              <h5 class="card-title">Baba-Ganoush 100 gr  <span class="badge bg-warning">€9.99</span></h5>
              <p class="card-text mb-3">Item Name: Corn Item </p>
                     <p class="card-text mb-3">Main Price: <span class="badge bg-primary">€50.99</span></p>

              <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">
                  <i class="link-icon" data-feather="shopping-cart"></i>
              </button>

              <button onclick="location.href='/orders/wishlist'" type="button" class="btn btn-danger">
                  <i class="feather icon" data-feather="heart"></i>
              </button>
          </div>
      </div>
  </div>







</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
 
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 id="modalTitle" class="modal-title">Baba-Ganoush</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      
      <div class="modal-body p-0">
        <div class="card shadow border-0">
          <div class="card-body px-lg-5 py-lg-5">


            <div class="row">



              <div class="col-lg-6 text-center" id="modalImgPart">
                <img id="modalImg" src="{{ asset('elkhawas/elkhawas_images/Baba-Ganoush-.jpg') }}" class="img-fluid" alt="Baba-Ganoush Image">
              </div>

              
              <div class="col-lg-6" id="modalItemDetailsPart">
                <input id="modalID" type="hidden">
                <div id="modalItemDetailsPart">
                  <input id="modalID" type="hidden">
                  <br>
                  <h5 id="modalDescription"><strong>Description</strong>  </h5>
                  <p>this item is so good this item is so good this item is so good this item is so good</p>
                  <br>
                  <ul class="list-group">
                      <li class="list-group-item">1 Carton</li>
                      <li class="list-group-item">24 PIECES</li>
                  </ul>
                  <br>
                  <div class="quantity-area">
                      <div class="form-group">
                          <label style="color: goldenrod" class="form-control-label" for="quantity">Quantity</label>
                          <input type="number" name="quantity" id="quantity"
                           class="form-control form-control-alternative" placeholder="1" value="1" required autofocus>
                      </div>
                      
                      <br>
                      <div class="quantity-btn">
                          <button id="secondButton"  data-bs-toggle="offcanvas" data-bs-target="#demo"
                             class="btn btn-primary">Add To Cart</button>
                      </div>

                      <div class="offcanvas offcanvas-end" id="demo">
                        <!-- Offcanvas Modal Content -->
                      </div>
                  

                  </div>
                  <!-- Inform if closed -->
                  <!-- End inform -->
              </div>
              
                <!-- Inform if closed -->
                <!-- End inform -->
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>



  






<script>
document.getElementById("secondButton").click();
// document.getElementById("firstButton").addEventListener("click", function() {
//                             document.getElementById("secondButton").click();
//                         });



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