<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        <form class="search-form">
            <div class="input-group">
  <div class="input-group-text">
    <i data-feather="search"></i>
  </div>
                <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
            </div>
        </form>



         <!-- cart -->
    <ul class="navbar-nav">
      <li class="nav-item position-relative">
          <button type="button" data-bs-toggle="offcanvas" data-bs-target="#demo" class="btn btn-light">
              <span class="badge bg-danger position-absolute top-0">3</span>
              <i class="link-icon" data-feather="shopping-cart"></i>
          </button>
  
          <div class="offcanvas offcanvas-end" id="demo">
              <div class="offcanvas-header">
                  <h1 class="offcanvas-title">Shopping Cart</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
              </div>
              <div class="offcanvas-body">
                <!-- start for each -->
                  <div class="items col-12 clearfix">
                      <div class="info-block block-info clearfix">

                        {{-- <div class="row">
                          <div class="col">
                              <button type="button" value="1712272785" class="btn btn-outline-primary btn-sm">
                                  <span class="btn-cart-icon"><i class="link-icon" data-feather="minus"></i></span>
                              </button>
                          </div>
                          <div class="col">
                              <button type="button" value="1712272785" class="btn btn-outline-primary btn-sm">
                                  <span class="btn-cart-icon"><i class="link-icon" data-feather="plus"></i></span>
                              </button>
                          </div>
                          <div class="col">
                              <button type="button" value="1712272785" class="btn btn-outline-primary btn-sm">
                                  <span class="btn-cart-icon"><i class="link-icon" data-feather="trash"></i></span>
                              </button>
                          </div>
                      </div> --}}
                        

                      <div class="items col-12 clearfix">
                        <div class="info-block block-info clearfix">
    
    
                            <div class="square-box float-start">
                                <img src="{{ asset('elkhawas/nutellajpg.jpg') }}"
                                 width="150" height="115" alt="" class="productImage">
                            </div>
    
                               <br>
                            <div class="product-item">
                              <ul class="list-unstyled">
                                <li style="text-align: center">
                                 <strong>Salad Napoli (350g) <strong style="color: goldenrod"> 1 x €11.49</strong></strong> 
                                </li>
                                {{-- <li style="text-align: center" >
                                  <strong> 1 x €11.49</strong>
                                </li> --}}
                            </ul>
    
                            <br>
    
                            <div class="row">
                              <div class="col">
                                  <button type="button" value="" class="btn btn-success btn-sm">
                                     + <span class="btn-cart-icon"><i class="fa fa-plus"></i></span>
                                  </button>
                              </div>
                              <div class="col">
                                  <button type="button" value="" class="btn btn-warning btn-sm">
                                  -    <span class="btn-cart-icon"><i class="fa fa-minus"></i></span>
                                  </button>
                              </div>
                              <div class="col">
                                  <button type="button" value="" class="btn btn-danger btn-sm">
                                   Delete   <span class="btn-cart-icon"><i class="fa fa-trash"></i></span>
                                  </button>
                              </div>
                          </div>
    
                          
    
    
                        </div>
                    </div>

                    

                    <hr>

                    <div class="items col-12 clearfix">
                      <div class="info-block block-info clearfix">
  
  
                          <div class="square-box float-start">
                              <img src="{{ asset('elkhawas/nutellajpg.jpg') }}"
                               width="150" height="115" alt="" class="productImage">
                          </div>
  
                             <br>
                          <div class="product-item">
                            <ul class="list-unstyled">
                              <li style="text-align: center">
                               <strong>Salad Napoli (350g) <strong style="color: goldenrod"> 1 x €11.49</strong></strong> 
                              </li>
                              {{-- <li style="text-align: center" >
                                <strong> 1 x €11.49</strong>
                              </li> --}}
                          </ul>
  
                          <br>
  
                          <div class="row">
                            <div class="col">
                                <button type="button" value="" class="btn btn-success btn-sm">
                                   + <span class="btn-cart-icon"><i class="fa fa-plus"></i></span>
                                </button>
                            </div>
                            <div class="col">
                                <button type="button" value="" class="btn btn-warning btn-sm">
                                -    <span class="btn-cart-icon"><i class="fa fa-minus"></i></span>
                                </button>
                            </div>
                            <div class="col">
                                <button type="button" value="" class="btn btn-danger btn-sm">
                                 Delete   <span class="btn-cart-icon"><i class="fa fa-trash"></i></span>
                                </button>
                            </div>
                        </div>
  
                        
  
  
                      </div>
                  </div>

                  
                  <hr>



                  <div class="items col-12 clearfix">
                    <div class="info-block block-info clearfix">


                        <div class="square-box float-start">
                            <img src="{{ asset('elkhawas/nutellajpg.jpg') }}"
                             width="150" height="115" alt="" class="productImage">
                        </div>

                           <br>
                        <div class="product-item">
                          <ul class="list-unstyled">
                            <li style="text-align: center">
                             <strong>Salad Napoli (350g) <strong style="color: goldenrod"> 1 x €11.49</strong></strong> 
                            </li>
                            {{-- <li style="text-align: center" >
                              <strong> 1 x €11.49</strong>
                            </li> --}}
                        </ul>

                        <br>

                        <div class="row">
                          <div class="col">
                              <button type="button" value="" class="btn btn-success btn-sm">
                                 + <span class="btn-cart-icon"><i class="fa fa-plus"></i></span>
                              </button>
                          </div>
                          <div class="col">
                              <button type="button" value="" class="btn btn-warning btn-sm">
                              -    <span class="btn-cart-icon"><i class="fa fa-minus"></i></span>
                              </button>
                          </div>
                          <div class="col">
                              <button type="button" value="" class="btn btn-danger btn-sm">
                               Delete   <span class="btn-cart-icon"><i class="fa fa-trash"></i></span>
                              </button>
                          </div>
                      </div>

                      


                    </div>
                </div>


                       
              



                   <!-- end for each -->
                  <br>
                  <!-- Add more items here -->
                  <div id="totalPrices">
                      <div class="card mb-4 mb-xl-0">
                          <div class="card-body">
                              <div class="row">
                                  <div class="col">
                                      <span><strong style="color: goldenrod">Subtotal:</strong></span>
                                      <span class="ammount"><strong>€51.43</strong></span>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <br>
                      <div>
                          <a href="{{route('user.thankyou')}}" class="btn btn-primary">Complete Order</a>
                          <a href="{{route('user.items.index')}}" class="btn btn-outline-primary btn-block btn-sm"
                           style="text-transform: none;">Continue Shopping</a>

                      </div>
                     
                  </div>
              </div>
          </div>
      </li>
  </ul>
  
  
  <!--end cart -->
  


 @php
            $flagArr = [
                'en' => 'flag-icon flag-icon-us',
                'ar' => 'flag-icon flag-icon-sa',
                'de' => 'flag-icon flag-icon-de',
            ];
        @endphp



        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="{{ $flagArr[app()->getLocale()] }} mt-1" title="us"></i> <span class="ms-1 me-1 d-none d-md-inline-block">{{ __('translation.' . app()->getLocale()) }}</span>
                </a>
                 <div class="dropdown-menu" aria-labelledby="languageDropdown">
                    <a href="{{ route('changelang', ['lang' => 'en']) }}" class="dropdown-item py-2"><i
                            class="flag-icon flag-icon-us" title="us" id="us"></i> <span class="ms-1">
                            English </span></a>
                    <a href="{{ route('changelang', ['lang' => 'ar']) }}" class="dropdown-item py-2"><i
                            class="flag-icon flag-icon-sa" title="sa" id="sa"></i> <span class="ms-1">
                            Arabic </span></a>
                    <a href="{{ route('changelang', ['lang' => 'de']) }}" class="dropdown-item py-2"><i
                            class="flag-icon flag-icon-de" title="de" id="de"></i> <span class="ms-1">
                            German </span></a>

                </div>
</li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="mail"></i>
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="messageDropdown">
                    <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                        <p>9 New Messages</p>
                        <a href="javascript:;" class="text-muted">Clear all</a>
                    </div>
    <div class="p-1">
      <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
        <div class="me-3">
          <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
        </div>
        <div class="d-flex justify-content-between flex-grow-1">
          <div class="me-4">
            <p>Leonardo Payne</p>
            <p class="tx-12 text-muted">Project status</p>
          </div>
          <p class="tx-12 text-muted">2 min ago</p>
        </div>
      </a>
      <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
        <div class="me-3">
          <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
        </div>
        <div class="d-flex justify-content-between flex-grow-1">
          <div class="me-4">
            <p>Carl Henson</p>
            <p class="tx-12 text-muted">Client meeting</p>
          </div>
          <p class="tx-12 text-muted">30 min ago</p>
        </div>
      </a>
      <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
        <div class="me-3">
          <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
        </div>
        <div class="d-flex justify-content-between flex-grow-1">
          <div class="me-4">
            <p>Jensen Combs</p>
            <p class="tx-12 text-muted">Project updates</p>
          </div>
          <p class="tx-12 text-muted">1 hrs ago</p>
        </div>
      </a>
      <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
        <div class="me-3">
          <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
        </div>
        <div class="d-flex justify-content-between flex-grow-1">
          <div class="me-4">
            <p>Mohammed Jameel</p>
            <p class="tx-12 text-muted">Project deatline</p>
          </div>
          <p class="tx-12 text-muted">2 hrs ago</p>
        </div>
      </a>
      <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
        <div class="me-3">
          <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
        </div>
        <div class="d-flex justify-content-between flex-grow-1">
          <div class="me-4">
            <p>Yaretzi Mayo</p>
            <p class="tx-12 text-muted">New record</p>
          </div>
          <p class="tx-12 text-muted">5 hrs ago</p>
        </div>
      </a>
    </div>
                    <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
                        <a href="javascript:;">View all</a>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="wd-30 ht-30 rounded-circle" src="{{ asset('elkhawas/elkhawas_images/9.jpg') }}" alt="profile">
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                        <div class="mb-3">
                            <img class="wd-80 ht-80 rounded-circle" src="{{ asset('elkhawas/elkhawas_images/9.jpg') }}" alt="not found">
                        </div>
                        <div class="text-center">
                            <p class="tx-16 fw-bolder">{{ Auth::guard('web')->user()->name }}</p>
                            <p class="tx-12 text-muted">{{ Auth::guard('web')->user()->email }}</p>
                        </div>
                    </div>
    <ul class="list-unstyled p-1">
      <li class="dropdown-item py-2">
        <a href="" class="text-body ms-0">
          <i class="me-2 icon-md" data-feather="user"></i>
          <span>Profile</span>
        </a>
      </li>

      <li class="dropdown-item py-2">
        <a href="#" style="display: block;" class="text-body ms-0" onclick="event.preventDefault(); $('#logout-form').submit();">
          <i class="me-2 icon-md" data-feather="log-out"></i>
          <span>{{ __('translation.Log Out') }}</span>
          <form id="logout-form" action="{{ route('user.logout') }}" method="POST">
                @csrf
            </form>
        </a>
      </li>
    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
