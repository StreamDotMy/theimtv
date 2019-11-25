@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

@if ($errors->any())
    <div class="card">
        <div class="card-header">
            @foreach ($errors->all() as $error)
            <div class="invalid-feedback d-block"> <strong>{{$error}}</strong></div>
            @endforeach
        </div>
    </div>
@endif