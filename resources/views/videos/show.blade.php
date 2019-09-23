@extends('layouts.app')

@section('content')
<div class="container">




    <div class="row justify-content-center">

        
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('videos.index') }}">Videos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View Video</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header"><strong>{{ $video->title }}</strong></div>
                <div class="card-body">
                        @include('videos.show_table')
                </div>
            </div>
        </div>

    </div>
    
</div>
@endsection



