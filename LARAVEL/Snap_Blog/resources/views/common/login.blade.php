@extends('layouts.app')

@section('title') 
    Sign in
@endsection

@section('main')

    <section class="container p-5 mt-3 card " style="width:30%">
        <div class="text-center">
            <div>
                <img src="Upload/snapchat.png" alt="logo" style="width:15%">
                <span style="font-size:x-large">ɮʟօɢ</span>
            </div>
            <h4 class="m-1 p-1">Welcome To Snap Blog</h4>
            <p>Please login to your account</p>
        </div>
        
        <form action="#" method="POST">

            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example11">Username</label>
                <input type="text" name="username" maxlength="25" id="form2Example11" class="form-control" placeholder="username" required/>    
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example22">Password</label>
                <input type="password" name="password" maxlength="15" id="form2Example22" class="form-control" placeholder="********"  required/>
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
                    <a href="/register" class="btn btn-outline-success">Create new</a>
                </span>
            </div>
        </form>
    </section>

    @if(isset($_GET['success']))
        <script> alert('user registered successfull') </script> 
    @endif

@endsection
