@extends('layouts.app')

@section('content')
<div class="container">




    <div class="row justify-content-center">

        
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('videos.index') }}">Videos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Video</li>
                </ol>
            </nav>

            @include('videos.create_table')
    </div>
    
</div>
@endsection



