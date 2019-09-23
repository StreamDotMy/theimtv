<table class="table">
    <thead class="thead-dark">
    <tr>
      <th scope="col" style="width:5%">#</th>
      <th scope="col" style="width:60%">Title</th>
      <th scope="col">Synopsis</th>
      <th scope="col" style="width:10%">Actions</th>
    </tr>
    </thead>
  <tbody>

    <?php foreach($videos as $video):?>
        <tr>
            <th scope="row">{{ $video->id }}</th>
            <td><a href="{{ route('videos.show',['id' => $video->id]) }} ">{{ $video->title }}</a></td>
            <td>{{ $video->sysnopsis }}</td>
            <td>
                <a href="{{ route('videos.edit',['id' => $video->id]) }} "><i class="fa fa-edit"></i> Edit</a>
            </td>
        </tr>
    <?php endForeach;?>

  </tbody>
</table>