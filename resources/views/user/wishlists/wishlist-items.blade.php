@if (count($wishlists) > 0)
    @foreach ($wishlists as $key => $wishlist)
        @php
            $item = $wishlist->item;
        @endphp

        <div class="col-xl-3">
            <div class="card" style="border-radius: 0 !important;border:1px solid rgba(0, 0, 0, 0.2);">
                <div class="position-relative img-overlay">
                    <img src="{{ $item->image != null ? url('storage/' . $item->image) : url('item.png') }}"
                        alt="" height="150" width="100%" class="object-fit-cover">
                        @if ($item->quantity == 0)
                            <img src="{{ url('outofstock.png') }}" style="z-index:5;position: absolute;top:0;left:0;width:100%;height:100%;"/>
                            <div style="position:absolute;top:0;left:0;width:100%;height:100%;background:#0009;"></div>
                        @endif
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <div class="pt-4">
                            <h4 class="mb-1" style="margin-bottom: 15px !important;"> {{ $item->title[app()->getLocale()] }}</h4>
                            <p class="mb-2">Price:
                                <strong style="font-size: 14px;font-weight: 700;">€{{ number_format($item->total_price, 2, ',', '.') }}</strong></p>
                        </div>
                        <ul style="border-color: #666666 !important;margin-top:20px;"
                            class="d-flex justify-content-around list-unstyled border-top border-dark-subtle pt-2 text-center mb-0">
                            <li style="margin-top:10px;">
                                @if ($item->quantity > 0)
                                    <button style="border-radius: 0 !important;" data-id="{{ $item->id }}"
                                        data-image="{{ $item->image != null ? url('storage/' . $item->image) : url('item.png') }}"
                                        data-unit_price="€{{ number_format($item->unit_price, 2, ',', '.') }}"
                                        data-total_price="€{{ number_format($item->total_price, 2, ',', '.') }}"
                                        data-description="{{ $item->description[app()->getLocale()] }}"
                                        data-title="{{ $item->title[app()->getLocale()] }}"
                                        data-units_number = "{{ $item->units_number }}" type="button"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        class="openmodal btn btn-primary">
                                        <i class="fas fa-shopping-cart"></i>
                                    </button>
                                @endif
                                <a style="border-radius: 0 !important;" data-route="{{ route('wishlist.favourite', $item) }}?wishlist=true" onclick=""
                                    type="button"
                                    class="btn btn-light {{ $item->wishlisted != null ? 'text-danger' : '' }} addwishlist">
                                    <i class="fas fa-heart"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
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
