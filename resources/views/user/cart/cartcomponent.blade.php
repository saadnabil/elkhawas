@php
    $cartitems = App\Models\Cart::with('item')->where('user_id', auth()->user()->id)->get();
    $result = 0;
    $user = auth()->user()->load('appliedcoupon');
@endphp
@push('style')
<style>
    .coupon{
        padding: 2px 10px;
        border-width: 2px;
        border-style: dashed;text-align:center;
        font-weigt:bold;
    }
    .input-group {
        display: flex;
        flex-wrap: nowrap;
    }

    .coupon-input {
        flex: 1; /* Allow the input to take up remaining space */
        border-top-right-radius: 0; /* Ensure button and input have the same border radius */
        border-bottom-right-radius: 0;
    }

    .coupon-button {
        border-top-left-radius: 0; /* Ensure button and input have the same border radius */
        border-bottom-left-radius: 0;
    }


</style>

@endpush
@if(count($cartitems) > 0)
    <div class="col-md-8 ">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">{{ __('translation.Cart Details') }}</h6>
                <hr>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>{{ __('translation.Item') }}</th>
                                <th>{{ __('translation.Price') }}</th>
                                <th>{{ __('translation.Quantity') }}</th>
                                <th>{{ __('translation.Total') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($cartitems as $cartitem)
                                <tr>
                                    <td>
                                        <img src="{{ url('storage/' . $cartitem->item->image) }}" alt="not found"
                                            width="60" height="60">
                                        {{ $cartitem->item->title[app()->getLocale()] }}
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
                                    <td> {{ $cartitem->quantity * $cartitem->item->total_price }}€</td>

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
                    <h2 class="">{{ __('translation.Cart Summery') }}</h3>
                </div>
                <hr>

                <div class="d-flex justify-content-between pb-2">
                    <div>{{ __('translation.Subtotal') }}</div>
                    <div>{{ $result }}€</div>
                </div>

                @if($user->appliedcoupon == null)
                    <div class="input-group apply-coupan mt-4">
                        <form id="applycoupon" autocomplete="">
                            @csrf
                            <div class="input-group">
                                <input required type="text" name="code" placeholder="Coupon Code" class="form-control coupon-input">
                                <button class="btn btn-primary applycoupon coupon-button" type="button" id="button-addon2">Apply Coupon</button>
                            </div>
                            <br>
                            <div class="addresserrors">
                            </div>
                        </form>
                    </div>
                @else
                    <div class="d-flex justify-content-between pb-2 text-danger">
                        <div>{{ __('translation.Discount') }}</div>
                        <div>{{ $user->appliedcoupon->discount }}%</div>
                    </div>
                    <div class="d-flex justify-content-between pb-2">
                        <div>{{ __('translation.Total') }}</div>
                        <div>{{ $result - ($result * $user->appliedcoupon->discount / 100) }}€</div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-10">
                            <div class="coupon">
                                {{$user->appliedcoupon->code }}
                            </div>
                        </div>
                        <div class="col-2">
                            <a href="#" data-route="{{ route('carts.disapplycoupon') }}" style="cursor:pointer;" class="disapplycoupon">
                                <i style="font-size:24px;" class="fa fa-trash-alt"></i>
                            </a>
                        </div>
                    </div>
                @endif
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
