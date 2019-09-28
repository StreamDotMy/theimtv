
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Category')  }}</div>

                <div class="card-body">
                    <form action="{{ route('video_categories.update',$video_category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('video_categories.edit_form')  
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
