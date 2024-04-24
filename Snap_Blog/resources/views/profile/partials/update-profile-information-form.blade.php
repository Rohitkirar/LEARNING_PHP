@extends('layouts.app')

@section('title')
    Edit Profile
@endsection

@section("content")

<div class="container shadow-lg p-5 mt-5 " , style="width:40% ; margin:0 auto ; border:1px solid lightgrey">

    <div class="text-center">
        <p>
            <img src="{{ asset('Upload/snapchat.png') }}" alt="logo" style="width:10%">
            <span style="font-size:x-large">ɮʟօɢ</span>
        </p>

        <p>Edit User Information</p>
    </div>

    <hr style="color:lightgrey">

    {!! Form::model($user, ['method' => 'PATCH', 'route' => 'profile.update']) !!}

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

@if(session('status'))
    @php 
        echo '<script> alert("profile updated successfully") </script>';
    @endphp
@endif      

@endsection

{{-- 
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section> --}}
