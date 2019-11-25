<form action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
@csrf
@include('profiles.partials.avatar')

<div class="form-group row">
   
    <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Avatar') }}</label>
    
    <div class="col-md">


        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" name="avatar" class="custom-file-input @error('avatar') is-invalid @enderror" id="inputGroupFile01"
                aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
        </div>
  
        @error('avatar')
        <span  role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>  


<div class="form-group row">

    <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Address') }}</label>

    <div class="col-md">
 
        <textarea name="address" id="" cols="30" rows="10" class="form-control  @error('address') is-invalid @enderror">{{ old('address') }}</textarea>

        @error('address')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>    

<div class="form-group row">
    <div class="col-md-2"></div> 
    
    <div class="col-md">
    <button type="submit" class="btn btn-primary">
                {{ __('Save') }}
    </button>   
    </div>
</div>

</form>