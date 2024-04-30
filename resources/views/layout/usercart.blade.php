<!-- Cart -->
<ul class="navbar-nav">
    <li class="nav-item position-relative">
        @php
            $cartitems = App\Models\Cart::with('item')->where('user_id', auth()->user()->id)->get();
            $total = $cartitems->sum(fn($item) => $item->quantity * $item->item->total_price);
        @endphp
        <button type="button" data-bs-toggle="offcanvas" data-bs-target="#cartSidebar" class="btn btn-light opencartsidebar" aria-label="Open shopping cart">
            <span class="badge bg-danger position-absolute top-0">{{ count($cartitems) }}</span>
            <i style="font-size:20px;" class="fas fa-shopping-cart"></i>
        </button>

        <!-- Offcanvas -->
        <div class="offcanvas offcanvas-end" id="cartSidebar" tabindex="-1" aria-labelledby="cartSidebarLabel">
            <div class="offcanvas-header">
                <h2 class="offcanvas-title" id="cartSidebarLabel">{{ __('translation.Shopping Cart') }}</h2>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body">
                @if(count($cartitems) > 0)
                    @foreach($cartitems as $cartitem)
                        <div class="cart-item mb-3">
                            <div class="row">
                                <div class="col-auto">
                                    <img src="{{ url('storage/'.$cartitem->item->image) }}"
                                     width="80" height="80" alt="Product image" class="productImage" loading="lazy">
                                </div>
                                <div class="col">
                                    <strong>{{ $cartitem->item->title }}</strong><br>
                                    <span style="color: goldenrod">{{ $cartitem->quantity }} x €{{ $cartitem->item->total_price }}</span>
                                </div>
                                <div class="col-auto text-end">
                                    <button class="cartbutton minus-quantity" data-route="{{ route('carts.minus', ['id' => $cartitem->id]) }}" aria-label="Decrease quantity">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <button class="cartbutton plus-quantity" data-route="{{ route('carts.plus', ['id' => $cartitem->id]) }}" aria-label="Increase quantity">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    <button class="cartbutton delete-item" data-route="{{ route('carts.remove', ['id' => $cartitem->id]) }}" aria-label="Remove item">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>{{ __('translation.No items in cart') }}</p>
                @endif
                
                <hr>
                
               <div class="cart-summary mb-4 p-3 bg-light border rounded">
    <div class="d-flex justify-content-between">
        <span><strong style="color: goldenrod">Subtotal:</strong></span>
        <span class="amount"><strong>€{{number_format($total,2)  }}</strong></span>
    </div>
</div>

                
                @if(count($cartitems) > 0)
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
