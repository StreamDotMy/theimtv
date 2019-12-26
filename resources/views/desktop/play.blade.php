@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/desktop">Desktop</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $video->title }} </li>
        </ol>
    </nav>
    <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">{{ $video->title }}  ( {{ $video->classifications }} )</h1>
    <hr />
    @include('videos.player')
    <hr />
    <p>Short Description</p>
    <div class="p-3 mb-2 bg-white text-dark">{{ $video->synopsis }}</div>
    <p>Long Description</p>
    <div class="p-3 mb-2 bg-white text-dark">{{ $video->description }}</div>
</div>
<!-- Page Content -->
@endsection