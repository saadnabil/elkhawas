@php
    $forcount = 0;
@endphp
@foreach ($addresses as $key => $address)
    <div class="form-check">
        <input required class="form-check-input" type="radio" name="address_id" value="{{ $address->id }}"
            id="flexRadioDefault{{ $forcount }}">
        <label style="font-weight:bold;" class="form-check-label text-primary" for="flexRadioDefault{{ $forcount }}">
            {{ $address->label }}
        </label>
        <p class="mb-1 mt-2">{{ $address->address }}</p>
        <p class="mb-1"><span class="text-warning">{{ __('translation.City') }}</span>:
            {{ $address->city }}</p>
        <p class="mb-1"><span class="text-warning">{{ __('translation.State') }}</span>:
            {{ $address->state }}</p>
        <p class="mb-1"><span class="text-warning">{{ __('translation.Zip') }}</span>:
            {{ $address->zip }}</p>
        @if(count($addresses) > 1)
            <a onclick="" data-route="{{ route('user.addresses.destroy', $address) }}" class="btn btn-primary btn-icon mt-3 deleteaddress">
                <i class="fas fa-trash-alt"></i>
            </a>
        @endif
    </div>
    <hr>
    @php
        $forcount += 1;
    @endphp

@endforeach

