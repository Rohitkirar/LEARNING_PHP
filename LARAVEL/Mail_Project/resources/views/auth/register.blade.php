@extends('layouts.app')

@section('content')

<div class="p-5 bg-white shadow-lg mt-5" style="width:38% ; margin:0 auto ; border: 2px solid lightgrey">

    <div class="text-center mb-3">
        <img src="{{ asset('Upload/snapchat.png') }}" alt="logo" style="width:10%">
        <span style="font-size:x-large">ɮʟօɢ</span>
    </div>

    <div class="text-center">
        <p>Create Your Account</p>
    </div>

    <hr style="color:lightgrey;">

    {!! Form::open(['route' => 'register', 'method' => 'POST']) !!}

    <div class="container mb-3">
        {!! Form::label('first_name', '', ['class' => 'form-label']) !!}
        <span class="text-danger">*</span>
        <span class="text-danger " style="float: right">
            @if ($errors->has('first_name'))
                {{ $errors->first('first_name') }}
            @endif
        </span>
        {!! Form::text('first_name', '', ['class' => 'form-control']) !!}
    </div>

    <div class="container mb-3">
        {!! Form::label('last_name', '', ['class' => 'form-label']) !!}
        <span class="text-danger">*</span>
        <span class="text-danger" style="float: right">
            @if ($errors->has('last_name'))
                {{ $errors->first('last_name') }}
            @endif
        </span>
        {!! Form::text('last_name', '', ['class' => 'form-control']) !!}
    </div>

    <div class="container mb-3">
        {!! Form::label('gender', '', ['class' => 'form-label']) !!}
        <span class="text-danger">*</span>
        <span class="text-danger" style="float: right">
            @if ($errors->has('gender'))
                {{ $errors->first('gender') }}
            @endif
        </span>
        <div class="text-center d-flex form-control align-items-center" style="justify-content: space-between;">
            <div>
                {!! Form::label('gender', 'Male') !!}
                {!! Form::radio('gender', 'male', true) !!}
            </div>
            <div>
                {!! Form::label('gender', 'Female') !!}
                {!! Form::radio('gender', 'female') !!}
            </div>
            <div>
                {!! Form::label('gender', 'Other') !!}
                {!! Form::radio('gender', 'other') !!}
            </div>
        </div>
    </div>

    <div class="container mb-3">
        {!! Form::label('date_of_birth', 'Date Of Birth', ['class' => 'form-label']) !!}
        <span class="text-danger">*</span>
        <span class="text-danger" style="float: right">
            @if ($errors->has('date_of_birth'))
                {{ $errors->first('date_of_birth') }}
            @endif
        </span>
        {!! Form::date('date_of_birth', '', ['class' => 'form-control']) !!}
    </div>

    <div class="container mb-3">
        {!! Form::label('number', 'Mobile', ['class' => 'form-label']) !!}
        <span class="text-danger">*</span>
        <span class="text-danger" style="float: right">
            @if ($errors->has('number'))
                {{ $errors->first('number') }}
            @endif
        </span>
        {!! Form::number('number', '', ['class' => 'form-control']) !!}
    </div>

    <div class="container mb-3">
        {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
        <span class="text-danger">*</span>
        <span class="text-danger" style="float: right">
            @if ($errors->has('email'))
                {{ $errors->first('email') }}
            @endif
        </span>
        {!! Form::email('email', '', ['class' => 'form-control']) !!}
    </div>

    <div class="container mb-3">
        {!! Form::label('username', '', ['class' => 'form-label']) !!}
        <span class="text-danger">*</span>
        <span class="text-danger" style="float: right">
            @if ($errors->has('username'))
                {{ $errors->first('username') }}
            @endif
        </span>
        {!! Form::text('username', '', ['class' => 'form-control']) !!}
    </div>

    <div class="container mb-3">
        {!! Form::label('password', '', ['class' => 'form-label']) !!}
        <span class="text-danger">*</span>
        <span class="text-danger" style="float: right">
            @if ($errors->has('password'))
                {{ $errors->first('password') }}
            @endif
        </span>
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>

    <div class="container mb-3">
        {!! Form::label('password-confirm', 'Confirm Password', ['class' => 'form-label']) !!}
        <span class="text-danger">*</span>
        <span class="text-danger" style="float: right">
            @if ($errors->has('password'))
                {{ $errors->first('password') }}
            @endif
        </span>
        {!! Form::password('password_confirmation', ['class' => 'form-control' , "id"=>"password-confirm" , "autocomplete"=>"new-password"]) !!}
    </div>

    <div class="container">
        {!! Form::submit('submit', ['class' => 'btn btn-primary w-100']) !!}
    </div>
    
    {!! Form::close() !!}
</div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
