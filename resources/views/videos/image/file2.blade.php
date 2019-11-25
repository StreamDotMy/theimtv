<form action="{{ route('videos.store_image', $video->id) }}" enctype="multipart/form-data" method="POST">
@csrf
<div class="card text-center" style="height:500px">

@if( file_exists( $path = public_path() . '/storage/videos/' . $video->id  . '/image/image2.jpg' )) 
    <img    class ="img-thumbnail mt-3 mx-auto" 
            src="/storage/videos/{{$video->id}}/image/image2.jpg" 
    />
@else   
    <img    class ="img-thumbnail mt-3 mx-auto" 
            src="/img/video/image2.png" 
    />
@endif
    <div class="card-body">
        <h5 class="card-title">Player Image</h5>
        <p class="card-text">16x9 image ratio </p>
        
    </div>

    <div class="card-footer">
    <input  id="file2" 
            type="file" 
            class="form-control-sm @error('file2') is-invalid @enderror" 
            name="file2"   
            
    />
    @error('file2')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
    <button type="submit" class="btn btn-primary rounded-0">
    <i class="fa fa-upload"></i> {{ __('Upload') }}
    </button>
</div>
</form>