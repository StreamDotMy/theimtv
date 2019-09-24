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
                            <div class="card-header">Upload video for {{$video->title}}</div>
                            <div class="card-body">


                                <form action="{{ route('videos.store_video', $video->id) }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    @method('POST')
                    
                                    <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Upload Video') }}</label>
                    
                                            <div class="col-md-6">
                                                <input  id="file1" 
                                                        type="file" 
                                                        class="form-control @error('file1') is-invalid @enderror" 
                                                        name="file1"   
                                                        required autocomplete="file1" autofocus>
                    
                                                @error('file1')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-upload"></i> {{ __('Submit') }}
                                            </button>
                                        </div>
                                    </div>   

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
    
</div>
@endsection


