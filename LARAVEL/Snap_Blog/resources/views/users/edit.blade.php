@extends('layouts.user')

@section('title')
    Edit Details
@endsection

@section('main')
    <div class="container shadow-lg p-5 mt-5 " , style="width:40% ; margin:0 auto ; border:1px solid lightgrey">

        <div class="text-center">
            <p>
                <img src="{{ asset('Upload/snapchat.png') }}" alt="logo" style="width:10%">
                <span style="font-size:x-large">ɮʟօɢ</span>
            </p>

            <p>Edit User Information</p>
        </div>

        <hr style="color:lightgrey">

        {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', 9]]) !!}

        <div class="container mb-3">
            {!! Form::label('first_name', 'First Name', ['class' => 'form-label']) !!}
            <span class="text-danger">*</span>
            <span class="text-danger " style="float: right">
                @if ($errors->has('first_name'))
                    {{ $errors->first('first_name') }}
                @endif
            </span>
            {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="container mb-3">
            {!! Form::label('last_name', 'Last Name', ['class' => 'form-label']) !!}
            <span class="text-danger">*</span>
            <span class="text-danger" style="float: right">
                @if ($errors->has('last_name'))
                    {{ $errors->first('last_name') }}
                @endif
            </span>
            {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="container mb-3">
            {!! Form::label('gender', 'Gender', ['class' => 'form-label']) !!}
            <span class="text-danger">*</span>
            <span class="text-danger " style="float: right">
                @if ($errors->has('gender'))
                    {{ $errors->first('gender') }}
                @endif
            </span>
            <div class="d-flex justify-content-between form-control">
                <div>
                    {!! Form::label('gender', 'Male') !!}
                    {!! Form::radio('gender', 'male', ['class' => 'form-control']) !!}
                </div>
                <div>
                    {!! Form::label('gender', 'Female') !!}
                    {!! Form::radio('gender', 'female', ['class' => 'form-control']) !!}
                </div>
                <div>
                    {!! Form::label('gender', 'Other') !!}
                    {!! Form::radio('gender', 'other', ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>

        <div class="container mb-3">
            {!! Form::label('date_of_birth', 'Date_Of_Birth', ['class' => 'form-label']) !!}
            <span class="text-danger">*</span>
            <span class="text-danger " style="float: right">
                @if ($errors->has('date_of_birth'))
                    {{ $errors->first('date_of_birth') }}
                @endif
            </span>
            {!! Form::date('date_of_birth', null, ['class' => 'form-control']) !!}
        </div>

        <div class="container mb-3">
            {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
            <span class="text-danger">*</span>
            <span class="text-danger " style="float: right">
                @if ($errors->has('email'))
                    {{ $errors->first('email') }}
                @endif
            </span>
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>

        <div class="container mb-3">
            {!! Form::label('number', 'Mobile', ['class' => 'form-label']) !!}
            <span class="text-danger">*</span>
            <span class="text-danger " style="float: right">
                @if ($errors->has('number'))
                    {{ $errors->first('number') }}
                @endif
            </span>
            {!! Form::number('number', null, ['class' => 'form-control ']) !!}
        </div>

        <div class="container mb-3">
            {!! Form::label('password', 'Confirm Password', ['class' => 'form-label']) !!}
            <span class="text-danger">*</span>
            <span class="text-danger " style="float: right">
                @if ($errors->has('password'))
                    {{ $errors->first('password') }}
                @endif
            </span>
            {!! Form::text('password', '', ['class' => 'form-control']) !!}
        </div>


        {!! Form::submit('Update', ['class' => 'w-100 btn btn-primary']) !!}

        {!! Form::close() !!}


    </div>
    {{-- end form  --}}
    {{-- 
    <div class="card shadow-lg p-5 mt-5 mb-5" style="width:40% ; margin:0 auto" >

        <div class="text-center">
            <p>
                <img src="{{asset('Upload/snapchat.png')}}" alt="logo" style="width:10%">
                <span style="font-size:x-large">ɮʟօɢ</span>
            </p>
            <h4 class="mt-1 mb-3 pb-1">Welcome To Snap Blog</h4>

            <p>Edit User Information</p>
        </div>
        
        <form action="/users/{{$user['id']}}"   method="POST" >
            @method('PATCH')
            @csrf
            <div class="form-outline mb-3">
                <label class="form-label" for="first_name">Firstname <span style="color:red;">*</span></span></label>
                <input class="form-control" type="text" name="first_name" id="first_name" value="{{$user['first_name']}}" required>
                
            </div>
            <div class="form-outline mb-3">
                <label class="form-label" for="last_name">Lastname: <span style="color:red;">*</span></label>
                <input type="text" class="form-control" name="last_name" id="last_name" value="{{$user['last_name']}}" required>
            </div>

            <div class="form-outline mb-3 ">
                <label class="form-label" >Gender: <span style="color:red;">* </span></label>
                <div class="d-flex " style="align-items:center; justify-content:space-around">
                    <p><input type="radio" name="gender" value="male" checked> Male</p>
                    <p><input type="radio" name="gender" value="female"> Female</p>
                    <p><input type="radio" name="gender" value="other"> Other</p>
                </div>
            </div>
            <div class="form-outline mb-3">
                <label class="form-label" for="age">Age : <span style="color:red;">* </span></label>
                <input type="date" class="form-control" name="date_of_birth" id="age" value="{{$user['date_of_birth']}}" maxlength="3" size="3"  required>
            </div>

            <div class="form-outline mb-3 ">
                <label class="form-label" for="mobile">Mobile : <span style="color:red;">* </span></label>
                <input type="Number" class="form-control" id="mobile" name="number" maxlength="10" required value="{{$user['number']}}" size="10">
            </div>

            <div class="form-outline mb-3 ">
                <label for="email">Email: <span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="email" value="{{$user['email']}}" name="email" required>
            </div>

            <div class="form-outline mb-3 ">
                <label for="pass">Confirm Password:  <span style="color:red;">*</span></label>
                <input class="form-control" type="password" id="pass" name="password" required>
            </div>
            
            <div class="text-center pt-1 mb-5 pb-1">
                <button type="submit" class="btn btn-primary mb-3" name="submit" style="width: 100%;" >Update</button>
            </div>
        </form>

    </div> --}}
@endsection
