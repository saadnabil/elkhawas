<!-- Cart -->
<ul class="navbar-nav">
    <li class="nav-item position-relative">
        @php
            $result = 0; // Initialize result variable
            $cartitems = App\Models\Cart::with('item')->where('user_id', auth()->user()->id)->get();
        @endphp
        <button type="button" data-bs-toggle="offcanvas" data-bs-target="#cartSidebar" class="btn btn-light opencartsidebar" aria-label="Open shopping cart">
            <span class="badge bg-danger position-absolute top-0">{{ $cartitems->count() }}</span>
            <i style="font-size:20px;" class="fas fa-shopping-cart"></i>
        </button>

        <!-- Offcanvas -->
        <div class="offcanvas offcanvas-end" id="cartSidebar" tabindex="-1" aria-labelledby="cartSidebarLabel">
            <div class="offcanvas-header">
                <h2 class="offcanvas-title" id="cartSidebarLabel">{{ __('translation.Shopping Cart') }}</h2>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body">
                @if ($cartitems->isNotEmpty())
                    <!-- start for each -->
                    <div class="items col-12 clearfix">
                        @foreach ($cartitems as $key => $cartitem)
                            <div class="info-block block-info clearfix mb-3">
                                <div class="square-box float-start" style="margin-right:5px;">
                                    <img src="{{ url('storage/'.$cartitem->item->image) }}" style="width: 100%;" alt="" class="productImage">
                                </div>
                                <br>
                                <div class="product-item">
                                    <ul class="list-unstyled">
                                        <li style="">
                                            <strong>{{ $cartitem->item->title[app()->getLocale()] }} <br/> <span style="color: goldenrod"> {{ $cartitem->quantity }} x €{{ $cartitem->item->total_price }}</span></strong>
                                        </li>
                                    </ul>
                                    <br>
                                    <div class="buttondiv">
                                        <button data-route="{{ route('carts.minus', ['id' => $cartitem->id, 'route' => 'cartsidebar'] ) }}" class="cartbutton minus-quantity" type="button">
                                            <span class="btn-cart-icon"><i class="fa fa-minus"></i></span>
                                        </button>
                                        <!-- Add other buttons here -->
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
                                <a href="{{ route('carts.details') }}" class="btn btn-primary btn-block" style="width:100%;font-size:30px;">{{ __('translation.Check Out') }}</a>
                            </div>
                        </div>
                    </div>
                @else
                    <p>{{ __('translation.No items in cart') }}</p>
                @endif

                <hr>

                <div class="cart-summary mb-4 p-3 bg-light border rounded">
                    <div class="d-flex justify-content-between">
                        <span><strong style="color: goldenrod">Subtotal:</strong></span>
                        <span class="amount"><strong>€{{ number_format($result, 2) }}</strong></span>
                    </div>
                </div>

                @if($cartitems->isNotEmpty())
                    <a href="{{ route('carts.details') }}" class="btn btn-primary btn-block" style="width: 100%; font-size: 18px;">
                        {{ __('translation.Check Out') }}
                    </a>
                @endif
            </div>
        </div>
    </li>
</ul>

<script>
    // Add your JavaScript here for handling AJAX requests to update cart
</script>
