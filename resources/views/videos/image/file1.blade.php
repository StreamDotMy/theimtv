<form action="{{ route('videos.store_image', $video->id) }}" enctype="multipart/form-data" method="POST">
@csrf
    <div class="card text-center" style="height:500px" >
    
    @if( file_exists( $path = public_path() . '/storage/videos/' . $video->id  . '/images/image1.jpg' )) 
  
        <img    class = "img-thumbnail mt-3 mx-auto" 
                style = "width:186px"
                src="/storage/videos/{{$video->id}}/images/image1.jpg" 
        />
    @else   
        <img    class = "img-thumbnail mt-3 mx-auto" 
                style = "width:186px"
                src = "/img/video/image1.png" 
        />
    @endif
        <div class="card-body">
            <h5 class = "card-title">Poster Image</h5>
            <p class = "card-text">9x16 image ratio </p>
            
        </div>

        <div class="card-footer">
        <input  id="file1" 
                type="file" 
                class="form-control-sm @error('file1') is-invalid @enderror" 
                name="file1"   
                
        />
        
        @error('file1')
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