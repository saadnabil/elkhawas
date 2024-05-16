<!-- cart -->
<ul class="navbar-nav">
    <li class="nav-item position-relative">
        @php
            $cartitems = App\Models\Cart::with('item')
                ->where('user_id', auth()->user()->id)
                ->get();
            $result = 0;
        @endphp
        <button type="button" data-bs-toggle="offcanvas" data-bs-target="#demo" class="btn btn-light opencartsidebar">
            <span class="badge bg-danger position-absolute top-0">{{ count($cartitems) }}</span>
            <i style="font-size:22px;" class="fas fa-shopping-cart"></i>
        </button>
        <div class="offcanvas offcanvas-end" id="demo">
            <div class="offcanvas-header">
                <h3 class="offcanvas-title">{{ __('translation.Shopping Cart') }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <!-- start for each -->
                <div class="items col-12 clearfix">
                    <div class="info-block block-info clearfix">
                        <div class="items col-12 clearfix">
                            @foreach ($cartitems as $key => $cartitem)
                                <div class="row mb-4 container" style="border-right: 4px solid #5E72E4;">
                                    <div class="col-5">
                                        <div class="image-cart-container"
                                            style="width: 100%;height:140px;background-image:url({{ url('storage/' . $cartitem->item->image) }});background-repeat:no-repeat;background-position:center;background-size:cover;">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <ul class="list-unstyled">
                                            <li style="">
                                                <p style="font-size:17px;">
                                                    {{ $cartitem->item->title[app()->getLocale()] }}
                                                    <br /> <span class="mt-2" style="color: #77819A;display:inline-block;"> {{ $cartitem->quantity }} x
                                                        € {{ $cartitem->item->total_price }}</span>
                                                </p>
                                            </li>
                                        </ul>
                                        <div class="buttondiv mt-3" style="">
                                            <button
                                                data-route="{{ route('carts.minus', ['id' => $cartitem->id, 'route' => 'cartsidebar']) }}"
                                                class="cartbutton minus-quantity" type="button" style="margin-left:0;">
                                                <span class="btn-cart-icon "><i class="fa fa-minus"></i></span>
                                            </button>
                                            <button
                                                data-route="{{ route('carts.plus', ['id' => $cartitem->id, 'route' => 'cartsidebar']) }}"
                                                class="cartbutton plus-quantity" type="button" style="margin-left:3px;margin-right:3px;">
                                                <span class="btn-cart-icon"><i class="fa fa-plus"></i></span>
                                            </button>
                                            <button
                                                data-route="{{ route('carts.remove', ['id' => $cartitem->id, 'route' => 'cartsidebar']) }}"
                                                class="cartbutton delete-item" type="button" style="margin-right:0;margin-left:0;">
                                                <span class="btn-cart-icon"> <i class="fas fa-trash-alt"></i></span>
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
                                    <div class="card-body"style="background-color:#fff;color:#525f7f;border:1px solid #cacaca33;border-radius:4px;">
                                        <div class="row">
                                            <div class="col" style="font-size: 18px;">
                                                <span><strong style="">Subtotal:</strong></span>
                                                <span class="ammount"><strong>€{{ number_format($result, 2, ',', '.') }}
                                                    </strong></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div>
                                    @if (count($cartitems) > 0)
                                        <a href="{{ route('carts.details') }}" class="btn btn-primary btn-block"
                                            style="width:100%;font-size:20px;">{{ __('translation.Check Out') }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </li>
</ul>
