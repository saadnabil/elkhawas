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


        <li class="nav-item nav-category">{{ __('translation.Main') }}</li>

        <li class="nav-item nav-category">{{ __('translation.Dashboard') }}</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#dashboard" role="button" aria-expanded="false" aria-controls="dashboard">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">{{ __('translation.Dashboard') }}</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="dashboard">
            <ul class="nav sub-menu">

              <li class="nav-item">
                <a href="{{route('admin.dashboard.index')}}" class="nav-link">{{ __('translation.Dashboard') }}</a>
              </li>


              <li class="nav-item">
                <a href="{{ route('admin.items.index') }}" class="nav-link">{{ __('translation.Product List') }}</a>
              </li>





            </ul>
          </div>
        </li>






        <li class="nav-item nav-category">{{ __('translation.Orders') }}</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#order" role="button" aria-expanded="false" aria-controls="order">
            <i class="link-icon" data-feather="shopping-bag"></i>
            <span class="link-title">{{ __('translation.Orders') }}</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="order">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{route('order')}}" class="nav-link">{{ __('translation.Show Orders') }}</a>
              </li>


              <li class="nav-item">
                <a href="{{route('orderTrack')}}" class="nav-link">{{ __('translation.Track/Change Orders') }} </a>
              </li>


            </ul>
          </div>
        </li>








        <li class="nav-item nav-category">{{ __('translation.Setting') }}</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#setting" role="button" aria-expanded="false" aria-controls="setting">
            <i class="link-icon" data-feather="settings"></i>
            <span class="link-title">{{ __('translation.Setting') }}</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="setting">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="/profile" class="nav-link">{{ __('translation.Setting') }}</a>

              </li>

              {{-- <li class="nav-item">
                <a href="" class="nav-link">Change Password</a>

              </li> --}}


            </ul>
          </div>
        </li>






        <li class="nav-item nav-category">{{ __('translation.user') }}</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#user" role="button" aria-expanded="false" aria-controls="user">
            <i class="link-icon" data-feather="user"></i>
            <span class="link-title">{{ __('translation.user') }}</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="user">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">{{ __('translation.showUser') }}</a>

              </li>




            </ul>
          </div>
        </li>


        <li class="nav-item nav-category">{{ __('translation.Pages') }}</li>
        <li class="nav-item">
          <a href="{{ route('ContactUs.index') }}"  class="nav-link">
            {{-- <i class="link-icon" data-feather="unlock"></i> --}}
           <i class="link-icon" data-feather="message-circle"></i>

            <span class="link-title">{{ __('translation.Contact Us') }}</span>
          </a>
        </li>

       <!--  <li class="nav-item">
          <a href="{{ route('ContactUs.index') }}"  class="nav-link">
            {{-- <i class="link-icon" data-feather="unlock"></i> --}}
          <i class="link-icon" data-feather="file-text"></i>


            <span class="link-title">Transaction History</span>
          </a>
        </li>-->



        <li class="nav-item nav-category">{{ __('translation.Log Out') }}</li>
        <li class="nav-item">
          <a href="{{route('admin.logout')}}"  class="nav-link">
            {{-- <i class="link-icon" data-feather="unlock"></i> --}}
           <i class="link-icon" data-feather="log-out"></i>

            <span class="link-title">{{ __('translation.Log Out') }}</span>
          </a>
        </li>
      </ul>
    </div>
  </nav>
