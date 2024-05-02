<div>
    @if (count($items) > 0)
    <div>{{ $items->links() }}</div>
    <div class="row">
        @foreach ($items as $key => $item)
            <div class="col-lg-3">
                <div class="card text-center mb-3">
                    <div class="image-container"
                        style=" background-image:url({{ $item->image != null ? url('storage/' . $item->image) : url('item.png') }});">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $item->title[app()->getLocale()] }}
                            <span class="badge bg-info">{{ $item->unit_price }} €</span>
                        </h5>

                        <p class="card-text mb-3">Item Name: {{ $item->item_name[app()->getLocale()] }}</p>
                        <p class="card-text mb-3">Main Price:
                            <span class="badge bg-primary">{{ $item->total_price }} €</span>
                        </p>

                        <button data-id="{{ $item->id }}"
                            data-image="{{ $item->image != null ? url('storage/' . $item->image) : url('item.png') }}"
                            data-unit_price="{{ $item->unit_price }}" data-total_price="{{ $item->total_price }}"
                            data-description="{{ $item->description[app()->getLocale()] }}"
                            data-title="{{ $item->title[app()->getLocale()] }}"" type="button" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" class="openmodal btn btn-primary">
                            <i class="fas fa-shopping-cart"></i>
                        </button>
                        <a data-route="{{ route('wishlist.favourite', $item) }}" onclick="" type="button"
                            class="btn btn-light {{ $item->wishlisted != null ? 'text-danger' : '' }} addwishlist">
                            <i class="fas fa-heart"></i>
                        </a>

                    </div>
                    <div class="bg-danger text-white small position-absolute end-0 top-0 px-2 py-2 lh-1 text-center">
                        <span class="d-block">10%</span>
                        <span class="d-block">OFF</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @else
        <div style="text-align:center;">
            <img style="width:50%;" src="{{ url('no-products.png') }}" />
            </br>
            <p>{{ __('translation.Oops! No products matched your search.') }}</p>
        </div>
    @endif

    <div>{{ $items->links() }}</div>

</div>



