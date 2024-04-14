<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="__('translation.Company Name')">
    <meta name="author" content="__('translation.Company Name')">
    <meta name="keywords" content="__('translation.Company Name')">
    <title>{{ __('translation.Company Name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css') }}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo1/style.css') }}">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{ asset('elkhawas/elkhawas_images/tree logo.png') }}" />
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
		width: 100px; /* Adjust the width of the spinner image */
		height: 100px; /* Adjust the height of the spinner image */
	}
</style>
</head>
<body>
<div class="spinner-overlay" id="spinner">
        <img src="{{ asset('elkhawas/elkhawas_images/tree logo.png') }}" alt="Loading Spinner" class="spinner-img">
    </div>

    <div class="main-wrapper">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">

                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-8 col-xl-6 mx-auto">
                        <div class="card">
                            <div class="row align-items-center">
                                <div class="col-md-4 pe-md-0 text-center">
                                    <img src="{{ asset('elkhawas/elkhawas_images/elkhawas.png') }}" height="200px" width="100%" />
                                </div>
                                <div class="col-md-8 ps-md-0">
                                    <div class="auth-form-wrapper px-4 py-5">
                                        <h3 style="color: goldenrod;" href="#" class="noble-ui-logo logo-light d-block mb-2">ELKHAWAS TRADE GMBH</h3>
                                        <h5 class="text-muted fw-normal mb-4">{{ __('translation.Welcome back! Log in to your account') }}</h5>
                                        <form action="{{ $route }}" method="POST" autocomplete="off" class="forms-sample">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="login" class="form-label">{{ __('translation.Enter your phone or email') }} </label>
                                                <input required  name="login" type="text" class="form-control" id="login" placeholder="Phone Number | Email Address">
                                                @error('login')
                                                    <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="Password" class="form-label">{{ __('translation.Password') }}</label>
                                                <input required name="password" type="password" class="form-control" id="Password" autocomplete="current-password" placeholder="Password">
                                            </div>
                                            {{--  <div class="form-check mb-3">
                                                <input type="checkbox" class="form-check-input" id="authCheck">
                                                <label class="form-check-label" for="authCheck">
                                                    Remember me
                                                </label>
                                            </div>  --}}
                                            <div>
                                            <button type="submit" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                                                <i class="btn-icon-prepend" ></i>
                                                {{ __('translation.Login') }}
                                            </button>
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
    <!-- core:js -->
    <script src="{{ asset('assets/vendors/core/core.js') }}"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="{{ asset('assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
    <!-- End custom js for this page -->

</body>
</html>
