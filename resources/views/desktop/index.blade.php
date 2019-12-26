{{-- 
        https://bootsnipp.com/snippets/0ej
--}}

@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="container">

    @foreach($categories as $category)
    <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">{{ $category->title }}</h1>
        
            <hr class="mt-2 mb-5">
            <div class="row text-center text-lg-left">
            @foreach( $category->videos as $video )
          
                    <div class="col-lg-2 col-md-8 col-12">
                        <a href="{{ route('desktop.play', $video) }}" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="/storage/videos/{{ $video->id }}/images/image1.jpg" alt="">
                        </a>
                    </div>
                
            @endforeach
            </div>
    @endforeach
  </div>
  <!-- /.container -->


  

  <script>
         $(document).ready(function() {
                $('#myCarousel').carousel({
                interval: 10000
                })
        
                $('#myCarousel').on('slid.bs.carousel', function() {
                //alert("slid");
                });
        });
        </script>
@endsection