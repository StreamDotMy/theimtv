
<div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

        <div class="col-md-6">
                
                @foreach ($categories as $id => $title)
                    @php $old = old('categories') @endphp
                    <div class="form-check">
                        <input @if(is_array( $old ) && in_array($id, $old )) checked @endif name="categories[]" class="form-check-input" type="checkbox" value="{{ $id }}" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            {{ $title }}
                        </label>
                    </div>
                @endforeach


            @error('categories')
                <span class="text-danger" role="alert">
                    <strong><p style="font-size:12px">{{ $message }}</p></strong>
                </span>
            @enderror
        </div>
</div>  


<div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Genre') }}</label>

        <div class="col-md-6">

                @foreach ($genres as $id => $title)
                    @php $old = old('genres' ) @endphp
                    <div class="form-check">
                        <input @if(is_array( $old ) && in_array($id, $old )) checked @endif name="genres[]" class="form-check-input" type="checkbox" value="{{ $id }}" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            {{ $title }}
                        </label>
                    </div>
                @endforeach


            @error('genres')
                <span class="text-danger" role="alert">
                    <strong><p style="font-size:12px">{{ $message }}</p></strong>
                </span>
            @enderror
        </div>
</div>
