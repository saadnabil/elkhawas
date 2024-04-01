@extends('users.layout.index')

@section('content')

<div class="row">
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
        <div class="box">
          <div class="t-purple font-bold-700 font-18 my-3">Contact us Info</div>
            <div class="my-2">
              <span class="font-14 t-black"><i class="link-icon" data-feather="phone"></i> Ring</span>
              <span class="font-14 t-black mx-3"> 789-885-258</span>
            </div>
            <div>
              <span class="font-14 t-black"><i class="link-icon" data-feather="mail"></i>  level</span>
              <span class="font-14 t-black mx-3">elkhawas@info.com</span>
            </div>
        </div>
        <div class="box">
          <div class="t-purple font-bold-700 font-18 my-3">The company</div>
            <div class="my-2 font-14 t-black">Elkhawas Trade</div>
            <div class="my-2 font-14 t-black">114 56 Germeny</div>
            <div class="my-2 font-14 t-black">www.elkhawas.de</div>                  
        </div>
        
      </div>
      </div>
    </div>
    <div class="m-0 col-md-9 my-4 my-md-0">
      <div class="d-flex flex-column">
        <div class="row m-1 m-md-0">
          <form class="m-0 p-0 pr-0">
            <div class="row justify-content-between container-form pb-3 m-0">
              <div class="col-12">
                <div class="card">
                    <div class="card-body">
                  <div class="font-18 font-bold-700 t-purple mb-5">Contact us directly</div>
                 
                  <div class="d-flex flex-wrap">
                    <div class="col-12 col-lg-6">
                      <div class="px-2">
                        <div class="mb-3 d-flex flex-column">
                          <label class="font-16 form-label font-bold-700">Email Address</label>
                          <input type="email" class="form-control" value="mohammed@gmail.com" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-lg-6">
                      <div class="px-2">
                        <div class="mb-3 d-flex flex-column">
                          <label class="font-16 form-label font-bold-700">Enter Subject Header</label>
                          <input type="text" class="form-control" placeholder="Enter Subject Header">
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="px-2">
                        <div class="mb-3 d-flex flex-column">
                          <label class="font-16 form-label font-bold-700">Enter Subject / Matter</label>
                          <textarea class="form-control"  style="resize: none;" placeholder="Enter Message"></textarea>
                        </div>
                      </div>
                    </div>
                   
                    
                  </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="d-flex justify-content-end my-4">
              <button onclick="successIcon()" type="button" class="btn btn-outline-dark">Send Message</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

  <script>
function successIcon() {
  Swal.fire({
      html: '<h3 class="text-success"> Your Message is sent  Successfully</h3>',
      icon: 'success'
  })
}
  </script>
    
@endsection