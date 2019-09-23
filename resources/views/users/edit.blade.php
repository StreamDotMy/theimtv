@extends('layouts.app')

@section('content')
<div class="container">




    <div class="row justify-content-center">

        
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                </ol>
            </nav>

    
            @include('users.edit_table')
    </div>
    
</div>
@endsection



