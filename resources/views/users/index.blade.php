@extends('layouts.app')

@section('content')
<div class="container">
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('desktop.home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Users</li>
        </ol>
    </nav>



    <div class="col mr-1 ml-1">
        
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    
        <div class="row  mt-3 mb-2">
            <div class="col-6">
            <a href="{{ route('users.create') }}" class="btn btn-primary">New User</a>
            </div>
            <div class="col-6">           
                <form class="form-inline float-right" action="{{ route('users.search') }}" method="get">
                @csrf
                    <input  value="{{ request()->get('query') }}"  name="query" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>  
            </div>        
        </div>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" width="2%">#</th>
                    <th scope="col" width="5%">Avatar</th>
                    <th scope="col" width="53%">Name</th>
                    <th scope="col" width="5%">Email</th>
                    <th scope="col" width="5%">Level</th>
                    <th scope="col" width="25%" class="text-center">Actions</th>
                </tr>
            </thead>    
            <tbody>
            @foreach( $users as $user )
            <?php
                $badge = null;
                switch($user->user_level):
                    case 'member': $badge='info';       break;
                    case 'editor': $badge='success';    break;
                    case 'admin':  $badge='danger';     break;
                endswitch;
            ?>
                <tr>
                    <td><strong>{{ $user->id }}</strong></td>
                    <td>
                    @if(file_exists( public_path() . '/thumbnail/' . $user->id . '.jpg') )
                        <img src=" {{ '/thumbnail/' . $user->id . '.jpg' }}" style="width:50px" class="rounded-circle" />
                    @else
                        <img src=" {{ '/thumbnail/default.png' }}" style="width:50px" class="rounded-circle" />
                    @endif
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><span class="badge badge-{{ $badge }}" style="color:white">{{ $user->user_level }}</span></td>
                    <td class="text-center">
                   
                    <a href="{{ route('users.edit', $user) }}" class="btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('users.delete', $user) }}" onclick="javascript:return confirm('Are you sure?')" href="" class="btn-sm btn-danger"><i class="fa fa-trash"></i></a> 
                    </td>
                </tr>
            @endforeach 
            </tbody>    
        </table>

        {{ $users->appends(['query' => request()->get('query')  ])->links() }}

    </div>
</div> <!-- .container -->


@endsection