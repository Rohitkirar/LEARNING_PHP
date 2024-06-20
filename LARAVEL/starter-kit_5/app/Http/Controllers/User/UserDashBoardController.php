<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashBoardController extends Controller
{
    public function __invoke(){
        return view("admin.dashboard");
    }
}
