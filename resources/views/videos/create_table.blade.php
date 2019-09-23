
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create Video') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('videos.store') }}">
                        @csrf
                        @include('videos.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
