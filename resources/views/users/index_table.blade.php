<table class="table">
    <thead class="thead-dark">
    <tr>
      <th scope="col" style="width:5%">#</th>
      <th scope="col" style="width:60%">Name</th>
      <th scope="col">Email</th>
      <th scope="col" style="width:10%">Actions</th>
    </tr>
    </thead>
  <tbody>

    <?php foreach($users as $user):?>
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td><a href="{{ route('users.show',['id' => $user->id]) }} ">{{ $user->name }}</a></td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('users.edit',['id' => $user->id]) }} "><i class="fa fa-edit"></i> Edit</a>
            </td>
        </tr>
    <?php endForeach;?>

  </tbody>
</table>