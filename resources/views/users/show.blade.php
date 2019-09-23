@extends('layouts.app')

@section('content')
<div class="container">




    <div class="row justify-content-center">

        
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View Profile</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">View <strong>{{ $user->name }}</strong>'s Profile</div>
                <div class="card-body">
                        @include('users.show_table')
                </div>
            </div>
        </div>

    </div>
    
</div>
@endsection



