@extends('layouts.admin')

@section('title' , "Create User")

@section('content')
    
    <span class="btn btn-secondary m-2" onclick="back()">back</span>

    <div class="border p-5 bg-white" style="width:38% ; margin:0 auto ; ">

        <div class="text-center mb-3">
            <img src="{{ asset('storage/uploads/snapchat.png') }}" alt="logo" style="width:10%">
            <span style="font-size:x-large">ɮʟօɢ</span>
        </div>

        <div class="text-center">
            <p>Create New User Account</p>
        </div>

        <hr style="color:lightgrey;">

        {!! Form::open(['route' => 'admin.users.store', 'method' => 'POST']) !!}

        <div class="container mb-3">
            {!! Form::label('first_name', '', ['class' => 'form-label']) !!}
            <span class="text-danger">*</span>
            <span class="text-danger " style="float: right">
                @error('first_name')
                    {{ $errors->first('first_name') }}
                @enderror
            </span>
            {!! Form::text('first_name', '', ['class' => 'form-control']) !!}
        </div>

        <div class="container mb-3">
            {!! Form::label('last_name', '', ['class' => 'form-label']) !!}
            <span class="text-danger">*</span>
            <span class="text-danger" style="float: right">
                @error('last_name')
                    {{ $errors->first('last_name') }}
                @enderror
            </span>
            {!! Form::text('last_name', '', ['class' => 'form-control']) !!}
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
            {!! Form::date('birth_date', '', ['class' => 'form-control']) !!}
        </div>

        <div class="container mb-3">
            {!! Form::label('phone_number', 'Mobile', ['class' => 'form-label']) !!}
            <span class="text-danger">*</span>
            <span class="text-danger" style="float: right">
                @error('phone_number')
                    {{ $errors->first('phone_number') }}
                @enderror
            </span>
            {!! Form::number('phone_number', '', ['class' => 'form-control']) !!}
        </div>

        <div class="container mb-3">
            {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
            <span class="text-danger">*</span>
            <span class="text-danger" style="float: right">
                @error('email')
                    {{ $errors->first('email') }}
                @enderror
            </span>
            {!! Form::email('email', '', ['class' => 'form-control']) !!}
        </div>

        <div class="container mb-3">
            {!! Form::label('username', '', ['class' => 'form-label']) !!}
            <span class="text-danger">*</span>
            <span class="text-danger" style="float: right">
                @error('username')
                    {{ $errors->first('username') }}
                @enderror
            </span>
            {!! Form::text('username', '', ['class' => 'form-control']) !!}
        </div>

        <div class="container mb-3">
            {!! Form::label('password', '', ['class' => 'form-label']) !!}
            <span class="text-danger">*</span>
            <span class="text-danger" style="float: right">
                @error('password')
                    {{ $errors->first('password') }}
                @enderror
            </span>
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>

        <div class="container mb-3">
            {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'form-label']) !!}
            <span class="text-danger">*</span>
            <span class="text-danger" style="float: right">
                @error('password_confirmation')
                    {{ $errors->first('password_confirmation') }}
                @enderror
            </span>
            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
        </div>

        <div class="container">
            {!! Form::submit('Create User', ['class' => 'btn btn-primary w-100']) !!}
        </div>
        
        {!! Form::close() !!}
    </div>

@endsection

@section('scripts')
<script>
    function back(){return window.history.back()};
</script>
@endsection