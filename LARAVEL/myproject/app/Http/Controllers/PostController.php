<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id , $name)
    {
        // Two way to parse variable in view

        // 1st way by using compact()
        // return view('post' , compact('id' , 'name'));

        
        // 2nd way by using array (key=>value)
        // return view('post' , ['id'=>$id , 'name'=>$name ]);

        $people = ['Ram' , 'shyam' , 'krishna' , 'hariom' ];
        
        // $people=[]; //empty data pass example
        
        return view('post' , compact('people' , 'id' , 'name'));
    }
}
