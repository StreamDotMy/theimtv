
<form action="{{ route('users.store') }}" method="post">
@csrf

<div class="form-group row">

    <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>

    <div class="col-md">
        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" required autocomplete="name" autofocus value="{{ old('name') }}" >
    
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>    

<div class="form-group row">

    <label for="user_level" class="col-md-2 col-form-label text-md-right">{{ __('User Level') }}</label>

    <div class="col-md">

        <select name="user_level" class="form-control @error('user_level') is-invalid @enderror">
            @foreach($levels as $key => $level)
            <option value="{{ $level }}"  @if( old('user_level') == $level ) selected  @endif >{{ ucfirst($level) }}</option>
            @endforeach
        </select>

        @error('user_level')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">

    <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('Email') }}</label>

    <div class="col-md">
        <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" required autocomplete="name" autofocus value="{{ old('email') }}" >
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror 
    
    </div>
</div>

<div class="form-group row">

    <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>

    <div class="col-md">
        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="name" autofocus>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>    
</div>

<div class="form-group row">
    <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

    <div class="col-md">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>
</div>

<div class="form-group row">
    <div class="col-md-2"></div> 
    
    <div class="col-md">
    <button type="submit" class="btn btn-primary">
                {{ __('Create') }}
    </button>   
    </div>
</div>

</form>