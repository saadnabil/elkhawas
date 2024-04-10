@extends('layout.usermaster')

@section('content')
  

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Items</li>

        </ol>

    </nav>





    <div class="row" id="myProducts">


        <div style="float: right;">
            <div style="float: right; margin-left: 15px">
                <input id="myFilter" class="form-control" onkeyup="myFunction()" type="text"
                    placeholder="Search by  or name card" />
                {{--  need search by barcode too --}}
            </div>
           
        </div>

            
      


        <div class="mt-2">
            {{ $items->links() }}
        </div>
        
        @foreach($items as $key => $item)
       
        <div class="col-sm-3">
            <div class="card">
                <img src="{{ $item->image != null ? url('storage/'.$item->image) : url('item.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->title['en'] }}  <span class="badge bg-info">{{ $item->unit_price }} €</span></h5>
                    <p class="card-text mb-3">Item Name: {{ $item->item_name[app()->getLocale()] }} </p>
                           <p class="card-text mb-3">Main Price: <span class="badge bg-primary"> {{ $item->total_price }} €</span></p>
      
                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">
                        <i class="link-icon" data-feather="shopping-cart"></i>
                    </button>
      
                    <button onclick="location.href='/orders/wishlist'" type="button" class="btn btn-danger">
                        <i class="feather icon" data-feather="heart"></i>
                    </button>
                </div>
            </div>
        </div>
      

        @endforeach

        <div class="mt-3">
            {{ $items->links() }}
        </div>




    </div>











    
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
 
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 id="modalTitle" class="modal-title">{{ $item->title['en'] }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      
      <div class="modal-body p-0">
        <div class="card shadow border-0">
          <div class="card-body px-lg-5 py-lg-5">


            <div class="row">



              <div class="col-lg-6 text-center" id="modalImgPart">
                <img id="modalImg" src="{{ $item->image != null ? url('storage/'.$item->image) : url('item.png') }}" 
                class="img-fluid" alt=" Image Not Found">
              </div>

             

              <div class="col-lg-6" id="modalItemDetailsPart">
                <input id="modalID" type="hidden">
                <div id="modalItemDetailsPart">
                  <input id="modalID" type="hidden">
                  <br>
                  <h5 id="modalDescription"><strong>Description</strong>  </h5>
                  <p>{{ $item->description['en'] }}</p>
                  <br>
                  <ul class="list-group">
                      <li class="list-group-item">Unit : {{ $item->unit['en'] }}</li>
                      <li class="list-group-item"> PIECES : {{ $item->units_number }}</li>
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
