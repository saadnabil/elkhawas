<!-- cart -->
<ul class="navbar-nav">
    <li class="nav-item position-relative">
        @php
            $cartitems = App\Models\Cart::with('item')->where('user_id', auth()->user()->id)->get();
            $result = 0;
        @endphp
        <button type="button" data-bs-toggle="offcanvas" data-bs-target="#demo" class="btn btn-light opencartsidebar">
            <span class="badge bg-danger position-absolute top-0">{{ count($cartitems) }}</span>
            <i style="font-size:22px;" class="fas fa-shopping-cart"></i>
        </button>
        <div class="offcanvas offcanvas-end" id="demo">
            <div class="offcanvas-header">
                <h1 class="offcanvas-title">Shopping Cart</h1>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <!-- start for each -->
                <div class="items col-12 clearfix">
                    <div class="info-block block-info clearfix">
                        <div class="items col-12 clearfix">
                            @foreach($cartitems as $key => $cartitem)
                            <div class="info-block block-info clearfix mb-3">
                                <div class="square-box float-start " style="margin-right:5px;">
                                    <img src="{{ url('storage/'.$cartitem->item->image )  }}" style="width: 100%;"
                                        alt="" class="productImage">
                                </div>
                                <br>
                                <div class="product-item ">
                                    <ul class="list-unstyled">
                                        <li style="">
                                            <strong style="">{{ $cartitem->item->title }} <br/> <span style="color: goldenrod"> {{ $cartitem->quantity }} x
                                                    €{{ $cartitem->item->total_price }}</span></strong>
                                        </li>
                                    </ul>
                                    <br>
                                    <div class="buttondiv">
                                        <button data-route="{{ route('carts.minus', $cartitem) }}" class="cartbutton minus-quantity" type="button"
                                            style="">
                                            <span class="btn-cart-icon " ><i class="fa fa-minus"></i></span>
                                        </button>
                                        <button data-route="{{ route('carts.plus', $cartitem) }}" class="cartbutton plus-quantity" type="button"
                                            style="">
                                            <span class="btn-cart-icon" ><i class="fa fa-plus"></i></span>
                                        </button>
                                        <button data-route="{{ route('carts.remove', $cartitem) }}" class="cartbutton delete-item" type="button"
                                            style="">
                                            <span class="btn-cart-icon">  <i class="fas fa-trash-alt"></i></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @php
                                $result += $cartitem->quantity * $cartitem->item->total_price;
                            @endphp
                            @endforeach
                            <hr>
                            <!-- Add more items here -->
                            <div id="totalPrices">
                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <span><strong style="color: goldenrod">Subtotal:</strong></span>
                                                <span class="ammount"><strong>€{{ $result }}</strong></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div>
                                    <a href="" class="btn btn-primary">Complete Order</a>
                                    <a href="" class="btn btn-outline-primary btn-block btn-sm"
                                        style="text-transform: none;">Continue Shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </li>
</ul>
