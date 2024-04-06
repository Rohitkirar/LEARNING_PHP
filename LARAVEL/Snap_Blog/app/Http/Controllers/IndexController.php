<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('common.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $first_name = $last_name = $date_of_birth = $gender = $email = $number = $username = $userpassword = '';
        $first_nameErr = $last_nameErr = $date_of_birthErr = $genderErr = $emailErr = $numberErr = $usernameErr = $passwordErr = '';

        $first_name = $_POST['first_name'];

        if (preg_match("/^[A-Za-z]+$/", $first_name))
            $first_nameErr = '';
        else
            $first_nameErr = 'Please enter valid first name!';

        $last_name = $_POST['last_name'];

        if (preg_match("/^[A-Za-z]+$/", $last_name))
            $last_nameErr = '';
        else
            $last_nameErr = 'Please enter valid last name!';

        $date_of_birth = $_POST['dob'];

        $gender = $_POST['gender'];

        if ($gender == 'male' || $gender == 'female' || $gender == 'other')
            $genderErr = '';
        else
            $genderErr = 'please choose Correct gender!';

        $email = $_POST['email'];

        if (preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email))
            $emailErr = '';
        else
            $emailErr = 'Please enter valid email';

        $mobile = (string)$_POST['mobile'];

        if (preg_match("/^(\\+\\d{1,3}[- ]?)?\\d{10}$/", $mobile))
            $numberErr = '';
        else
            $numberErr = 'Please enter valid mobile containing 10 digit';

        $username = $_POST['username'];

        if (preg_match("/^[A-Za-z]\\w{5,29}$/", $username))
            $usernameErr = '';
        else
            $usernameErr = 'Please enter valid username min 5 char';


        $password = $_POST['password'];

        if (preg_match("/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,16}$/", $password)) {
            $passwordErr = '';
            if ($password == $username) {
                $passwordErr = "username and password should not be same!";
            } else {
                $password = md5($password);
            }
        } else
            $passwordErr = 'Minimum 8 characters, at least one letter, one number, and one special character';

        if ($first_nameErr == '' && $last_nameErr == '' && $date_of_birthErr == '' && $genderErr == '' && $emailErr == '' && $numberErr == '' && $usernameErr == '' && $passwordErr == '') {
            $result = 
            DB::insert(
                "INSERT INTO user 
                    (first_name , last_name , date_of_birth , gender , email , number , username , password)
                VALUES ('$first_name' , '$last_name' , '$date_of_birth' , '$gender' , '$email' , '$number' , '$username' , '$password');"
            );
            
            if($result){
                return redirect('/login?success');
            }
        }
        
        return redirect('/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
