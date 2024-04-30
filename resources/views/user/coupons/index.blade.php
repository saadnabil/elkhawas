@extends('layout.usermaster')
@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h2 class="h5 mb-0 pt-2 pb-2">
                        <span style="font-size:20px;"><i class="fas fa-tag"></i></span>
                         {{ __('translation.Coupons') }}
                    </h2>
                </div>
                <div class="card-body p-4 wishlist-items">
                    @if (count($coupons) > 0)
                        @foreach ($coupons as $coupon)
                            <div class="d-sm-flex justify-content-between mt-lg-4 mb-4 pb-3 pb-sm-2 border-bottom">
                                <div class="d-block d-sm-flex align-items-start text-center text-sm-start">
                                    <div class="pt-2">
                                        <h4 class="product-title fs-base mb-2 text-primary couponcode">{{ $coupon->code }}</h4>
                                        <div class="fs-lg text-accent pt-2">{{ __('translation.Valid To') }} : <span
                                                class="badge bg-info">{{ Carbon\Carbon::parse($coupon->valid_to)->format('Y M d , h:i a') }}</span></div>

                                        <div class="fs-lg text-accent pt-2">{{ __('translation.Discount') }} : <span
                                                class="badge bg-primary">{{ $coupon->discount }}%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                                    <button data-coupon="{{ $coupon->code }}"
                                        class="btn btn-outline-primary btn-sm deletewishlist copycouponcode" type="button">
                                        <i class="fas fa-copy me-2"></i>Copy</button>

                                </div>
                            </div>
                        @endforeach
                    @else
                        <div style="text-align:center;">
                            <img style="width:50%;" src="{{ url('emptycoupon.png') }}" />
                            </br>
                            </br>
                            <a class="btn btn-primary btn-block"
                                href="{{ route('user.items.index') }}">{{ __('translation.Continue Shopping') }}</a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.copycouponcode', function(e) {
                e.preventDefault();
                var text =  $(this).data('coupon');
                navigator.clipboard.writeText(text)
                .then(function() {
                    alert('Coupon copied successfully');
                })
                .catch(function(err) {
                });
            });
        });
    </script>
@endpush
