@extends('layout.adminmaster')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">{{ __('translation.Create item type') }}</h6>
                <form action="{{ $action }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if (isset($method))
                        @method('PUT')
                    @endif
                    <div class="row">
                        @foreach ($langs as $key => $lang)
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('translation.Title') }}
                                        ({{ $lang }})
                                    </label>
                                    <input required autocomplete="off" name="title[{{ $lang }}]"
                                        value="{{ old('title.' . $lang, isset($itemtype->title[$lang]) ? $itemtype->title[$lang] : '') }}"
                                        type="text" class="form-control"
                                        placeholder="{{ __('translation.Enter title') }}">
                                    @error('title.' . $lang)
                                        <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('itemtypes.index') }}" type="button" class="btn btn-light submit">
                            {{ __('translation.Back') }}</a>
                        <button type="submit" class="btn btn-primary">{{ __('translation.Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
        <br>
    </div>
@endsection
