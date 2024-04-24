@extends('layouts.app')

@section('title')
    Sign up
@endsection

@section('main')
    <div class="p-5 bg-white shadow-lg mt-5" style="width:38% ; margin:0 auto ; border: 2px solid lightgrey">

        <div class="text-center mb-3">
            <img src="{{ asset('Upload/snapchat.png') }}" alt="logo" style="width:10%">
            <span style="font-size:x-large">ɮʟօɢ</span>
        </div>

        <div class="text-center">
            <p>Create Your Account</p>
        </div>

        <hr style="color:lightgrey;">

        {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}

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

        <div class="container">
            {!! Form::submit('submit', ['class' => 'btn btn-primary w-100']) !!}
        </div>
        
        {!! Form::close() !!}
    </div>
    {{-- form main div end --}}



    {{-- <div class="container shadow-lg mt-3 p-5 card" style="width:40%">
        <div class="text-center">
            <div>
                <img src="{{asset('Upload/snapchat.png')}}" alt="logo" style="width:10%">
                <span style="font-size:x-large">ɮʟօɢ</span>
            </div>

            <h4 class="m-2">Welcome To Snap Blog</h4>

            <p>Create Your Account</p>
        </div>
        <form action="/users" method="post">
            @csrf
            <div class="form-outline mb-3">
                <label class="form-label" for="first_name">Firstname </label>
                <input type="text" class="form-control" name="first_name" id="first_name" required />
            </div>
            <div class="form-outline mb-3">
                <label class="form-label">Lastname: </label>
                <input type="text" class="form-control" name="last_name" required />
            </div>

            <div class="form-outline mb-3 ">
                <label class="form-label">Gender: </label>
                <div class="d-flex " style="align-items:center; justify-content:space-around">
                    <p><input type="radio" name="gender" value="male" checked> Male</p>
                    <p><input type="radio" name="gender" value="female"> Female</p>
                    <p><input type="radio" name="gender" value="other"> Other</p>
                </div>
            </div>
            <div class="form-outline mb-3">
                <label>Date Of Birth : </label>
                <input type="date" class="form-control" name="date_of_birth" required />
            </div>

            <div class="form-outline mb-3 ">
                <label>Mobile :</label>
                <input type="Number" class="form-control" name="number" maxlength="10" size="10" required>
            </div>

            <div class="form-outline mb-3">
                <label for="email">Email: </label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-outline mb-3  ">
                <label for="username">UserName : </label>
                <input type="text" class="form-control" id="username" maxlength="25" name="username" required>
            </div>
            <div class="form-outline mb-3 ">
                <label for="pass">Password:</label>
                <input type="password" class="form-control" id="pass" maxlength="15" name="password" required>
            </div>

            <div class="text-center pt-1 mb-5 pb-1">
                <button type="submit" class="btn btn-primary mb-3" name="submit" style="width: 100%;">Register</button>
            </div>

            <div class="container signin">
                <span>
                    <a href="/" style="text-decoration: none;">Home</a>
                </span>
                <span style="float:right;">Already have an account?
                    <a href="/login" style="text-decoration: none;">Sign in</a>
                </span>
            </div>
        </form>
    </div>  --}}
@endsection
