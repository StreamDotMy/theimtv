<table class="table">
    <thead class="thead-dark">
    <tr>
      <th scope="col" style="width:5%">#</th>
      <th scope="col" style="width:20%">Title</th>
      <th scope="col" style="width:50%">Description</th>
      <th scope="col" style="width:10%">Actions</th>
    </tr>
    </thead>
  <tbody>

    <?php foreach($genres as $genre):?>
        <tr>
            <th scope="row">{{ $genre->id }}</th>
            <td><a href="{{ route('genres.show',$genre->id ) }} ">{{ $genre->title }}</a></td>
            <td>{{ $genre->description }}</td>
            <td>
      
                <form action="{{ route('genres.destroy',$genre->id) }}" method="POST">

                    <a class="btn btn-primary" href="{{ route('genres.edit',$genre->id) }}"><i class="fa fa-edit"></i></a>
   
                    @csrf
                    @method('DELETE')
      
                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </form>                
            </td>
        </tr>
    <?php endForeach;?>

  </tbody>
</table>
{!! $genres->links() !!}