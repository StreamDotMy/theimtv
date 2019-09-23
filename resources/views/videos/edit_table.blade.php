
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Video')  }}</div>

                <div class="card-body">
                        <form method="POST" action="{{ route('videos.update', $videos->id) }}">
                        @csrf
                        @include('videos.form')
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-edit"></i> {{ __('Submit') }}
                                </button>
                                <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('users.delete', $user->id)}}"><i class="fa fa-trash"></i> Delete</a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
