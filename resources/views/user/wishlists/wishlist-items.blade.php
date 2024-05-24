@if (count($wishlists) > 0)
    @foreach ($wishlists as $key => $wishlist)
        @php
            $item = $wishlist->item;
        @endphp
        <div class="col-lg-3">
            <div class="card text-center mb-3">

                <div class="image-container"
                    style=" background-image:url({{ $item->image != null ? url('storage/' . $item->image) : url('item.png') }});">
                </div>

                <div class="card-body">

                    <h5 class="card-title">
                        {{ $item->title[app()->getLocale()] }}
                        <span class="badge bg-info">€{{ number_format($item->unit_price, 2, ',', '.') }}</span>
                    </h5>

                    <p class="card-text mb-3">Main Price:
                        <span class="badge bg-primary">€{{ number_format($item->total_price, 2, ',', '.') }}</span>
                    </p>

                    @if($item->quantity > 0)
                    <button data-id="{{ $item->id }}"
                        data-image="{{ $item->image != null ? url('storage/' . $item->image) : url('item.png') }}"
                        data-unit_price="{{ $item->unit_price }}" data-total_price="{{ $item->total_price }}"
                        data-description="{{ $item->description[app()->getLocale()] }}"
                        data-title="{{ $item->title[app()->getLocale()] }}" type="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModal" class="openmodal btn btn-primary">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                    @endif

                    <a data-route="{{ route('wishlist.favourite', $item) }}?wishlist=true" onclick=""
                        type="button"
                        class="btn btn-light {{ $item->wishlisted != null ? 'text-danger' : '' }} addwishlist">
                        <i class="fas fa-heart"></i>
                    </a>

                    @if ($item->quantity == 0)
                        <div class="text-center">
                            <p style="font-weight:bold;font-size:20px;" class="text-danger mt-3">
                                {{ __('translation.Out of stock') }}</p>
                        </div>
                    @endif

                </div>

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
