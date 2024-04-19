@extends('layout.usermaster')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Items</li>

        </ol>
    </nav>

    <div class="row" id="myProducts">
        <div style="float: right;">
            <div style="float: right; margin-left: 15px">
                <input id="myFilter" class="form-control" onkeyup="myFunction()" type="text"
                    placeholder="Search by  or name card" />
                {{--  need search by barcode too --}}
            </div>

        </div>





        <div class="mt-2">
            {{ $items->links() }}
        </div>

        @foreach ($items as $key => $item)
            <div class="col-sm-3">
                <div class="card">
                    <img src="{{ $item->image != null ? url('storage/' . $item->image) : url('item.png') }}"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }} <span class="badge bg-info">{{ $item->unit_price }}
                                €</span></h5>
                        <p class="card-text mb-3">Item Name: {{ $item->item_name}} </p>

                        <p class="card-text mb-3">Main Price: <span class="badge bg-primary"> {{ $item->total_price }}
                                €</span></p>
                        <button data-id="{{ $item->id }}" data-image="{{ $item->image != null ? url('storage/' . $item->image) : url('item.png') }}"  data-unit_price="{{ $item->unit_price}}"  data-total_price="{{ $item->total_price }}"  data-description="{{ $item->description }}" data-title="{{ $item->title }}" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            class="openmodal btn btn-primary">
                            <i class="link-icon" data-feather="shopping-cart"></i>
                        </button>

                        <button onclick="location.href='/orders/wishlist'" type="button" class="btn btn-danger">
                            <i class="feather icon" data-feather="heart"></i>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="mt-3">
            {{ $items->links() }}
        </div>
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
                                    <img  id="modalImg"
                                        src=""
                                        class="img-fluid image " alt=" Image Not Found">
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
                                            <li class="list-group-item " >Unit Price : <span class="unit"></span></li>
                                            <li class="list-group-item " >Total Price : <span class="total badge bg-primary"></span></li>
                                            <li class="list-group-item"> Units Number : {{ $item->units_number }}</li>
                                        </ul>
                                        <br>
                                        <div class="quantity-area">
                                            <div class="form-group">
                                                <label style="color: goldenrod" class="form-control-label"
                                                    for="quantity">Quantity</label>
                                                <form method="POST" id="additem" action="{{ route('carts.add') }}">
                                                    @csrf
                                                    <input type="number" name="quantity" id="quantity"
                                                        class="form-control form-control-alternative" min="1" name="quantity" placeholder="1"
                                                        value="1" required autofocus>
                                                        <input placeholder="item id" type="hidden" name="item_id" value=""/>
                                                </form>
                                            </div>
                                            <br>
                                            <div class="quantity-btn">
                                                <button type="submit" id="secondButton" form="additem" data-bs-toggle="offcanvas" data-bs-target="#demo"
                                                    class="btn btn-primary additem">Add To Cart</button>
                                            </div>

                                            <div class="offcanvas offcanvas-end"  id="demo">
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


