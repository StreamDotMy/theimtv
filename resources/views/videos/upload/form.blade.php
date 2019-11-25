@extends('layouts.app')


@section('content')
<div class="container">




    <div class="row justify-content-center">

        
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('videos.index') }}">Videos</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('videos.show', $video->id) }}">{{$video->title}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Upload Video</li>
                </ol>
            </nav>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
    

                    <div class="card">
                <div class="card-header">
                    @include('videos.nav')
                </div>
                    </div>
    
                    @include('videos.messages')
                    @include('videos.upload.file1')  
                
                </div>
            </div>

    </div>
    
</div>
@endsection


