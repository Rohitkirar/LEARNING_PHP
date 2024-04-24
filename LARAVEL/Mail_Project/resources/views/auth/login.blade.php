@extends('layouts.app')

@section('main')

<div class="container shadow-lg p-5 mt-5 mb-5" style="margin:0 auto; width:30%">

    <div class="text-center">
        <div class="mb-4">
            <img src="{{asset('Upload/snapchat.png')}}" alt="logo" style="width:12.5%">
            <span style="font-size:x-large">ɮʟօɢ</span>
        </div>

        <p>User Login</p>

        <hr style="color:lightgrey">
        
        <span class="text-danger mb-5">
            @if($errors->username) {{$errors->first("username")}} @endif 
            <br>
            @if($errors->password) {{$errors->first("password")}} @endif
        </span>
    </div>

    {!! Form::open(['route'=>"login" , "method"=>"POST"]) !!}

    <div class="mb-4">
        {!! Form::label( "username" , "Username" ,[ "class" => "form-label " ] ) !!}

        <span class="text-danger">*</span>        
        {!! Form::text( "username" , null , [ "class" => "form-control" ]) !!}
    </div>

    <div class="mb-4">
        {!! Form::label( "password" , "Password" , [ "class" => "form-label" ]) !!}
        <span class="text-danger">*</span>        
        {!! Form::text("password" , null , [ "class" => "form-control" ]) !!}
    </div>

    <div class="mb-4">
        {!! Form::submit("Log In" , [ "class"=>"w-100 btn btn-primary" ]) !!}
    </div>

    {!! Form::close() !!}

    <div class="mt-5 mb-5">
        <span style="float:right">
            <span>
                Don't have an account?
            </span>
            <a href="{{route('users.create')}}" class="btn btn-outline-success p-1" style="font-size:12px">Create new</a>
        </span>
    </div>

</div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
