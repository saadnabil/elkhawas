@extends('admin.layout.index')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Create Products</h6>
                <form action="{{ $action }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if (isset($method))
                        @method('PUT')
                    @endif
                    <div class="row">
                        @foreach ($langs as $key => $lang)
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('translation.Product Title') }} ({{ $lang }})</label>
                                    <input required autocomplete="off" name="title[{{ $lang }}]"
                                        value="{{ old('title[' . $lang . ']', isset($item->title[$lang]) ? $item->title[$lang] : '') }}"
                                        type="text" class="form-control" placeholder="Enter Product Title">
                                    @error('title.' . $lang)
                                        <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        @endforeach

                        <div class="row">
                            @foreach ($langs as $key => $lang)
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('translation.Unit') }} ({{ $lang }})</label>
                                        <input required autocomplete="off" name="unit[{{ $lang }}]"
                                            value="{{ old('unit[' . $lang . ']', isset($item->unit[$lang]) ? $item->unit[$lang] : '') }}"
                                            type="text" class="form-control" placeholder="Enter Unit">
                                        @error('unit.' . $lang)
                                            <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div><!-- Col -->
                            @endforeach
                        </div>

                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.The Number Of Pieces') }}</label>
                                <input required autocomplete="off" name="units_number"
                                    value="{{ old('units_number', $item->units_number) }}" type="number"
                                    class="form-control" placeholder="The number of pieces">
                                @error('units_number')
                                    <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                        </div><!-- Col -->

                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.Unit Price') }}</label>
                                <input required autocomplete="off" name="unit_price" type="number"
                                    value="{{ old('unit_price', $item->unit_price) }}" class="form-control"
                                    placeholder="Unit Price">
                                @error('unit_price')
                                    <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label style="color: goldenrod;" class="form-label"><strong>{{ __('translation.Total Price') }}</strong> </label>
                                <input required autocomplete="off" name="total_price" type="number"
                                    value="{{ old('total_price', $item->total_price) }}" class="form-control"
                                    placeholder="Main Price">
                                @error('total_price')
                                    <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                        </div><!-- Col -->

                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.Image of Product') }}</label>
                                <input name="image" id="imageInput" type="file" class="form-control">
                                @error('image')
                                    <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                        {{ $message }}</div>
                                @enderror
                            </div>
                            <div id="imagePreview" class="mt-2">
                                @if (isset($method))
                                    <img width="100" height="100" src="{{ $item->image != null ? url('storage/'.$item->image) : url('item.png') }}" class="mt-2"/>
                                @endif
                            </div>
                        </div><!-- Col -->

                    </div><!-- Row -->

                    <div class="row">
                        @foreach ($langs as $key => $lang)
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('translation.Item description') }}({{ $lang }})</label>
                                    <textarea required autocomplete="off" name="description[{{ $lang }}]" type="text" class="form-control"
                                        placeholder="Enter Item Name">{{ old('description[' . $lang . ']', isset($item->description[$lang]) ? $item->description[$lang] : '') }}</textarea>
                                        @error('description.' . $lang)
                                        <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                        @endforeach
                    </div>
                    <a href="{{ route('admin.items.index') }}" type="button" class="btn btn-light submit"> {{ __('translation.Back') }}</a>
                    <button type="submit" class="btn btn-primary">{{ __('translation.Save') }}</button>
                </form>
            </div>

        </div>
        <br>
        @if (!isset($method))
            <form action="{{ route('admins.itemsexcelimport') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6 ">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="card-title">{{ __('translation.Add Products By Excel') }}</h6>
                                </div>
                                <div class="col-md-6" style="text-align:right;font-size:13px;font-weight:bold;">
                                    <a href="{{ url('templates/excel_Items_template.xlsx') }}">Download Excel Template</a>
                                </div>
                            </div>
                            <hr>
                            <div style="">
                                <input type="file" name="file" class="form-control">
                                @error('file')
                                    <div class="mt-1" style="font-size: 12px;color:red;font-weight:bold;">
                                            {{ $message }}
                                    </div>
                                @enderror
                                <br>
                                <button type="submit" class="btn btn-dark">{{ __('translation.Import Product') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endif

        <script>
            document.getElementById('imageInput').addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        const img = document.createElement('img');
                        img.src = event.target.result;
                        img.setAttribute('style', 'width: 100px; height: 100px;');
                        document.getElementById('imagePreview').innerHTML = '';
                        document.getElementById('imagePreview').appendChild(img);
                    }
                    reader.readAsDataURL(file);
                }
            });
        </script>

    </div>
@endsection
