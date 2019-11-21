
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Genre')  }}</div>

                <div class="card-body">
                    <form action="{{ route('genres.update',$genre->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('genres.edit_form')  
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
