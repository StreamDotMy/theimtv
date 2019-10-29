<table class="table">
    <thead class="thead-dark">
    <tr>
      <th scope="col" style="width:5%">#</th>
      <th scope="col" style="width:52%">Name</th>
      <th scope="col">Email</th>
      <th scope="col" style="width:18%">Actions</th>
    </tr>
    </thead>
  <tbody>

    <?php foreach($users as $user):?>
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td><a href="{{ route('users.show',$user) }} ">{{ $user->name }}</a></td>
            <td>{{ $user->email }}</td>
            <td>
                <a class="btn-sm btn-primary" href="{{ route('users.edit',$user) }} "><i class="fa fa-edit"></i> Edit</a>
                <a  onclick="return confirm('Are you sure?')" class="btn-sm btn-danger" href="{{ route('users.delete',$user) }} "><i class="fa fa-trash"></i> Delete</a>
            </td>
        </tr>
    <?php endForeach;?>

  </tbody>
</table>
{{ $users->links() }}