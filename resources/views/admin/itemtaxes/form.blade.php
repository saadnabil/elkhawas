@extends('layout.adminmaster')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">{{ __('translation.Create item tax') }}</h6>
                <form action="{{ $action }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if (isset($method))
                        @method('PUT')
                    @endif
                    <div class="row">

                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.Tax') }}</label>
                                <input required min="0"  autocomplete="off" name="tax"
                                    value="{{ old('tax', $itemtax->tax) }}" type="number"
                                    class="form-control" placeholder="Enter tax">
                                @error('tax')
                                    <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="mt-3">
                        <a href="{{ route('admin.itemtaxes.index') }}" type="button" class="btn btn-light submit">
                            {{ __('translation.Back') }}</a>
                        <button type="submit" class="btn btn-primary">{{ __('translation.Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
        <br>
    </div>
@endsection
