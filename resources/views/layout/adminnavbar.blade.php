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
            {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="grid"></i>
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="appsDropdown">
    <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                        <p class="mb-0 fw-bold">Web Apps</p>
                        <a href="javascript:;" class="text-muted">Edit</a>
                    </div>
    <div class="row g-0 p-1">
      <div class="col-3 text-center">
        <a href="../../pages/apps/chat.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="message-square" class="icon-lg mb-1"></i><p class="tx-12">Chat</p></a>
      </div>
      <div class="col-3 text-center">
        <a href="../../pages/apps/calendar.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="calendar" class="icon-lg mb-1"></i><p class="tx-12">Calendar</p></a>
      </div>
      <div class="col-3 text-center">
        <a href="../../pages/email/inbox.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="mail" class="icon-lg mb-1"></i><p class="tx-12">Email</p></a>
      </div>
      <div class="col-3 text-center">
        <a href="../../pages/general/profile.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="instagram" class="icon-lg mb-1"></i><p class="tx-12">Profile</p></a>
      </div>
    </div>
                    <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
                        <a href="javascript:;">View all</a>
                    </div>
                </div>
            </li> --}}
            {{-- <li class="nav-item dropdown">
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
            </li> --}}


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
                            <a href="/profile" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="user"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                        {{-- <li class="dropdown-item py-2">
        <a href="javascript:;" class="text-body ms-0">
          <i class="me-2 icon-md" data-feather="edit"></i>
          <span>Edit Profile</span>
        </a>
      </li> --}}
                        <li class="dropdown-item py-2">
                            <a href="/users/home" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="repeat"></i>
                                <span>Switch User</span>
                            </a>
                        </li>
                        <li style="cursor:pointer;" onclick="event.preventDefault(); $('#logout-form').submit();"
                            class="dropdown-item py-2">
                            <a class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="log-out"></i>
                                <span>{{ __('translation.Log Out') }}</span>
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
