@extends('layouts.app')

@section('title') 
    Sign in
@endsection

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
            @if(session('invalid'))
                {{session("invalid")}}    
            @endif
        </span>
    </div>

    {!! Form::open(['route'=>"login" , "method"=>"POST"]) !!}

    <div class="mb-4">
        {!! Form::label( "username" , "Username" ,[ "class" => "form-label " ] ) !!}

        <span class="text-danger">*</span>
        <span class="text-danger" style="float:right">
            @if($errors->username) {{$errors->first("username")}} @endif 
        </span> 
        
        {!! Form::text( "username" , null , [ "class" => "form-control" ]) !!}
    </div>

    <div class="mb-4">
        {!! Form::label( "password" , "Password" , [ "class" => "form-label" ]) !!}
        
        <span class="text-danger">*</span>
        <span class="text-danger" style="float:right">
            @if($errors->password) {{$errors->first("password")}} @endif
        </span> 
        
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
            <a href="{{route('users.create')}}" class="btn btn-outline-success" style="font-size:12px">Create new</a>
        </span>
    </div>

</div>


{{-- 

    <section class="container p-5 mt-3 card " style="width:30%">

        <div class="text-center">
            <div class="mb-4">
                <img src="{{asset('Upload/snapchat.png')}}" alt="logo" style="width:12.5%">
                <span style="font-size:x-large">ɮʟօɢ</span>
            </div>

            <p>User Login</p>

            <hr style="color:lightgrey">
            
            <span class="text-danger">
                @if(session('invalid'))
                    {{session("invalid")}}    
                @endif
            </span>
        </div>
        <form action="/login" method="POST">
            @csrf

            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example11">Username</label>
                <span class="text-danger">*</span>
                <span class="text-danger" style="float:right">
                    @if($errors->username) 
                        {{$errors->first("username")}} 
                    @endif
                </span> 
                <input type="text" name="username" maxlength="25" id="form2Example11" class="form-control" placeholder="username" />    
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example22">Password</label>
                <span class="text-danger">*</span>
                <span class="text-danger" style="float:right">@if($errors->password) {{$errors->first("password")}} @endif</span> 
                <input type="password" name="password" maxlength="16" id="form2Example22" class="form-control" placeholder="********" />
            </div>

            <div class="text-center pt-1 mb-5 pb-1">
                <button type="submit" class="btn btn-primary mb-3" name="submit" style="width: 100%;" >Log in</button>
            </div>

            <div class="pb-4">
                <span>
                    <a href="/" style="text-decoration: none;">Home</a>
                </span>
                <span style="float:right">
                    <span>
                        Don't have an account?
                    </span>
                    <a href="{{route('users.create')}}" class="btn btn-outline-success">Create new</a>
                </span>
            </div>
        </form>
    </section> --}}


@endsection
