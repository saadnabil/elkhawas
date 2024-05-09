@if (count($wishlists) > 0)
    @foreach ($wishlists as $wishlist)
        <div class="d-sm-flex justify-content-between mt-lg-4 mb-4 pb-3 pb-sm-2 border-bottom">
            <div class="d-block d-sm-flex align-items-start text-center text-sm-start">
                <a class="d-block flex-shrink-0 mx-auto me-sm-4" href="#" style="width: 10rem;"><img width="100"
                        height="100"
                        src="{{ $wishlist->item->image != null ? url('storage/' . $wishlist->item->image) : url('item.png') }}"
                        alt="Product"></a>
                <div class="pt-2">
                    <h4 class="product-title fs-base mb-2"><a
                            href="shop-single-v1.html">{{ $wishlist->item->title[app()->getLocale()] }}
                        </a></h4>
                    <div class="fs-lg text-accent pt-2">{{ __('translation.Unit Price') }} : <span
                            class="badge bg-info">€{{ number_format( $wishlist->item->unit_price, 2, ',', '.') }}</span></div>
                    <div class="fs-lg text-accent pt-2">{{ __('translation.Total Price') }} : <span
                            class="badge bg-primary"> €{{ number_format($wishlist->item->total_price , 2, ',', '.') }}</span>
                    </div>
                </div>
            </div>
            <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                <button data-route="{{ route('wishlist.destroy', $wishlist) }}"
                    class="btn btn-outline-danger btn-sm deletewishlist" type="button">
                    <i class="fas fa-trash-alt me-2"></i>Remove</button>
                <form id="deletewishlist" action="" method="POST">
                    @csrf
                    @method('delete')
                </form>
            </div>
        </div>
    @endforeach
@else
    <div style="text-align:center;">
        <img style="width:50%;" src="{{ url('empty-wishlist.png') }}" />
        </br>
         </br>
        <a class="btn btn-primary btn-block"
            href="{{ route('user.items.index') }}">{{ __('translation.Continue Shopping') }}</a>
    </div>
@endif
