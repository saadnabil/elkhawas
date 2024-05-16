@extends('layout.usermaster')

@push('style')
    <style>
        /* Card Styles */
        .card {
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, 0.125);
            border-radius: 1rem;
        }

        /* Card Body Styles */
        .card-body {
            flex: 1 1 auto;
            padding: 1.5rem;
        }

        /* Image Container Styles */
        .image-container {
            height:40vh;
            width:100%;
            background-position:center;
             background-size:cover;
             background-repeat:no-repeat;
        }
    </style>

@endpush
@section('content')
    <div class="row" id="myProducts">
        @include('user.wishlists.wishlist-items')
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="modalTitle" class="modal-title title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="card shadow border-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="row">
                                <div class="col-lg-6 text-center" id="modalImgPart">
                                    <img id="modalImg" src="" class="img-fluid image " alt=" Image Not Found">
                                </div>
                                <div class="col-lg-6" id="modalItemDetailsPart">
                                    <input id="modalID" type="hidden">
                                    <div id="modalItemDetailsPart">
                                        <input id="modalID" type="hidden">
                                        <br>
                                        <h5 id="modalDescription"><strong>Description</strong> </h5>
                                        <p class="description"></p>
                                        <br>

                                        <ul class="list-group">
                                            <li class="list-group-item ">Unit Price : <span class="unit"></span></li>
                                            <li class="list-group-item ">Total Price : <span
                                                    class="total badge bg-primary"></span></li>
                                            <li class="list-group-item"> Units Number: <span class="units_number"></span>
                                            </li>
                                        </ul>
                                        <br>
                                        <div class="quantity-area">
                                            <div class="form-group">
                                                <label style="color: goldenrod" class="form-control-label"
                                                    for="quantity">Quantity</label>
                                                <form method="POST" id="additem" action="{{ route('carts.add') }}">
                                                    @csrf
                                                    <input type="number" name="quantity" id="quantity"
                                                        class="form-control form-control-alternative" min="1"
                                                        name="quantity" placeholder="1" value="1" required autofocus>
                                                    <input placeholder="item id" type="hidden" name="item_id"
                                                        value="" />
                                                </form>
                                            </div>
                                            <br>
                                            <div class="quantity-btn">
                                                <button type="submit" id="secondButton" data-route="{{ route('carts.add') }}" form="additem"
                                                    class="btn btn-primary additem">Add To Cart</button>
                                            </div>

                                            <div class="offcanvas offcanvas-end" id="demo">
                                                <!-- Offcanvas Modal Content -->
                                            </div>
                                        </div>
                                        <!-- Inform if closed -->
                                        <!-- End inform -->
                                    </div>
                                    <!-- Inform if closed -->
                                    <!-- End inform -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.openmodal' ,function(){
                var description = $(this).data('description');
                var image = $(this).data('image');
                var title = $(this).data('title');
                var unit_price = $(this).data('unit_price');
                var total_price = $(this).data('total_price');
                var units_number = $(this).data('units_number');
                var id = $(this).data('id');
                $('.modal').find('.description').text(description);
                $('.modal').find('.title').text(title);
                $('.modal').find('.image').attr('src', image);
                $('.modal').find('.unit').text(unit_price);
                $('.modal').find('.total').text(total_price);
                $('.modal').find('.units_number').text(units_number);
                $('.modal').find('input[name="item_id"]').val(id);
            });


            /*$(document).on('keyup', 'input[name="search"]', function(e) {
                e.preventDefault();
                var search = $(this).val();
                var url = `{{ route('user.items.index')}}?search=${search}`;
                $.ajax({
                    url: url,
                    method: 'GET',
                    data: {
                        search: search
                    },
                    processData: false,
                    contentType: false,
                    success: function(response) {
                       $('.itemscontainer').html(response);
                    },
                    error: function(response) {
                        alert('error')
                    }
                });
            });*/

            $(document).on('click', 'a.addwishlist', function(e) {
                e.preventDefault();
                var url = $(this).data('route');
                var element = $(this);
                $.ajax({
                    url: url,
                    method: 'GET',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response['status'] == 1) {
                            element.addClass('text-danger');
                        } else {
                            element.removeClass('text-danger');
                        }
                        $('#myProducts').html(response['view']);
                    },
                    error: function(response) {
                        alert('error')
                    }
                });
            });

        });
    </script>
@endpush


