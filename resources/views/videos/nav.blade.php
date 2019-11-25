<form action="{{ route('videos.destroy',$video->id) }}" method="POST">
@csrf
@method('DELETE')
<div class="form-group row mb-0">
        <div class="col-md-12">
            <a class="btn btn-dark" href="{{ route('videos.edit',$video->id) }}"><i class="fa fa-edit"></i> Metadata</a>
            <a class="btn btn-success" href="{{ route('videos.image', $video->id) }}"><i class="fa fa-image"></i> Posters</a>
            <a class="btn btn-primary" href="{{ route('videos.upload',$video->id) }}"><i class="fa fa-upload"></i> Video</a>
            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
        </div>
</div>
</form>