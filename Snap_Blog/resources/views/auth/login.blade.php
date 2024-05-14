@extends('layouts.guest')

@section('title')
    sign in
@endsection

@section('content')
    <div class="border p-5 mt-5" style="width:28%; margin:0 auto">

        <div class="text-center mb-3">
            <img src="{{ asset('storage/uploads/snapchat.png') }}" alt="logo" style="width:10%">
            <span style="font-size:x-large">ɮʟօɢ</span>
        </div>

        <hr style="color:lightgray">

        @error('failed')
            <p class="text-center text-danger">{{$errors->first('failed')}}</p>
        @enderror

        {!! Form::open([ "route" => "login" , "method" => "POST" ]) !!}
        
        <div class="mb-4">
            {!! Form::label('username' , 'Username' , ['class'=>'form-label']) !!}
            <span class="text-danger">*</span>
            @error('username')
                <span class="text-danger" style="float:right"> {{ $errors->first('username') }} </span>            
            @enderror
            {!! Form::text('username' , old('username') , [ "class" => "form-control" ] ) !!}
        </div>

        <div class="mb-4">
            {!! Form::label('password' , 'Password' , ['class' => 'form-label']) !!}
            <span class="text-danger">*</span>
            @error('password')
                <span class="text-danger" style="float:right ;"> {{ $errors->first('password') }} </span>            
            @enderror
            {!! Form::password('password' , [ "class" => "form-control" ] ) !!}
        </div>
        <div>
            {!! Form::submit("Login" , [ "class" => "btn btn-primary w-100"]) !!}
        </div>
        {!! Form::close() !!}
    </div>

@endsection

{{--

<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form> 
</x-guest-layout>

--}}