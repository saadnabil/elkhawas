@extends('layout.usermaster')
@section('content')
@if(count($cartitems) > 0)
    <form action="{{ route('carts.checkoutform') }}" method="POST">
        @csrf
        <div class="row mt-2">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">{{ __('translation.Address Details') }}</h6>
                        <hr>
                        @php
                            $forcount = 0;
                        @endphp
                        @foreach($addresses as $key => $address)
                            <div class="form-check">
                                <input required class="form-check-input" type="radio" name="address_id" value="{{ $address->id }}" id="flexRadioDefault{{ $forcount }}">
                                <label style="font-weight:bold;"  class="form-check-label text-primary" for="flexRadioDefault{{ $forcount }}">
                                    {{ $address->label }}
                                </label>
                                <p class="mb-1 mt-2">{{ $address->address }}</p>
                                <p class="mb-1"><span class="text-warning">{{ __('translation.City')  }}</span>: {{ $address->city }}</p>
                                <p class="mb-1"><span class="text-warning">{{ __('translation.State')  }}</span>: {{ $address->state }}</p>
                                <p class="mb-1"><span class="text-warning">{{ __('translation.Zip')  }}</span>: {{ $address->zip }}</p>
                            </div>
                            <hr>
                            @php
                                $forcount += 1;
                            @endphp
                        @endforeach
                        <textarea class="form-control" name="comment" rows="5"  placeholder="Your comment here ..." ></textarea>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title"> {{ __('translation.Payment type') }}</h6>
                        <hr>
                        <div class="form-check">
                            <input value="cash" class="form-check-input" required type="radio" name="payment_type" id="cash">
                            <label style="font-weight:bold;"  class="form-check-label text-primary" for="cash">
                                {{ __('translation.Cash on delivery') }}
                            </label>
                            <div class="pt-5">
                            {{-- {{route('carts.thankyou')}} --}}
                                <a href="{{route('carts.thankyou')}}"   type="submit" class="btn-primary btn btn-block w-100">{{ __('translation.Checkout') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @else
    <div style="text-align:center;">
        <img style="width:50%;" src="{{ url('emptycart.png') }}"/>
        </br>
        <a class="btn btn-primary btn-block" href="{{ route('user.items.index') }}">{{ __('translation.Continue Shopping') }}</a>
    </div>

    @endif
@endsection
