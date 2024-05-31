<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == "ar" ? 'rtl' : 'ltr' }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Elkhawas">
	<meta name="author" content="Elkhawas">
	<meta name="keywords" content="Elkhawas Company">

	<title>Elkhawas company</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

	<!-- core:css -->


	<link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendors/flatpickr/flatpickr.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Include Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />



	<!-- endinject -->

	<!-- Plugin css for this page -->
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
	<!-- endinject -->

  <!-- Layout styles -->
  @if ( app()->getLocale() == "ar"  )
	<link rel="stylesheet" href="{{ asset('assets/css/demo1/style-rtl.css') }}">
  @else
	<link rel="stylesheet" href="{{ asset('assets/css/demo1/style.css') }}">
  @endif
  <!-- End layout styles -->

  <link rel="shortcut icon" href="{{ asset('elkhawas/elkhawas_images/tree logo.png') }}" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@latest/dist/sweetalert2.min.css">
<body>

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

@stack('style')



	<div class="main-wrapper">


<div class="spinner-overlay" id="spinner">
        <img src="{{ asset('elkhawas/elkhawas_images/tree logo.png') }}" alt="Loading Spinner" class="spinner-img">
    </div>


		<!-- partial:../../partials/_sidebar.html -->


		@include('layout.adminmenu')


		<nav class="settings-sidebar">
			<div class="sidebar-body">
			  <a href="#" class="settings-sidebar-toggler">
				<i data-feather="settings"></i>
			  </a>
			  <h6 class="text-muted mb-2">Sidebar:</h6>
			  <div class="mb-3 pb-3 border-bottom">
				<div class="form-check form-check-inline">
				  <label class="form-check-label">
					<input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight" value="sidebar-light" checked>
					Light
				  </label>
				</div>
				<div class="form-check form-check-inline">
				  <label class="form-check-label">
					<input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark" value="sidebar-dark">
					Dark
				  </label>
				</div>
			  </div>
			  {{-- <div class="theme-wrapper">
				<h6 class="text-muted mb-2">Light Version:</h6>

				<a class="theme-item active" href="{{ asset('assets/css/demo1/style.css') }}">
				  <img src="{{ asset('assets/images/screenshots/light.jpg') }}" alt="light version">
				</a>
				<h6 class="text-muted mb-2">Dark Version:</h6>
				<a class="theme-item" href="{{ asset('assets/css/demo2/style.css') }}">
				  <img src="{{ asset('assets/images/screenshots/dark.jpg') }}" alt="light version">
				</a>
			  </div> --}}
			</div>
		  </nav>
		<!-- partial -->

		<div class="page-wrapper">

			@include('layout.adminnavbar')

			<div class="page-content">
				@yield('content')
			</div>

			@include('layout.footer')

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
	<script src="{{ asset('assets/vendors/flatpickr/flatpickr.min.js') }}"></script>

	<!-- endinject -->
	{{-- <script src="{{ asset('assets/vendors/apexcharts/apexcharts.min.js') }}"></script> --}}

	<!-- Plugin js for this page -->
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="{{ asset('assets/vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('assets/js/template.js') }}"></script>
	<script src="{{ asset('assets/js/dashboard-dark.js') }}"></script>
	<script src="{{ asset('assets/js/dashboard-light.js') }}"></script>
	<script src="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
	<script src="{{ asset('assets/js/sweet-alert.js') }}"></script>
	<script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
	<script src="{{ asset('assets/js/data-table.js') }}"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <!-- Include Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#mySelect2').select2({
                placeholder:"{{ __('translation.Select') }}",
                allowClear: true,
            });
             // Handle "Select All" functionality
        $('#mySelect2').on('select2:select', function (e) {
            if (e.params.data.id === 'select_all') {
                // Select all options
                var allOptions = [];
                $('#mySelect2 option').each(function() {
                    if (this.value !== 'select_all') {
                        allOptions.push(this.value);
                    }
                });
                $('#mySelect2').val(allOptions).trigger('change');
            }
        });

        // Ensure "Select All" gets deselected when deselecting any option
        $('#mySelect2').on('select2:unselect', function (e) {
            if (e.params.data.id === 'select_all') {
                $('#mySelect2').val(null).trigger('change');
            }
        });
        });
    </script>
    @include('layout.alert')

    @stack('script')

	<!-- endinject -->
	<!-- Custom js for this page -->
  <!-- End custom js for this page -->
</body>
</html>
