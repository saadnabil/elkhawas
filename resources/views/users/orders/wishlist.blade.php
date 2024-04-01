@extends('users.layout.index')

@section('content')


            <div class="row">
               
                <div class="col-md-9">
                    <div class="card">


                        <div class="card-header">
                            <h2 class="h5 mb-0 pt-2 pb-2">
                                <i class="feather icon" data-feather="heart"></i>

                                Wishlist</h2>
                        </div>


                        <div class="card-body p-4">

                            <div class="d-sm-flex justify-content-between mt-lg-4 mb-4 pb-3 pb-sm-2 border-bottom">
                                <div class="d-block d-sm-flex align-items-start text-center text-sm-start">
                                    
                                    <a class="d-block flex-shrink-0 mx-auto me-sm-4" href="#" 
                                    style="width: 10rem;"><img width="100" height="100" src="{{ asset('elkhawas/elkhawas_images/9.jpg') }}" alt="Product"></a>
                                    <div class="pt-2">
                                        <h4 class="product-title fs-base mb-2"><a href="shop-single-v1.html">TH Jeans City Backpack
                                            </a></h4>                                        
                                        <div class="fs-lg text-accent pt-2">$79.<small>50</small></div>


                                    </div>
                                </div>

                                
                                <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                                    <button class="btn btn-outline-danger btn-sm" type="button">
                                        <i class="fas fa-trash-alt me-2"></i>Remove</button>
                                </div>
                            </div>  
                            <div class="d-sm-flex justify-content-between mt-lg-4 mb-4 pb-3 pb-sm-2 border-bottom">
                                <div class="d-block d-sm-flex align-items-start text-center text-sm-start">
                                    <a class="d-block flex-shrink-0 mx-auto me-sm-4" href="#" style="width: 10rem;">
                                        <img width="100" height="100" src="{{ asset('elkhawas/cofee65781d0b74181.png ') }}" alt="Product"></a>
                                    <div class="pt-2">
                                        <h4 class="product-title fs-base mb-2"><a href="shop-single-v1.html">TH Jeans City Backpack</a></h4>                                        
                                        <div class="fs-lg text-accent pt-2">$79.<small>50</small></div>
                                    </div>
                                </div>
                                <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                                    <button class="btn btn-outline-danger btn-sm" type="button"><i class="fas fa-trash-alt me-2"></i>Remove</button>
                                </div>
                            </div>  
                            
                            <div class="d-sm-flex justify-content-between mt-lg-4 mb-4 pb-3 pb-sm-2 border-bottom">
                                <div class="d-block d-sm-flex align-items-start text-center text-sm-start">
                                    <a class="d-block flex-shrink-0 mx-auto me-sm-4" href="#" style="width: 10rem;">
                                        <img width="100" height="100" src="{{ asset('elkhawas/nutellajpg.jpg') }}" alt="Product"></a>
                                    <div class="pt-2">
                                        <h4 class="product-title fs-base mb-2"><a href="shop-single-v1.html">
                                            TH Jeans City Backpack</a></h4>                                        
                                        <div class="fs-lg text-accent pt-2">$79.<small>50</small></div>
                                    </div>
                                </div>
                                <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                                    <button class="btn btn-outline-danger btn-sm" type="button"><i class="fas fa-trash-alt me-2"></i>Remove</button>
                                </div>
                            </div>  

                            <div class="d-sm-flex justify-content-between mt-lg-4 mb-4 pb-3 pb-sm-2 border-bottom">
                                <div class="d-block d-sm-flex align-items-start text-center text-sm-start">
                                    <a class="d-block flex-shrink-0 mx-auto me-sm-4" href="#" style="width: 10rem;">
                                        <img  width="100" height="100" src="{{ asset('elkhawas/elkhawas_images/9.jpg') }}" alt="Product"></a>
                                    <div class="pt-2">
                                        <h4 class="product-title fs-base mb-2"><a href="shop-single-v1.html">TH Jeans City Backpack</a></h4>                                        
                                        <div class="fs-lg text-accent pt-2">$79.<small>50</small></div>
                                    </div>
                                </div>
                                <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                                    <button class="btn btn-outline-danger btn-sm" type="button"><i class="fas fa-trash-alt me-2"></i>Remove</button>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
      
  
    
@endsection