@extends('layouts.guest')

@section('content')
<div class="container mt-5 p-5 shadow-lg bg-white" style="width:30% ; ">

    <p class="h3 page-header">Login</p>
    <hr>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- UserName -->
        <div>
            <x-input-label for="username" class="form-label" :value="__('Username')" />
            <x-text-input id="username" class="form-control" type="text" name="username" :value="old('username')" autofocus autocomplete="username" />
            <span class="text-danger" style="font-size: small ;"> {{$errors->first('username')}} </span>
        </div>

        <!-- Password -->
        <div class="mt-2">
            <x-input-label for="password" class="form-label" :value="__('Password')" />
            <x-text-input id="password" class="form-control"
                            type="password"
                            name="password"
                            autocomplete="current-password" />
            <span class="text-danger" style="font-size: small ;"> {{$errors->first('password')}} </span>
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        
        <button class="mt-3 btn btn-primary w-100">
            {{ __('Log in') }}
        </button>
        <div class="mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
                <a href="{{route("home")}}" class="btn btn-outline-secondary p-1" style="float:right">Home</a>
        </div>
    </form>

</div>

@endsection