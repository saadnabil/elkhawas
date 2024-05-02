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
                <input type="text" name="search" class="form-control" id="navbarForm" placeholder="{{ __('translation.Search here...') }}">
            </div>
        </form>  --}}

        @if(!in_array(request()->url() , [route('carts.details'), route('carts.checkoutform')]))
        <section class="" id="usercart" style="padding-top: 10px;">
            @include('layout.usercart')
        </section>
        @endif



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

                $messages = App\Models\InqueryAdminMessage::orderBy('created_at', 'desc')->get();
                $unreadMessagesCount = $messages->where('is_read', 0)->count();

            @endphp

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="mail"></i>
                    <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">
                         {{ $unreadMessagesCount }}
                    </span>
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="messageDropdown">
                    <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                        <p>( {{$unreadMessagesCount}} ) New Messages</p>
                        {{-- <a href="javascript:;" class="text-muted">Clear all</a> --}}
                    </div>

                    @foreach ($messages as $message)

                    <div class="p-1">
                        <a href="{{route('user.indexMessageUser', ['admin_id' => $message->admin_id, 'message_id' => $message->id])}}" class="dropdown-item d-flex align-items-center py-2">
                            <div class="me-3">
                                <img class="wd-30 ht-30 rounded-circle"
                                    src="{{ $message->user && $message->user->image
                                            ? asset('images/' . $message->user->image)
                                            : asset('elkhawas/elkhawas_images/tree logo.png') }}" alt="userr">
                            </div>
                            <div class="d-flex justify-content-between flex-grow-1">
                                <div class="me-4">
                                    <p>{{ $message->admin ? $message->admin->name : 'Unknown admin' }} </p>

                                    <p class="tx-12 text-muted">
                                       {{ $message->admin ? $message->subject : 'Subject not available' }} </p>
                                </div>
                                <p class="tx-12 text-muted"> {{ $message->created_at->diffForHumans() }}</p>
                            </div>
                        </a>

                    </div>
                    @endforeach
                    <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
                         <form action="{{route('user.deleteAllReadMessages')}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete All Read Messages</button>
                        </form>
                    </div>
                </div>
            </li>
            @php
                $currentUser = auth()->guard('web')->user(); // Get the currently authenticated user
            @endphp

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if ($currentUser && $currentUser->image)
                        <img class="wd-30 ht-30 rounded-circle" src="{{ asset('images/' . $currentUser->image) }}"
                            alt="profile">
                    @endif
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                        <div class="mb-3">
                            @if ($currentUser && $currentUser->image)
                                <img class="wd-80 ht-80 rounded-circle"
                                    src="{{ asset('images/' . $currentUser->image) }}" alt="not found">
                            @endif
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
                            <a href="#" style="display: block;" class="text-body ms-0"
                                onclick="event.preventDefault(); $('#logout-form').submit();">
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
