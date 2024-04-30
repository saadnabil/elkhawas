@extends('layout.usermaster')
@section('content')
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="h5 mb-0 pt-2 pb-2">
                                <i class="feather icon" data-feather="heart"></i>
                                {{ __('translation.Wishlist') }}</h2>
                        </div>
                        <div class="card-body p-4 wishlist-items">
                            @include('user.wishlists.wishlist-items')
                        </div>
                    </div>
                </div>
            </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $(document).on('click','.deletewishlist',function(e){
                e.preventDefault();
                let form = $('form#deletewishlist')[0];
                let data = new FormData(form);
                var url = $(this).data('route');
                $.ajax({
                    url: url,
                    method: 'POST',
                    processData : false,
                    contentType:false,
                    data:data,
                    success:function(response)
                    {
                        $('.wishlist-items').html(response);
                    },
                    error: function(response) {
                        alert('error')
                    }
                });
            });
        });
    </script>
@endpush
