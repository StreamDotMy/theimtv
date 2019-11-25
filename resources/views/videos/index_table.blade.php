<table style="margin-bottom:20px">
    <tr>
        <td>
        <select name="video_category_id" class="form-control-lg" id="video_category_id" onchange="javascript:location.href = this.value;">
            <option value="{{ route('videos.index') }} ">All Category</option>
            @foreach ($categories as $category_id => $category_title)
                @if($category_id == $id)
                    <option selected value="{{ route('videos.by_category',$category_id) }} ">{{ $category_title  }}</option>
                @else
                    <option value="{{ route('videos.by_category',$category_id) }} ">{{ $category_title  }}</option>
                @endif
            @endforeach
        </select>
       </td>
   </tr>
</table>



<table class="table">
    <thead class="thead-dark">
    <tr>
      <th scope="col" style="width:1%">#</th> 
      <th scope="col" style="width:*">Title</th>
      <th scope="col" style="width:20%">Genre</th>
      <th scope="col" style="width:20%">Actions</th>
    </tr>
    </thead>
  <tbody>


@if( Route::currentRouteName() == 'videos.by_category')
    @php
        $videos = $by_category->videos
    @endphp
@endif


@foreach ( $videos as $video)
        <tr>
            <th scope="row">{{ $video->id }}</th>
            <th scope="row" width=""> <a href="{{ route('videos.show',$video->id ) }} ">{{ $video->title }}</a>  </th>
            <th scope="row" width=""> 
            @foreach( $video->genres as $k => $genre)
                <small>{{  $genre->title}},</small>
            @endforeach
            </th>
            
            <td>
                <form action="{{ route('videos.destroy',$video->id) }}" method="POST">
                    @if( $video->is_uploaded == 0 )
                    <a  data-toggle="tooltip" data-placement="top" title="Upload video" class="btn btn-primary" href="{{ route('videos.upload',$video->id) }}"><i class="fa fa-upload"></i></a>
                    @elseif( $video->processing_duration == 0 )
          
                    <a  data-toggle="tooltip" data-placement="top" title="Video still encoding" class="btn btn-danger" href="#"><i class="fa fa-hourglass"></i></a>
                    @else 
                    <a  data-toggle="tooltip" data-placement="top" title="Video is ready" class="btn btn-dark" href="{{ route('videos.upload',$video->id) }}"><i class="fa fa-check"></i></a>
                    @endif
             
                    <a  data-toggle="tooltip" data-placement="top" title="Show asset" class="btn btn-success" href="{{ route('videos.show',$video->id) }}"><i class="fa fa-search"></i></a>
                    {{--
                    <a  data-toggle="tooltip" data-placement="top" title="Edit asset" class="btn btn-primary" href="{{ route('videos.edit',$video->id) }}"><i class="fa fa-edit"></i></a>
                    --}}
                    @csrf
                    @method('DELETE')
      
                    <button  data-toggle="tooltip" data-placement="top" title="Delete asset" onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </form>                
            </td>
        </tr>
    @endforeach

  </tbody>
</table>
@if( Route::currentRouteName() == 'videos.index')
    {!! $videos->links() !!}
@endif    

