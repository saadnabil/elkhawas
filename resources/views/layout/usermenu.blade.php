<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            Elkawas <span>Trade</span>
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

            <li class="nav-item">
                <a href="{{ route('user.items.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Items</span>
                </a>
            </li>

            <li class="nav-item nav-category">Orders</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#order" role="button" aria-expanded="false"
                    aria-controls="order">
                    <i class="link-icon" data-feather="shopping-bag"></i>
                    <span class="link-title">Orders</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="order">
                    <ul class="nav sub-menu">


                        <li class="nav-item">
                            <a href="{{ route('user.orders.index') }}" class="nav-link">{{ __('translation.Show Orders') }} </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('wishlist.index') }}" class="nav-link">{{ __('translation.Wishlist')  }} </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('coupons.index') }}" class="nav-link">{{ __('translation.Coupons') }} </a>
                        </li>

                    </ul>
                </div>
            </li>





            <li class="nav-item nav-category">Settings</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#setting" role="button" aria-expanded="false"
                    aria-controls="setting">
                    <i class="link-icon" data-feather="settings"></i>
                    <span class="link-title">Settings</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="setting">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('user.UserShowPassword') }}" class="nav-link">Change Password</a>

                        </li>

                        <li class="nav-item">
                            <a href="{{ route('user.showProfileImage') }}" class="nav-link">Change Profile Image</a>

                        </li>



                        {{-- <li class="nav-item">
                <a href="" class="nav-link">Change Password</a>

              </li> --}}


                    </ul>
                </div>
            </li>





            <li class="nav-item nav-category">Contact</li>


            <li class="nav-item">
                <a href="{{ route('user.support') }}" class="nav-link">
                    <i class="link-icon" data-feather="message-circle"></i>
                    <span class="link-title">{{ __('translation.Support') }}</span>
                </a>
            </li>




            <li class="nav-item nav-category">Logout</li>
            <li class="nav-item">
                <a href="/auth" class="nav-link">
                    {{-- <i class="link-icon" data-feather="unlock"></i> --}}
                    <i class="link-icon" data-feather="log-out"></i>

                    <span class="link-title">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
