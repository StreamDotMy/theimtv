{{--
<table class="table">   
    <thead class="thead-dark">
    <tr>
        <td scope="col" style="width:100px"><strong>ID</strong></td>
        <td scope="row">{{ $user->id }}</td>
    </tr>
</thead>
    <tr>
        <td scope="col"><strong>Fullname</strong></td>
        <td scope="row">{{ $user->name }}</td>
    </tr>    
    <tr>
        <td scope="col"><strong>E-Mail</strong></td>
        <td scope="row">{{ $user->email }}</td>
    </tr>    

    <tr>
        <td></td>
        <td>
            <div>
                    <a ></a>
                    <a href="{{ route('users.edit',['id' => $user->id]) }}" type="button" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
            </div>
        </td>
    </tr>    
</table>

--}}

<table class="table table-borderless">
    <thead>
        <tr>
        <th style="width:10%" scope="col">ID</th>
        <th  class="h3" scope="col">{{ $user->id }}</th>
        </tr>
    </thead>

    <thead>
            <tr>
            <th style="width:5%" scope="col">Name</th>
            <th  class="h3" scope="col">{{ $user->name }}</th>
            </tr>
    </thead>   
 
    <thead>
            <tr>
            <th style="width:5%" scope="col">E-Mail</th>
            <th class="h3" scope="col">{{ $user->email }}</th>
            </tr>
    </thead>    


    <thead>
            <tr>
            <th style="width:5%" scope="col"></th>
            <th scope="row">
                <a href="{{ route('users.edit', $user ) }}" type="button" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
            </th>
            </tr>
    </thead>      
</table>