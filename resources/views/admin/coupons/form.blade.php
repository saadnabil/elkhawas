@extends('layout.adminmaster')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">{{ __('translation.Create coupon') }}</h6>
                <form action="{{ $action }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if (isset($method))
                        @method('PUT')
                    @endif

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.Code') }}</label>
                                <input max ="10" required autocomplete="off" name="code" value="{{ old('code', $coupon->code) }}"
                                    type="text" class="form-control" placeholder="eg) Hel2023">
                                @error('code')
                                    <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.Description') }}</label>
                                <input required autocomplete="off" name="description"
                                    value="{{ old('description', $coupon->description) }}" type="text"
                                    class="form-control" placeholder="{{ __('translation.Enter Description') }}">
                                @error('description')
                                    <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.Discount') }}</label>
                                <input required autocomplete="off" name="discount"
                                    value="{{ old('discount', $coupon->discount) }}" type="number" step="0.01"
                                    class="form-control" placeholder="{{ __('translation.Enter Discount') }}">
                                @error('discount')
                                    <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.Quantity') }}</label>
                                <input required autocomplete="off" name="quantity"
                                    value="{{ old('quantity', $coupon->quantity) }}" type="number" class="form-control"
                                    placeholder="{{ __('translation.Enter Quantity') }}">
                                @error('quantity')
                                    <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.Valid From') }}</label>
                                <input required autocomplete="off" name="valid_from"
                                    value="{{ old('valid_from', $coupon->valid_from) }}" type="datetime-local"
                                    class="form-control">
                                @error('valid_from')
                                    <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.Valid To') }}</label>
                                <input required autocomplete="off" name="valid_to"
                                    value="{{ old('valid_to', $coupon->valid_to) }}" type="datetime-local"
                                    class="form-control">
                                @error('valid_to')
                                    <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <hr>

                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.Assign to users') }}</label>
                                <select name="user_ids[]" class="form-control" id="mySelect2" multiple="multiple">
                                    <option value="select_all">{{ __('translation.Select All') }}</option>
                                    @foreach ($users as $user)
                                        <option {{ is_array(old('user_ids', $coupon->users->pluck('id')->toarray())) && in_array($user->id, old('user_ids',$coupon->users->pluck('id')->toarray())) ? 'selected' : ''  }} value="{{ $user->id }}">{{ $user->email }}</option>
                                    @endforeach
                                </select>
                                @error('user_ids')
                                    <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="mt-3">
                        <a href="{{ route('admin.coupons.index') }}" type="button" class="btn btn-light submit">
                            {{ __('translation.Back') }}</a>
                        <button type="submit" class="btn btn-primary">{{ __('translation.Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
        <br>
    </div>
@endsection
