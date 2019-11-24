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
                                            <input name="categories[]" class="form-check-input" type="checkbox" {{ $checked }} value="{{ $id }}" id="defaultCheck1">
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
                                            <input name="genres[]" class="form-check-input" type="checkbox" {{ $checked }} value="{{ $id }}" id="defaultCheck1">
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

                        <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{  $video->title  }}" required autocomplete="title" autofocus>
    
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
  

    
                            <div class="form-group row">
                                <label for="synopsis" class="col-md-4 col-form-label text-md-right">{{ __('Synopsis') }}</label>
    
                                <div class="col-md-6">
                                    <input id="synopsis" type="synopsis" class="form-control @error('synopsis') is-invalid @enderror" name="synopsis" value="{{  $video->synopsis  }}" required autocomplete="synopsis">
    
                                    @error('synopsis')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    


                            <div class="form-group row">
                                <label for="casts" class="col-md-4 col-form-label text-md-right">{{ __('Casts') }}</label>

                                <div class="col-md-6">
                                    <input id="cast" type="text" class="form-control @error('casts') is-invalid @enderror" name="casts" value="{{  $video->casts  }}" required autocomplete="casts" autofocus>

                                    @error('casts')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
    
                                <div class="col-md-6">
                                    <textarea name="description" type="textarea" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description">{{  $video->description  }}</textarea>
                
    
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>    


                            <div class="form-group row">
                                <label for="director" class="col-md-4 col-form-label text-md-right">{{ __('Director') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('director') is-invalid @enderror" name="director" value="{{  $video->director  }}" required autocomplete="director" autofocus>

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
                                    <input id="duration" type="text" class="form-control @error('duration') is-invalid @enderror" name="duration" value="{{  $video->duration  }}" required autocomplete="duration" autofocus>

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
                                    {{ $video->classifications }}
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



                                <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-plus"></i> {{ __('Submit') }}
                                            </button>

                                        </div>
                                </div>   

                            
                            
 
