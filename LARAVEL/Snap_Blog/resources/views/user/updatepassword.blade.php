@extends('layouts.user')

@section('title')

@stop

@section('main')

    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100 d-flex justify-content-center ; align-items-center">
            <div class="card rounded-3 text-black" style="width:40%">
                <div class="card-body p-md-5 mx-md-4">
                    <div class="text-center">
                        <p>
                            <img src="../../upload/snapchat.png" alt="logo" style="width:15%" />
                            <span style="font-size:x-large">ɮʟօɢ</span>
                        </p>
                    </div>
                    <form onsubmit="return confirm('Do you want to update your password'); " action="#" method="post" >
                        <center><p>Update Password</p></center>

                        <div class="form-outline">
                            <label class="form-label" for="oldpassword">Current password : <span style="color:red;"></span></label>
                            <input class="form-control mb-3" type="password" id="oldpassword" name="oldpassword" maxlength="25" required />
                        </div>

                        <div class="form-outline">
                            <label class="form-label" for="newpassword">New password : <span style="color:red;"></span></label>
                            <input class="form-control mb-3" type="password" id="newpassword" maxlength="25" name="newpassword" required />
                        </div>

                        <div class="form-outline">
                            <label class="form-label" for="retypepassword">Retype New password : <span style="color:red;"></span></label>
                            <input class="form-control mb-3" type="password" id="retypepassword" name="retypepassword" maxlength="25" required />
                        </div>

                        <div class="text-center pt-1 mb-5 pb-1">
                            <button type="submit" class="btn btn-primary mb-3" style="width: 100%;" name="updatepassword"  class="registerbtn" >Update password</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

@stop
