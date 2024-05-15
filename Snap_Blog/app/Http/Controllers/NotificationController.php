<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    
    public function index()
    {
        try {
            $notifications = auth()->user()->notifications()->limit(10)->latest()->get();
            return view('notifications.index', compact('notifications'));
        }
        catch(Exception $e) {
            toastr($e->getMessage(), 'error');
            return redirect()->route("users.index");
        }
    }


    public function create()
    {
        

    }


    public function store()
    {
    }

    public function show()
    {
    }

    public function edit()
    {
    }

    public function update()
    {
    }


    public function destroy()
    {
    }
}
