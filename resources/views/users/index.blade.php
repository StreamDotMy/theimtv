@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row justify-content-center">
        <div class="col-md-12">
                
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
        @endif

        @if(Session::has('error'))
        <div class="alert alert-danger">
            {{Session::get('error')}}
        </div>
        @endif



        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item">Users</li>
        </nav>
            
            <div class="card">
                <div class="card-header h1">Users Management

                    <div class="pull-right">
                            <a href="{{ route('users.create') }}" type="button" class="btn btn-default"><i class="fa fa-plus"></i> Create</a>    
                    </div>    
                </div>
                <div class="card-body">
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					@include('users.index_table')
                </div>
            </div>
        </div>
    </div>

</div>
@endsection



