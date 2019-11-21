
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create Category') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('genres.store') }}">
                        @csrf
                        @include('genres.create_form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
