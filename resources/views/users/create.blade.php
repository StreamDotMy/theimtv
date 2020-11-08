@extends('layouts.app')

@section('content')
<div class="container">
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('desktop.home') }}">Home</a></li>
            <li class="breadcrumb-item " aria-current="page"><a href="{{ route('users.index') }}">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create User</li>
        </ol>
    </nav>

    <div class="justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create User</div>
                <div class="card-body">
                @include('users.partials.create_form')
                </div>
            </div>
        </div>
    </div>       
</div>   
@endsection    
