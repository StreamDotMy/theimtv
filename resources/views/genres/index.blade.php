@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row justify-content-center">
        <div class="col-md-12">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item">Genre Category</li>
        </nav>
            
            <div class="card">
                <div class="card-header h1">Genre Management

                    <div class="pull-right">
                            <a href="{{ route('genres.create') }}" type="button" class="btn btn-default"><i class="fa fa-plus"></i> Create</a>    
                    </div>    
                </div>
                <div class="card-body">
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
					@include('genres.index_table')
                </div>
            </div>
        </div>
    </div>

</div>
@endsection



