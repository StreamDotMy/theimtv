<table class="table">
    <thead class="thead-dark">
    <tr>
      <th scope="col" style="width:5%">#</th>
      <th scope="col" style="width:40%">Title</th>
      <th scope="col">Synopsis</th>
      <th scope="col" style="width:15%">Actions</th>
    </tr>
    </thead>
  <tbody>

    <?php foreach($videos as $video):?>
        <tr>
            <th scope="row">{{ $video->id }}</th>
            <td><a href="{{ route('videos.show',$video->id ) }} ">{{ $video->title }}</a></td>
            <td>{{ $video->synopsis }}</td>
            <td>
      
                <form action="{{ route('videos.destroy',$video->id) }}" method="POST">
                    {{ $video->is_uploaded }}
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