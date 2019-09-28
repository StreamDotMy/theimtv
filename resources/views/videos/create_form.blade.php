
                            <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
        
                                    <div class="col-md-6">
                                        <select name="video_category_id" class="form-control" id="video_category_id">
                                            @foreach ($categories as $id => $title)
                                                <option value="{{ $id }} ">{{ $title  }}</option>
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
                                    <input id="name" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{  old('title')  }}" required autocomplete="title" autofocus>
    
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
                                    <input id="synopsis" type="synopsis" class="form-control @error('synopsis') is-invalid @enderror" name="synopsis" value="{{   old('synopsis')  }}" required autocomplete="synopsis">
    
                                    @error('synopsis')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
    
                                <div class="col-md-6">
                                    <textarea name="description" type="textarea" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description">{{   old('description')  }}</textarea>
                
    
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