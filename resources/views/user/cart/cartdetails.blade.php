@extends('layout.usermaster')
@section('content')
    <div id="cartcomponentsection" class="row">
        @include('user.cart.cartcomponent')
    </div>
@endsection
@push('script')


<script>
    $(document).ready(function() {
        $(document).on('click', 'button.applycoupon', function(e) {
            e.preventDefault();
            // Serialize the form data
            let form = $('#applycoupon')[0];
            let data = new FormData(form);
            var url = "{{ route('carts.applycoupon') }}";
            $.ajax({
                url: url,
                method: 'POST',
                data: data,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#cartcomponentsection').html(response);
                },
                error: function(xhr) {
                    var errors = xhr.responseJSON;
                    var errorresult = '';
                    $.each(errors.errors, function(key, value) {
                        errorresult += `<div class="alert alert-danger" role="alert">${value}</div>`;
                    });
                    $('.addresserrors').html(errorresult);
                }
            });
        });
        $(document).on('submit','#applycoupon',function(e){
            e.preventDefault();
            // Serialize the form data
            let form = $('#applycoupon')[0];
            let data = new FormData(form);
            var url = "{{ route('carts.applycoupon') }}";
            $.ajax({
                url: url,
                method: 'POST',
                data: data,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#cartcomponentsection').html(response);
                },
                error: function(xhr) {
                    var errors = xhr.responseJSON;
                    var errorresult = '';
                    $.each(errors.errors, function(key, value) {
                        errorresult += `<div class="alert alert-danger" role="alert">${value}</div>`;
                    });
                    $('.addresserrors').html(errorresult);
                }
            });
        });
        $(document).on('click','.disapplycoupon',function(e){
            e.preventDefault();
            var url = $(this).data('route');
            $.ajax({
                url: url,
                method: 'GET',
                processData : false,
                contentType:false,
                success:function(response)
                {
                    $('#cartcomponentsection').html(response);
                },
                error: function(response) {
                    alert('error')
                }
            });
        });



    });
</script>
@endpush
