             
@if ($errors->any())
<div class="card">
    <div class="card-header">
        @foreach ($errors->all() as $error)
        <div class="invalid-feedback d-block"> <strong>{{$error}}</strong></div>
        @endforeach
    </div>
</div>
<hr />
 @endif
 

 @if( Route::currentRouteName() == 'videos.create')
    @include('videos.create_checkboxes')
 @else
     @include('videos.edit_checkboxes')
 @endif

<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

    <div class="col-md-6">
        <input  id="name" 
                type="text" 
                class="form-control @error('title') is-invalid @enderror" 
                name="title" 
                value="{{ old('title', isset($video->title) ? $video->title : null ) }}" 
        />

        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>



<div class="form-group row">
    <label for="casts" class="col-md-4 col-form-label text-md-right">{{ __('Casts') }}</label>

    <div class="col-md-6">
        <input  id="casts" 
                type="text" 
                class="form-control @error('casts') is-invalid @enderror" 
                name="casts" 
                value="{{ old('casts', isset($video->casts) ? $video->casts : null ) }}"  
        />

        @error('casts')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="director" class="col-md-4 col-form-label text-md-right">{{ __('Director') }}</label>

    <div class="col-md-6">
        <input 
            id="name" 
            type="text" 
            class="form-control @error('director') is-invalid @enderror" 
            name="director" 
            value="{{ old('director', isset($video->director) ? $video->director : null ) }}"
        />

        @error('director')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="duration" class="col-md-4 col-form-label text-md-right">{{ __('Duration') }}</label>

    <div class="col-md-6">
        <input  id="duration" 
                type="text" 
                class="form-control @error('duration') is-invalid @enderror" 
                name="duration" 
                value="{{ old('duration', isset($video->duration) ? $video->duration : null ) }}"
        />

        @error('duration')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label for="year_of_release" class="col-md-4 col-form-label text-md-right">{{ __('Year Of Release') }}</label>

    <div class="col-md-6">
      <select class="form-control  @error('year_of_release') is-invalid @enderror" name="year_of_release">
            <option value="0">Choose Year</option>
             @for ($year=1930; $year <= date('Y'); $year++)
              <option value="{{ $year }}"
              @if ($year == old('year_of_release', isset($video->year_of_release) ? $video->year_of_release : null )) selected="selected" @endif >{{ $year }}</option>
             @endfor
        </select>
        @error('year_of_release')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="classification" class="col-md-4 col-form-label text-md-right">{{ __('Clasification') }}</label>

    <div class="col-md-6">
        <select  name="classifications" class="form-control @error('classifications') is-invalid @enderror">
            <option value="0">Choose Classification </option>
            <option disabled>--------------------</option>
            @foreach($classifications as $key => $classification)
            <option 
            @if ($classification == old('classifications', isset($video->classifications) ? $video->classifications : null )) selected="selected" @endif
            value="{{$classification}}">{{$classification}}</option>
            @endforeach
        </select>
        @error('classifications')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>



<div class="form-group row">
        <label for="classification" class="col-md-4 col-form-label text-md-right">{{ __('Show Duration') }}</label>
        <div class="col-md-6">
      
            <div class="row">
                <div class="col-sm">
                    <input  
                            value="{{ old('start_date', isset($video->start_date) ? $video->start_date : null ) }}"
                            class="form-control @error('start_date') is-invalid @enderror" 
                            type="date" 
                            name="start_date" 
                            id="start_date"
                        />
                    @error('start_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-sm">
                        <input  
                        value="{{ old('end_date', isset($video->end_date) ? $video->end_date : null ) }}"
                        class="form-control @error('end_date') is-invalid @enderror" 
                        type="date" 
                        name="end_date" 
                        id="end_date"
                    />
                    @error('end_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
            </div>
              
        </div>
</div>



<div class="form-group row">
    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Short Description') }}</label>

    <div class="col-md-6">
        <textarea   
        rows="5" 
        name="synopsis" 
        type="textarea" 
        class="form-control @error('synopsis') is-invalid @enderror" 
        name="synopsis"  
        >{{ old('synopsis', isset($video->synopsis) ? $video->synopsis : null ) }}</textarea>
        @error('synopsis')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Long Description') }}</label>

    <div class="col-md-6">
            <textarea   
            rows="10" 
            name="description" 
            type="textarea" 
            class="form-control @error('description') is-invalid @enderror" 
            name="description"  
            >{{ old('description', isset($video->description) ? $video->description : null ) }}</textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>
</div>
<div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-plus"></i> {{ __('Submit') }}
            </button>

        </div>

</div>   
