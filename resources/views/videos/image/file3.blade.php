<form action="{{ route('videos.store_image', $video->id) }}" enctype="multipart/form-data" method="POST">
@csrf
    <div class="card text-center"  >
    
    @if( file_exists( $path = public_path() . '/storage/videos/' . $video->id  . '/images/image3.jpg' )) 
  
        <img    class = "img-thumbnail mt-3 mx-auto" 
                src="/storage/videos/{{$video->id}}/images/image3.jpg" 
        />
    @else   
        <img    class = "img-thumbnail mt-3 mx-auto" 
                src = "/img/video/image3.png" 
        />
    @endif
        <div class="card-body">
            <h5 class = "card-title">Large Poster</h5>
            <p class = "card-text">9x16 image ratio </p>
            
        </div>

        <div class="card-footer">
        <input  id="file3" 
                type="file" 
                class="form-control-sm @error('file3') is-invalid @enderror" 
                name="file3"   
                
        />
        </div>
        <button type="submit" class="btn btn-primary rounded-0">
        <i class="fa fa-upload"></i> {{ __('Upload') }}
        </button>
    </div>
</form>