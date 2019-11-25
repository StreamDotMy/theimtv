<div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

        <div class="col-md-6">

                @foreach ($categories as $id => $title)
                    @php $checked = null @endphp
                    @foreach($current_categories as $current)
                    
                        @if($current->id == $id)
                            @php $checked = 'checked' @endphp
                        @endif  
                    @endforeach       
                
                    <div class="form-check">
                    <input @if( Route::currentRouteName() == 'videos.show') disabled @endif name="categories[]" class="form-check-input" type="checkbox" {{ $checked }} value="{{ $id }}" id="defaultCheck1">
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
                    @php $checked = null @endphp
                    @foreach($current_genres as $current)

                        @if($current->id == $id)
                            @php $checked = 'checked' @endphp
                        @endif  
                    @endforeach       
                
                    <div class="form-check">
                    <input @if( Route::currentRouteName() == 'videos.show') disabled @endif name="genres[]" class="form-check-input" type="checkbox" {{ $checked }} value="{{ $id }}" id="defaultCheck1">
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