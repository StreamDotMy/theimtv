                        <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                                <div class="col-md-6">
                                    <select name="video_category_id" class="form-control" id="video_category_id">
                                        @foreach ($categories as $id => $title)
                                            <option 
                                            value="{{ $id }}" 
                                            @if ( $video->video_category_id == $id )
                                                selected 
                                            @endif
                                            >{{ $title  }}</option>
                                        @endforeach       
                                    </select>
                                    @error('video_category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
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
                                <label for="genre" class="col-md-4 col-form-label text-md-right">{{ __('Genre') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('genre') is-invalid @enderror" name="genre" value="{{  $video->genre  }}" required autocomplete="genre" autofocus>

                                    @error('genre')
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
                                    <input id="name" type="text" class="form-control @error('year_of_release') is-invalid @enderror" name="year_of_release" value="{{  $video->year_of_release  }}" required autocomplete="year_of_release" autofocus>

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
                                    <input id="classification" type="text" class="form-control @error('classification') is-invalid @enderror" name="classification" value="{{  $video->classification  }}" required autocomplete="classification" autofocus>

                                    @error('classification')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                   	        <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Ordering') }}</label>

                                <div class="col-md-6">
                                    <input style="width:50px" id="name" type="text" class="form-control @error('ordering') is-invalid @enderror" name="ordering" value="{{  $video->ordering  }}" required autocomplete="ordering" autofocus>

                                    @error('ordering')
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

                            
                            
 
