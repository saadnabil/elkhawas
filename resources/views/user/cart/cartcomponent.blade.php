@php
    $cartitems = App\Models\Cart::with('item')->where('user_id', auth()->user()->id)->get();
    $result = 0;
@endphp
@if(count($cartitems) > 0)
    <div class="col-md-8 ">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Cart Details</h6>
                <hr>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($cartitems as $cartitem)
                                <tr>
                                    <td>
                                        <img src="{{ url('storage/' . $cartitem->item->image) }}" alt="not found"
                                            width="60" height="60">
                                        {{ $cartitem->item->title }}
                                    </td>
                                    <td>{{ $cartitem->quantity }} x
                                        €{{ $cartitem->item->total_price }}</td>
                                    <td>
                                        <div class="input-group quantity mx-auto" style="">
                                            <div class="buttondiv">
                                                <button
                                                    data-route="{{ route('carts.minus', ['id' => $cartitem->id, 'route' => 'cartpagedetails']) }}"
                                                    class="cartbutton minus-quantity" type="button" style="">
                                                    <span class="btn-cart-icon "><i class="fa fa-minus"></i></span>
                                                </button>
                                                <button
                                                    data-route="{{ route('carts.plus', ['id' => $cartitem->id, 'route' => 'cartpagedetails']) }}"
                                                    class="cartbutton plus-quantity" type="button" style="">
                                                    <span class="btn-cart-icon"><i class="fa fa-plus"></i></span>
                                                </button>
                                                <button
                                                    data-route="{{ route('carts.remove', ['id' => $cartitem->id, 'route' => 'cartpagedetails']) }}"
                                                    class="cartbutton delete-item" type="button" style="">
                                                    <span class="btn-cart-icon"> <i class="fas fa-trash-alt"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td> {{ number_format($cartitem->quantity * $cartitem->item->total_price,2) }}€</td>

                                </tr>
                                @php
                                    $result += $cartitem->quantity * $cartitem->item->total_price;
                                @endphp
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="sub-title">
                    <h2 class="">Cart Summery</h3>
                </div>
                <hr>
                
                <div class="d-flex justify-content-between pb-2">
                    <div><strong>Subtotal</strong></div>
                    <div><strong>{{number_format($result,2)  }}</strong>€</div>
                </div>
                <div class="input-group apply-coupan mt-4">
                    <input type="text" placeholder="Coupon Code" class="form-control">
                    <button class="btn btn-primary" type="button" id="button-addon2">Apply Coupon</button>
                </div>
                <div class="pt-5">
                    <a href="{{ route('carts.checkoutform') }}" class="btn-primary btn btn-block w-100">{{ __('translation.Proceed to Checkout') }}</a>
                </div>
            </div>
        </div>

    </div>
@else
<div style="text-align:center;">
    <img style="width:50%;" src="{{ url('emptycart.png') }}"/>
    </br>
    <a class="btn btn-primary btn-block" href="{{ route('user.items.index') }}">{{ __('translation.Continue Shopping') }}</a>
</div>
@endif
