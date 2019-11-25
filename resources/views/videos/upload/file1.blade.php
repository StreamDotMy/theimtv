<form action="{{ route('videos.store_video', $video->id) }}" enctype="multipart/form-data" method="POST">
@csrf
@method('POST')
                    
<form action="{{ route('videos.store_video', $video->id) }}" enctype="multipart/form-data" method="POST">
@csrf
@method('POST')
    <div class="card text-center"  >
    
    @if( file_exists( $path = public_path() . '/storage/videos/' . $video->id  . '/raw/source.mp4' )) 
        @include('videos.player')
    @else   
        <img    class = "img-thumbnail mt-3 mx-auto" 
                src = "/img/video/image2.png" 
        />
    @endif
        <div class="card-body">
            <h5 class = "card-title">RAW Video Upload</h5>
            <p class = "card-text">1080p MP4 H264/AAC 6000kbps bitrate</p>
            
        </div>

        <div class="card-footer">
        <input  id="file1" 
                type="file" 
                class="required form-control-sm @error('file3') is-invalid @enderror" 
                name="file1"   
                
        />
        </div>
        <button type="submit" class="btn btn-primary rounded-0">
        <i class="fa fa-upload"></i> {{ __('Upload') }}
        </button>
    </div>
</form>