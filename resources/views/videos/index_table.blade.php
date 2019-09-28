<table class="table">
    <thead class="thead-dark">
    <tr>
      <th scope="col" style="width:5%">#</th>
      <th scope="col" style="width:15%">Category</th>
      <th scope="col" style="width:40%">Title</th>
      <th scope="col">Synopsis</th>
      <th scope="col" style="width:20%">Actions</th>
    </tr>
    </thead>
  <tbody>

    <?php foreach($videos as $video):?>
        <tr>
            <th scope="row">{{ $video->id }}</th>
            <th scope="row">{{ $video->video_category->title }}</th>
            <td><a href="{{ route('videos.show',$video->id ) }} ">{{ $video->title }}</a></td>
            <td>{{ $video->synopsis }}</td>
            <td>
      
                <form action="{{ route('videos.destroy',$video->id) }}" method="POST">
                    @if( $video->is_uploaded == 0 )
                      <a class="btn btn-primary" href="{{ route('videos.upload',$video->id) }}"><i class="fa fa-upload"></i></a>
                    @else
                      <a class="btn btn-danger" href=""><i class="fa fa-play"></i></a>
                    @endif

                    <a class="btn btn-info" href="{{ route('videos.show',$video->id) }}"><i class="fa fa-search"></i></a>
    
                    <a class="btn btn-primary" href="{{ route('videos.edit',$video->id) }}"><i class="fa fa-edit"></i></a>
   
                    @csrf
                    @method('DELETE')
      
                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </form>                
            </td>
        </tr>
    <?php endForeach;?>

  </tbody>
</table>
{!! $videos->links() !!}