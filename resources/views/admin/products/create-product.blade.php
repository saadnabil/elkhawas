


@extends('admin.layout.index')

@section('content')



<div class="col-md-8 ">
  <div class="card">
    <div class="card-body">
      <h6 class="card-title">Create Products</h6>
      <form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
        <div class="row">
  
          <div class="col-sm-4">
            <div class="mb-3">
              <label class="form-label">Product Name</label>
              <input required autocomplete="off" name="name" type="text" class="form-control" placeholder="Enter Product Name">
            </div>
          </div><!-- Col -->
  
          <div class="col-sm-4">
            <div class="mb-3">
              <label class="form-label">Item Name</label>
              <input required autocomplete="off" name="ItemName" type="text" class="form-control" placeholder="Enter Item Name">
            </div>
          </div><!-- Col -->
  
          <div class="col-sm-4">
            <div class="mb-3">
              <label class="form-label">Unit</label>
              <input autocomplete="off" name="unit" type="text" class="form-control" placeholder="Enter Unit">
            </div>
          </div><!-- Col -->
  
          <div class="col-sm-4">
            <div class="mb-3">
              <label class="form-label">Unit price</label>
              <input required autocomplete="off" name="unit_price" type="number" class="form-control" placeholder="Unit price">
            </div>
          </div><!-- Col -->
  
          <div class="col-sm-4">
            <div class="mb-3">
              <label class="form-label">Quantity</label>
              <input required autocomplete="off" name="quantity" type="number" class="form-control" placeholder="Quantity">
            </div>
          </div><!-- Col -->
  
          <div class="col-sm-4">
            <div class="mb-3">
              <label class="form-label">The number of pieces</label>
              <input required autocomplete="off" name="number_of_pices" type="number" class="form-control" placeholder="The number of pieces">
            </div>
          </div><!-- Col -->
  
          <div class="col-sm-4">
            <div class="mb-3">
              <label style="color: goldenrod;" class="form-label"><strong>Main Price</strong> </label>
              <input required autocomplete="off" name="main_price" type="number" class="form-control" placeholder="Main Price">
            </div>
          </div><!-- Col -->


<!--  this barcode its just number barcode for using in searching in index for product-->
          <div class="col-sm-4">
            <div class="mb-3">
              <label class="form-label">Barcode</label>
              <input required autocomplete="off" name="Barcode" type="number" class="form-control" placeholder="Barcode">
            </div>
          </div><!-- Col -->

  
          <div class="col-sm-4">
            <div class="mb-3">
              <label class="form-label">Image of Products</label>
              <input name="image" id="imageInput" type="file" class="form-control">
            </div>
            <div id="imagePreview" class="mt-2"></div>
          </div><!-- Col -->




         

  
        </div><!-- Row -->








        
      </form>
      <button onclick="location.href='/admin/home'" type="button" class="btn btn-light submit"> Back</button>
      <button class="btn btn-primary" onclick="successIcon()">Confirm create</button>
      {{-- <button type="button" class="btn btn-primary submit">Confirm create</button> --}}
    </div>
    
  </div>
  
  <br>
  
<form action="" method="POST" enctype="multipart/form-data">

  <div class="col-md-6 ">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Add Products By Excel</h6>
        <hr>
        <div style="float: right; margin-right: 10px">
          <input type="file" class="form-control" >
          <br>
          <button type="button" class="btn btn-dark">Import Product</button>
        </div>

      </div>
    </div>
  </div>
</form>

  <script>


function successIcon() {
  Swal.fire({
      html: '<h3 class="text-success"> Created product Successfully</h3>',
      icon: 'success'
  })
}





    document.getElementById('imageInput').addEventListener('change', function() {
      const file = this.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(event) {
          const img = document.createElement('img');
          img.src = event.target.result;
          img.setAttribute('style', 'width: 100px; height: 100px;');
          document.getElementById('imagePreview').innerHTML = '';
          document.getElementById('imagePreview').appendChild(img);
        }
        reader.readAsDataURL(file);
      }
    });
  </script>
  
  </div>
    
@endsection
    
