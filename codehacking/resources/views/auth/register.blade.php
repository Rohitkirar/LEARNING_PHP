@extends('layouts.guest')

@section("content")

<div class="container p-5 shadow-lg bg-white mt-5" style="width: 40%" >

    <p class="h4">Register</p>

    <hr>

    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" >
        @csrf

        <!-- First Name -->
        <div>
            <x-input-label for="file" class="form-label" :value="__('Profile Image')" />
            <x-text-input id="file" class="form-control" type="file" name="file" value="{{ old('file') }}" />
            <x-input-error :messages="$errors->get('file')" class="mt-2 text-danger" />
        </div>

        <div>
            <x-input-label for="first_name" class="form-label mt-2" :value="__('First Name')" />
            <x-text-input id="first_name" class="form-control" type="text" name="first_name" :value="old('first_name')" autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2 text-danger" />
        </div>

        <!-- First Name -->
        <div>
            <x-input-label for="last_name" class="form-label" :value="__('Last Name')" />
            <x-text-input id="last_name" class="form-control" type="text" name="last_name" :value="old('last_name')" autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2 text-danger" />
        </div>

        <!-- Gender -->
        <div>
            <x-input-label for="gender" class="form-label" :value="__('Gender')" />
            <select name="gender" class="form-control" id="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            <x-input-error :messages="$errors->get('gender')" class="mt-2 text-danger" />
        </div>

        <!-- Date Of Birth -->
        <div class="mt-4">
            <x-input-label for="date_of_birth" class="form-label" :value="__('Date Of Birth')" />
            <x-text-input id="date_of_birth" class="form-control" type="date" name="date_of_birth" :value="old('date_of_birth')" autocomplete="" />
            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2 text-danger" />
        </div>

        <!-- Phone Number -->
        <div class="mt-4">
            <x-input-label for="phone_number" class="form-label" :value="__('Phone Number')" />
            <x-text-input id="phone_number" class="form-control" type="number" name="phone_number" :value="old('phone_number')" />
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2 text-danger" />
        </div>
        
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" class="form-label" :value="__('Email')" />
            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
        </div>

        <!-- Username -->
        <div class="mt-4">
            <x-input-label for="username" class="form-label" :value="__('Username')" />
            <x-text-input id="username" class="form-control" type="text" name="username" :value="old('username')" autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" class="mt-2 text-danger" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" class="form-label" :value="__('Password')" />

            <x-text-input id="password" class="form-control"
                            type="password"
                            name="password"
                            autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" class="form-label" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="form-control"
                            type="password"
                            name="password_confirmation" autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
        </div>

        <button class="btn btn-primary w-100 mt-4">
            {{ __('Register') }}
        </button>

        <div class="flex items-center justify-end mt-2">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>
    </form>

</div>

@endsection
