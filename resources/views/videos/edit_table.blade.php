
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @include('videos.nav')
                </div>

                <div class="card-body">
                    <form action="{{ route('videos.update',$video->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('videos.create_form')  
                        
                   </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
