@extends('layouts.app')

@section('title')
    Sign up
@endsection

@section('main')

    <div class="container shadow-lg mt-3 p-5 card" style="width:40%">
        <div class="text-center">
            <div>
                <img src="{{asset('Upload/snapchat.png')}}" alt="logo" style="width:10%">
                <span style="font-size:x-large">ɮʟօɢ</span>
            </div>

            <h4 class="m-2">Welcome To Snap Blog</h4>

            <p>Create Your Account</p>
        </div>
        <form action="route('users.store')" method="post">
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
                <button type="submit" class="btn btn-primary mb-3" name="submit"
                    style="width: 100%;">Register</button>
            </div>

            <div class="container signin">
                <span>
                    <a href="{{route('home')}}" style="text-decoration: none;">Home</a>
                </span>
                <span style="float:right;">Already have an account? 
                    <a href="{{route('users.login')}}" style="text-decoration: none;">Sign in</a>
                </span>
            </div>
        </form>
    </div>
@endsection
