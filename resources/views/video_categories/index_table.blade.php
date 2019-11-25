<table class="table">
    <thead class="thead-dark">
    <tr>
      <th scope="col" style="width:5%">#</th>

      <th scope="col" style="width:15%">Title</th>
      <th scope="col" style="width:*">Description</th>
      <th scope="col" style="width:10%">Actions</th>
    </tr>
    </thead>
  <tbody>

    <?php foreach($video_categories as $category):?>
        <tr>
            <th scope="row">{{ $category->id }}</th>
   
            <td><a href="{{ route('video_categories.show',$category->id ) }} ">{{ $category->title }}</a></td>
            <td>{{ $category->description }}</td>
            <td>
      
                <form action="{{ route('video_categories.destroy',$category->id) }}" method="POST">

                    <a class="btn btn-primary" href="{{ route('video_categories.edit',$category->id) }}"><i class="fa fa-edit"></i></a>
   
                    @csrf
                    @method('DELETE')
      
                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </form>                
            </td>
        </tr>
    <?php endForeach;?>

  </tbody>
</table>
{!! $video_categories->links() !!}