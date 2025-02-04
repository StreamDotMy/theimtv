@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row justify-content-center">
        <div class="col-md-12">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item">Videos</li>
        </nav>
            
            <div class="card">
                <div class="card-header h1">Videos Management

                    <div class="pull-right">
                            <a href="{{ route('videos.create') }}" type="button" class="btn btn-default"><i class="fa fa-plus"></i> Create</a>    
                    </div>    
                </div>
                <div class="card-body">     
                @include('videos.messages')
				@include('videos.index_table')
                </div>
            </div>
        </div>
    </div>

</div>
@endsection



