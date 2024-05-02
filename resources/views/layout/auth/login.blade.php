<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ __('translation.Company Name') }}">
    <meta name="author" content="{{ __('translation.Company Name') }}">
    <meta name="keywords" content="{{ __('translation.Company Name') }}">
    <title>{{ __('translation.Company Name') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css') }}">
    <!-- Plugin CSS for this page -->
    <!-- End plugin CSS for this page -->
    <!-- Injected CSS -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- End injected CSS -->
    <!-- Layout Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo2/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('elkhawas/elkhawas_images/tree_logo.png') }}" />
    <style>
        .spinner-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .spinner-img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>

<body>
    <div class="spinner-overlay" id="spinner">
        <img src="{{ asset('elkhawas/elkhawas_images/tree logo.png') }}" alt="Loading Spinner" class="spinner-img">
    </div>

    @php
        $flagArr = [
            'en' => 'flag-icon flag-icon-us',
            'ar' => 'flag-icon flag-icon-sa',
            'de' => 'flag-icon flag-icon-de',
        ];
    @endphp




    <div class="main-wrapper">



        <div class="page-wrapper full-page">

            <div class="page-content d-flex align-items-center justify-content-center">
                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-8 col-xl-6 mx-auto">

                        <div class="card">

                            <!-- Language Dropdown -->

                           
    <div class="card-body">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="languageDropdown"
                    role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="{{ $flagArr[app()->getLocale()] }} mt-1"
                        title="{{ app()->getLocale() }}"></i> <span
                        class="ms-1 me-1 d-none d-md-inline-block">{{ __('translation.' . app()->getLocale()) }}</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="languageDropdown">
                    <a href="{{ route('changelang', ['lang' => 'en']) }}"
                        class="dropdown-item py-2"><i class="flag-icon flag-icon-us" title="us"
                            id="us"></i> <span class="ms-1">English</span></a>
                    <a href="{{ route('changelang', ['lang' => 'ar']) }}"
                        class="dropdown-item py-2"><i class="flag-icon flag-icon-sa" title="sa"
                            id="sa"></i> <span class="ms-1">Arabic</span></a>
                    <a href="{{ route('changelang', ['lang' => 'de']) }}"
                        class="dropdown-item py-2"><i class="flag-icon flag-icon-de" title="de"
                            id="de"></i> <span class="ms-1">German</span></a>
                </div>
            </li>
        </ul>
    </div>



                            <div class="row align-items-center">

                                <div class="col-md-4 pe-md-0 text-center">
                                    <img src="{{ asset('elkhawas/elkhawas_images/tree logo.png') }}" height="200px"
                                        width="100%" />
                                </div>
                                <div class="col-md-8 ps-md-0">

                                    <!-- Authentication Form -->
                                    <div class="auth-form-wrapper px-4 py-5">
                                        <h3 style="color: goldenrod;" href="#"
                                            class="noble-ui-logo logo-light d-block mb-2">ELKHAWAS TRADE GMBH</h3>
                                        <h5 class="text-muted fw-normal mb-4">
                                            {{ __('translation.Welcome back! Log in to your account') }}</h5>
                                        <form action="{{ $route }}" method="POST" autocomplete="off"
                                            class="forms-sample">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="login"
                                                    class="form-label">{{ __('translation.Enter your phone or email') }}</label>
                                                <input required name="login" type="text" class="form-control"
                                                    id="login"
                                                    placeholder="{{ __('translation.Enter your phone or email') }}">
                                                @error('login')
                                                    <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="password"
                                                    class="form-label">{{ __('translation.Password') }}</label>
                                                <input required name="password" type="password" class="form-control"
                                                    id="Password" autocomplete="current-password"
                                                    placeholder="{{ __('translation.Password') }}">
                                                <div class="form-group mt-1">
                                                    <a href="{{route('admin.forgotpassword')}}" class="text-primary small">Forgot Password?</a>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="submit"
                                                    class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">{{ __('translation.Login') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('load', function() {
            // Hide the spinner once the page is fully loaded
            document.getElementById('spinner').style.display = 'none';
        });
    </script>
    <!-- Core JavaScript -->
    <script src="{{ asset('assets/vendors/core/core.js') }}"></script>
    <!-- End core JavaScript -->
    <!-- Plugin JavaScript for this page -->
    <!-- End plugin JavaScript for this page -->
    <!-- Injected JavaScript -->
    <script src="{{ asset('assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <!-- End injected JavaScript -->
</body>

</html>
