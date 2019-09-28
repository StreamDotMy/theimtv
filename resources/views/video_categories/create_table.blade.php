
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create Category') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('video_categories.store') }}">
                        @csrf
                        @include('video_categories.create_form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
