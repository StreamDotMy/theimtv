<table class="table">
    <thead class="thead-dark">
    <tr>
      <th scope="col" style="width:5%">#</th>
      <th scope="col" style="width:5%">Ordering</th>
      <th scope="col" style="width:15%">Category</th>
      <th scope="col" style="width:15%">Encode Duration</th>
      <th scope="col" style="width:25%">Title</th>

      <th scope="col" style="width:40%">Actions</th>
    </tr>
    </thead>
  <tbody>

    <?php 
    foreach($videos as $video):
      $t = round($video->processing_duration);
      $duration = sprintf('%02d:%02d:%02d', ($t/3600),($t/60%60), $t%60);
    
    ?>
        <tr>
            <th scope="row">{{ $video->id }}</th>
            <th scope="row">{{ $video->ordering }}</th>
            <th scope="row">{{ $video->video_category->title }}</th>
            <th scope="row">{{ $duration }}</th>
            <th scope="row"> <a href="{{ route('videos.show',$video->id ) }} ">{{ $video->title }}</a></th>

            <td>
      
                <form action="{{ route('videos.destroy',$video->id) }}" method="POST">
                <a class="btn btn-success" href="{{ route('videos.image', $video->id) }}"><i class="fa fa-image"></i></a>
                    @if( $video->is_uploaded == 0 )
                      <a class="btn btn-primary" href="{{ route('videos.upload',$video->id) }}"><i class="fa fa-upload"></i></a>
                    @elseif( $video->processing_duration == 0 )
          
                        <a class="btn btn-danger" href="#"><i class="fa fa-hourglass"></i></a>
                    @else 
                    <a class="btn btn-primary" href="{{ route('videos.upload',$video->id) }}"><i class="fa fa-play"></i></a>
                    @endif

                    <a class="btn btn-info" href="{{ route('videos.show',$video->id) }}"><i class="fa fa-search"></i></a>
    
                    <a class="btn btn-primary" href="{{ route('videos.edit',$video->id) }}"><i class="fa fa-edit"></i></a>
   
                    @csrf
                    @method('DELETE')
      
                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-info"><i class="fa fa-trash"></i></button>
                </form>                
            </td>
        </tr>
    <?php endForeach;?>

  </tbody>
</table>
{!! $videos->links() !!}
