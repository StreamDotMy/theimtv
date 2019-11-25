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
                    <li class="breadcrumb-item active" aria-current="page">Upload Poster</li>
                </ol>
            </nav>

            <div class="container">
                <div class="row justify-content-center">

                    <div class="card">
                    <div class="card-header">
                        @include('videos.nav')
                    </div>

                    <div class="card-body">
                        <form action="{{ route('videos.update',$video->id) }}" method="POST">
                        <div class="col-md-12">

                            @include('videos.messages')
               
                            
                            <div class="row">
                                
                                <div class="col-md-4">  
                                @include('videos.image.file1')                  
                                </div>
                                <div class="col-md-1"></div> 
                                <div class="col-md-7">  
                                @include('videos.image.file2')                     
                                </div>
                            
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                @include('videos.image.file3')   
                                </div> 
                            </div>

                        </div>
                    </div>
                </div>
                </div>


        </div>
    </div>  
</div>
@endsection


