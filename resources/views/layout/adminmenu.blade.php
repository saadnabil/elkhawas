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

            @can('dashboard')
              <li class="nav-item">
                <a href="{{route('admin.dashboard.index')}}" class="nav-link">{{ __('translation.Dashboard') }}</a>
              </li>
            @endcan

            @can('item-list')
              <li class="nav-item">
                <a href="{{ route('admin.items.index') }}" class="nav-link">{{ __('translation.Items list') }}</a>
              </li>
            @endcan

            @can('item-type-list')
              <li class="nav-item">
                <a href="{{ route('itemtypes.index') }}" class="nav-link">{{ __('translation.Items types list') }}</a>
              </li>
            @endcan

            @can('item-tax-list')
            <li class="nav-item">
              <a href="{{ route('itemtaxes.index') }}" class="nav-link">{{ __('translation.Items taxes list') }}</a>
            </li>
          @endcan

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

              @can('order-list')
                <li class="nav-item">
                  <a href="{{ route('admin.orders.index') }}" class="nav-link">{{ __('translation.Show Orders') }}</a>
                </li>
              @endcan

              @can('coupon-list')
                <li class="nav-item">
                  <a href="{{ route('admin.coupons.index') }}" class="nav-link">{{ __('translation.Coupons') }}</a>
                </li>
              @endcan

            </ul>
          </div>
        </li>


        <li class="nav-item nav-category">{{ __('translation.Admins') }}</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#setting" role="button" aria-expanded="false" aria-controls="setting">
            <i class="link-icon" data-feather="settings"></i>
            <span class="link-title">{{ __('translation.Admin Jobs') }}</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="setting">
            <ul class="nav sub-menu">
            @can('admin-list')
              <li class="nav-item">
                <a href="{{ route('admins.index') }}" class="nav-link">{{ __('translation.Admin List') }}</a>
              </li>
              @endcan

              @can('role-list')
              <li class="nav-item">
                <a href="{{ route('roles.index') }}" class="nav-link">{{ __('translation.Roles') }}</a>
              </li>
              @endcan


            </ul>
          </div>
        </li>





        @can('user-list')
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
        @endcan


        <li class="nav-item nav-category">{{ __('translation.Support') }}</li>
        @can('ticket-list')
        <li class="nav-item">
          <a href="{{ route('tickets.index') }}"  class="nav-link">
            <i class="fas fa-headset"></i>
            <span class="link-title">{{ __('translation.Manage support tickets') }}</span>
          </a>
        </li>
        @endcan

        @can('ticket-my')
        <li class="nav-item">
            <a href="{{ route('tickets.me') }}"  class="nav-link">
                <i class="fas fa-ticket-alt"></i>
              <span class="link-title">{{ __('translation.My support tickets') }}</span>
            </a>
          </li>
          @endcan

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

            <span onclick="event.preventDefault(); $('#logout-form').submit();" class="link-title">{{ __('translation.Logout') }}</span>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                @csrf
            </form>
          </a>
        </li>
      </ul>
    </div>
  </nav>
