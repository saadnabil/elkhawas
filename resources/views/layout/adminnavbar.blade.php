<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        {{--  <form class="search-form">
            <div class="input-group">
                <div class="input-group-text">
                    <i data-feather="search"></i>
                </div>
                <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
            </div>
        </form>  --}}

        @php
            $flagArr = [
                'en' => 'flag-icon flag-icon-us',
                'ar' => 'flag-icon flag-icon-sa',
                'de' => 'flag-icon flag-icon-de',
            ];
        @endphp

        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="{{ $flagArr[app()->getLocale()] }} mt-1" title="us"></i> <span
                        class="ms-1 me-1 d-none d-md-inline-block">{{ __('translation.' . app()->getLocale()) }}</span>
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


            @php

                $messages = App\Models\Inquiry::orderBy('created_at', 'desc')->get();
                $unreadMessagesCount = $messages->where('is_read', 0)->count();

            @endphp
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-mail">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    <!-- Badge to indicate unread messages -->
                    <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">
                        {{ $unreadMessagesCount }}
                    </span>
                </a>

                <div class="dropdown-menu p-0" aria-labelledby="messageDropdown">
                    <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                        <p> ( {{ $unreadMessagesCount }}) New Messages</p>
                        {{-- <a href="javascript:;" class="text-muted">  {{ $inqyey->links('pagination::bootstrap-5') }}</a> --}}
                    </div>

                    @foreach ($messages as $message)
                        <div class="p-1">

                            <a href="{{ route('admin.indexMessage', ['user_id' => $message->user_id, 'message_id' => $message->id]) }}"
                                class="dropdown-item d-flex align-items-center py-2">
                                <div class="me-3">
                                    <img class="wd-30 ht-30 rounded-circle"
                                        src="{{ $message->user && $message->user->image
                                            ? asset('images/' . $message->user->image)
                                            : asset('images/default/no-image.png') }}"
                                        alt="No image available">


                                </div>
                                <div class="d-flex justify-content-between flex-grow-1">
                                    <div class="me-4">
                                        <p>{{ $message->user ? $message->user->name : 'Unknown User' }}</p>

                                        <p class="tx-12 text-muted">
                                            {{ $message->user ? $message->subject : 'Subject not available' }}</p>
                                    </div>
                                    <p class="tx-12 text-muted">{{ $message->created_at->diffForHumans() }}</p>
                                </div>
                            </a>


                        </div>
                    @endforeach

                    <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
                        <form action="{{ route('admin.deleteAllReadMessages') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete All Read Messages</button>
                        </form>
                    </div>

                </div>
            </li>




            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="wd-30 ht-30 rounded-circle" src="{{ asset('elkhawas/elkhawas_images/9.jpg') }}"
                        alt="profile">
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                        <div class="mb-3">
                            <img class="wd-80 ht-80 rounded-circle" src="{{ asset('elkhawas/elkhawas_images/9.jpg') }}"
                                alt="not found">
                        </div>
                        <div class="text-center">
                            <p class="tx-16 fw-bolder">{{ Auth::guard('admin')->user()->name }}</p>
                            <p class="tx-12 text-muted">{{ Auth::guard('admin')->user()->email }}</p>
                        </div>
                    </div>
                    <ul class="list-unstyled p-1">
                        <li class="dropdown-item py-2">
                            <a href="{{route('admins.index')}}" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="user"></i>
                                <span>{{__('translation.Profile ')}}</span>
                            </a>
                        </li>
                        {{-- <li class="dropdown-item py-2">
        <a href="javascript:;" class="text-body ms-0">
          <i class="me-2 icon-md" data-feather="edit"></i>
          <span>Edit Profile</span>
        </a>
      </li> --}}
                        {{-- <li class="dropdown-item py-2">
                            <a href="/users/home" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="repeat"></i>
                                <span>Switch User</span>
                            </a>
                        </li> --}}
                        <li style="cursor:pointer;" onclick="event.preventDefault(); $('#logout-form').submit();"
                            class="dropdown-item py-2">
                            <a class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="log-out"></i>
                                <span>{{ __('translation.Logout') }}</span>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
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
