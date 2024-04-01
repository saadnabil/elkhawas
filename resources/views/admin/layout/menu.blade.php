<nav class="sidebar">
    <div class="sidebar-header">
      <a href="#" class="sidebar-brand">
        Elkawas   <span>LTD</span>
        {{-- <img width="160" height="60" src="{{ asset('elkhawas/elkhawas_images/elkhawas.png') }}" /> --}}

      </a>
      <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="sidebar-body">
      <ul class="nav">


        <li class="nav-item nav-category">Main</li>


        <li class="nav-item nav-category">Dashboard</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#dashboard" role="button" aria-expanded="false" aria-controls="dashboard">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Dashboard</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="dashboard">
            <ul class="nav sub-menu">

              <li class="nav-item">
                <a href="/admin/home" class="nav-link">Dashboard</a>
              </li>


              <li class="nav-item">
                <a href="/admin/product/index" class="nav-link">Product List</a>
              </li>


              
             
             
            </ul>
          </div>
        </li>
        


       


        <li class="nav-item nav-category">Orders</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#order" role="button" aria-expanded="false" aria-controls="order">
            <i class="link-icon" data-feather="shopping-bag"></i>
            <span class="link-title">Orders</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="order">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="/order" class="nav-link">Show Orders</a>
              </li>


              <li class="nav-item">
                <a href="/showtracking" class="nav-link">Track/Change Orders </a>
              </li>
             
             
            </ul>
          </div>
        </li>
        
       
       

     

        
      
        <li class="nav-item nav-category">Settings</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#setting" role="button" aria-expanded="false" aria-controls="setting">
            <i class="link-icon" data-feather="settings"></i>
            <span class="link-title">Setting</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="setting">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="/profile" class="nav-link">Setting</a>

              </li>
             
              {{-- <li class="nav-item">
                <a href="" class="nav-link">Change Password</a>

              </li> --}}


            </ul>
          </div>
        </li>



       
       
       
        <li class="nav-item nav-category">Users</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#user" role="button" aria-expanded="false" aria-controls="user">
            <i class="link-icon" data-feather="user"></i>
            <span class="link-title">User</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="user">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="/admin/users/" class="nav-link">Show User</a>

              </li>
             
              


            </ul>
          </div>
        </li>


        <li class="nav-item nav-category">Pages</li>
        <li class="nav-item">
          <a href="/contactUs"  class="nav-link">
            {{-- <i class="link-icon" data-feather="unlock"></i> --}}
           <i class="link-icon" data-feather="message-circle"></i>

            <span class="link-title">Contact Us</span>
          </a>
        </li>



        <li class="nav-item nav-category">Logout</li>
        <li class="nav-item">
          <a href="/auth"  class="nav-link">
            {{-- <i class="link-icon" data-feather="unlock"></i> --}}
           <i class="link-icon" data-feather="log-out"></i>

            <span class="link-title">Logout</span>
          </a>
        </li>
      </ul>
    </div>
  </nav>