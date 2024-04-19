<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Elkhawas">
	<meta name="author" content="Elkhawas">
	<meta name="keywords" content="Elkhawas Company">

	<title> Users Elkhawas </title>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
<!-- End fonts -->
<link href="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}
  <!-- core:css -->

	<link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendors/flatpickr/flatpickr.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">


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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <style>
    .cartbutton{
        width:32px;
        height:32px;
        border-radius:50%;
        color: #8898aa;
        border: 0.0625rem solid #dee2e6;
        font-size: 10px;
        border-width:1px;
        background:#fff;
        display: inline-block;
        margin-left: 5px;
    }
    .cartbutton:hover{
        background:#ccc;
        color:#fff;
        transition: .3s;
    }
  </style>


</head>
<body>

	<div class="main-wrapper">

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
	<img class="animation__wobble" src="{{ asset('elkhawas/elkhawas_images/tree logo.png') }}" alt="Elkhawas" height="60" width="60">
  </div>
		<!-- partial:../../partials/_sidebar.html -->

		@include('layout.usermenu')


		{{-- <nav class="settings-sidebar">
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
			  <div class="theme-wrapper">
				<h6 class="text-muted mb-2">Light Version:</h6>

				<a class="theme-item active" href="{{ asset('assets/css/demo1/style.css') }}">
				  <img src="{{ asset('assets/images/screenshots/light.jpg') }}" alt="light version">
				</a>
				<h6 class="text-muted mb-2">Dark Version:</h6>
				<a class="theme-item" href="{{ asset('assets/css/demo2/style.css') }}">
				  <img src="{{ asset('assets/images/screenshots/dark.jpg') }}" alt="light version">
				</a>
			  </div>
			</div>
		  </nav>  --}}
		<!-- partial -->

		<div class="page-wrapper">

			<!-- partial:../../partials/_navbar.html -->
			@include('layout.usernavbar')
			<!-- partial -->

			<div class="page-content">

				@yield('content')

			</div>

			<!-- partial:../../partials/_footer.html -->
			@include('layout.footer')
			<!-- partial -->

		</div>
	</div>

	<!-- core:js -->
	<script src="{{ asset('assets/vendors/core/core.js') }}"></script>
	<script src="{{ asset('assets/vendors/flatpickr/flatpickr.min.js') }}"></script>

	<script src="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>

	<script src="{{ asset('assets/js/sweet-alert.js') }}"></script>

	<!-- endinject -->
	{{-- <script src="{{ asset('assets/vendors/apexcharts/apexcharts.min.js') }}"></script> --}}

	<!-- Plugin js for this page -->
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="{{ asset('assets/vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('assets/js/template.js') }}"></script>
	<script src="{{ asset('assets/js/dashboard-dark.js') }}"></script>
	<script src="{{ asset('assets/js/dashboard-light.js') }}"></script>

	<script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
	<script src="{{ asset('assets/js/data-table.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    @stack('script')


    <script>
    $(document).ready(function(){
        $('.openmodal').click(function(){
            var description = $(this).data('description');
            var image = $(this).data('image');
            var title = $(this).data('title');
            var unit_price = $(this).data('unit_price');
            var total_price = $(this).data('total_price');
            var id = $(this).data('id');
            $('.modal').find('.description').text(description);
            $('.modal').find('.title').text(title);
            $('.modal').find('.image').attr('src' , image);
            $('.modal').find('.unit').text(unit_price);
            $('.modal').find('.total').text(total_price);
            $('.modal').find('input[name="item_id"]').val(id);
        });


        //carts operation
        $(document).on('click','button.plus-quantity',function(e){
            e.preventDefault();
            var url = $(this).data('route');
            $.ajax({
                url: url,
                method: 'GET',
                processData : false,
                contentType:false,
                success:function(response)
                {
                    if(response['route'] == 'cartsidebar'){
                        $('#usercart').html(response['view']);
                        $('.opencartsidebar').trigger('click');
                    }
                    else if(response['route'] == 'cartpagedetails'){
                        $('#cartcomponentsection').html(response['view']);
                    }
                },
                error: function(response) {
                    alert('error')
                }
            });
        });

        $(document).on('click','button.minus-quantity',function(e){
            e.preventDefault();
            var url = $(this).data('route');
            $.ajax({
                url: url,
                method: 'GET',
                processData : false,
                contentType:false,
                success:function(response)
                {
                    if(response['route'] == 'cartsidebar'){
                        $('#usercart').html(response['view']);
                        $('.opencartsidebar').trigger('click');
                    }
                    else if(response['route'] == 'cartpagedetails'){
                        $('#cartcomponentsection').html(response['view']);
                    }
                },
                error: function(response) {
                    alert('error')
                }
            });
        });

        $(document).on('click','button.delete-item',function(e){
            e.preventDefault();
            var url = $(this).data('route');
            $.ajax({
                url: url,
                method: 'GET',
                processData : false,
                contentType:false,
                success:function(response)
                {
                    if(response['route'] == 'cartsidebar'){
                        $('#usercart').html(response['view']);
                        $('.opencartsidebar').trigger('click');
                    }
                    else if(response['route'] == 'cartpagedetails'){
                        $('#cartcomponentsection').html(response['view']);
                    }
                },
                error: function(response) {
                    alert('error')
                }
            });
        });

        $(document).on('click', 'button.additem', function(e) {
            e.preventDefault();
            // Serialize the form data
            let form = $('#additem')[0];
            let data = new FormData(form);
            var url = "{{ route('carts.add') }}";
            $.ajax({
                url: url,
                method: 'POST',
                data: data,
                processData : false,
                contentType:false,
                success:function(response)
                {
                    $('.modal').modal('hide');

                    $('#usercart').html(response);

                    $('.opencartsidebar').trigger('click');
                },
                error: function(response) {
                    alert('error')
                }
            });
        });
        //carts operation
    });
</script>

@include('layout.alert')





	<!-- endinject -->

	<!-- Custom js for this page -->
  <!-- End custom js for this page -->
</body>
</html>
