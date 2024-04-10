@extends('layouts.user')

@section('title') Edit Details @endsection

@section('maincontent')

    <div class="card shadow-lg p-5 mt-5 mb-5" style="width:40% ; margin:0 auto" >

        <div class="text-center">
            <p>
                <img src="../../upload/snapchat.png" alt="logo" style="width:10%">
                <span style="font-size:x-large">ɮʟօɢ</span>
            </p>
            <h4 class="mt-1 mb-3 pb-1">Welcome To Snap Blog</h4>

            <p>Edit User Information</p>
        </div>
        
        <form action="/user/{{$userData['id']}}"   method="POST" >
            @method('PATCH')
            @csrf
            <div class="form-outline mb-3">
                <label class="form-label" for="first_name">Firstname <span style="color:red;">*</span></span></label>
                <input class="form-control" type="text" name="first_name" id="first_name" value="{{$userData['first_name']}}" required>
                
            </div>
            <div class="form-outline mb-3">
                <label class="form-label" for="last_name">Lastname: <span style="color:red;">*</span></label>
                <input type="text" class="form-control" name="last_name" id="last_name" value="{{$userData['last_name']}}" required>
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
                <input type="date" class="form-control" name="date_of_birth" id="age" value="{{$userData['date_of_birth']}}" maxlength="3" size="3"  required>
            </div>

            <div class="form-outline mb-3 ">
                <label class="form-label" for="mobile">Mobile : <span style="color:red;">* </span></label>
                <input type="Number" class="form-control" id="mobile" name="number" maxlength="10" required value="{{$userData['number']}}" size="10">
            </div>

            <div class="form-outline mb-3 ">
                <label for="email">Email: <span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="email" value="{{$userData['email']}}" name="email" required>
            </div>

            <div class="form-outline mb-3 ">
                <label for="pass">Confirm Password:  <span style="color:red;">*</span></label>
                <input class="form-control" type="password" id="pass" name="password" required>
            </div>
            
            <div class="text-center pt-1 mb-5 pb-1">
                <button type="submit" class="btn btn-primary mb-3" name="submit" style="width: 100%;" >Update</button>
            </div>
        </form>

    </div>

@endsection
