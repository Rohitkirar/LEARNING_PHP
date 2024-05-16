@extends('layouts.admin')

@section('title', 'edit user profile')

@section('content')

    <div class="container my-2" style="width:60%">

        <div class="border p-5 mt-5 bg-white">

            <div class="text-center mb-3">
                <img src="{{ asset('storage/uploads/snapchat.png') }}" alt="logo" style="width:10%">
                <span style="font-size:x-large">ɮʟօɢ</span>
            </div>
        
            <div class="text-center">
                <p>Edit User Profile</p>
            </div>
        
            <hr style="color:lightgrey;">
        
            {!! Form::model($user , ['route' => ['admin.users.update' , $user->id], 'method' => 'PATCH']) !!}
        
            <div class="container mb-3">
                {!! Form::label('first_name', '', ['class' => 'form-label']) !!}
                <span class="text-danger">*</span>
                <span class="text-danger " style="float: right">
                    @error('first_name')
                        {{ $errors->first('first_name') }}
                    @enderror
                </span>
                {!! Form::text('first_name', null , ['class' => 'form-control']) !!}
            </div>
        
            <div class="container mb-3">
                {!! Form::label('last_name', '', ['class' => 'form-label']) !!}
                <span class="text-danger">*</span>
                <span class="text-danger" style="float: right">
                    @error('last_name')
                        {{ $errors->first('last_name') }}
                    @enderror
                </span>
                {!! Form::text('last_name', null , ['class' => 'form-control']) !!}
            </div>
        
            <div class="container mb-3">
                {!! Form::label('gender', '', ['class' => 'form-label']) !!}
                <span class="text-danger">*</span>
                <span class="text-danger" style="float: right">
                    @error('gender')
                        {{ $errors->first('gender') }}
                    @enderror
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
                {!! Form::label('birth_date', 'Date Of Birth', ['class' => 'form-label']) !!}
                <span class="text-danger">*</span>
                <span class="text-danger" style="float: right">
                    @error('birth_date')
                        {{ $errors->first('birth_date') }}
                    @enderror
                </span>
                {!! Form::date('birth_date', null , ['class' => 'form-control']) !!}
            </div>
        
            <div class="container mb-3">
                {!! Form::label('phone_number', 'Mobile', ['class' => 'form-label']) !!}
                <span class="text-danger">*</span>
                <span class="text-danger" style="float: right">
                    @error('phone_number')
                        {{ $errors->first('phone_number') }}
                    @enderror
                </span>
                {!! Form::number('phone_number', null , ['class' => 'form-control']) !!}
            </div>
        
            <div class="container mb-3">
                {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
                <span class="text-danger">*</span>
                <span class="text-danger" style="float: right">
                    @error('email')
                        {{ $errors->first('email') }}
                    @enderror
                </span>
                {!! Form::email('email', null , ['class' => 'form-control']) !!}
            </div>
        
            <div class="container mb-3">
                {!! Form::label('password', 'Confirm Password', ['class' => 'form-label']) !!}
                <span class="text-danger">*</span>
                <span class="text-danger" style="float: right">
                    @error('password')
                        {{ $errors->first('password') }}
                    @enderror
                </span>
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>
        
            <div class="container">
                {!! Form::submit('Update', ['class' => 'btn btn-primary w-100']) !!}
            </div>
            
            {!! Form::close() !!}
        </div>

    </div>
@endsection