@extends('layouts.user')

@section('title')
    profile
@endsection

@section('main')

<div class="container mt-5" style="width:100% ;">

    <div >
        
        <a href="{{route('posts.create')}}" class="btn btn-success m-1" style="float:right ;" >Create Post</a>
        <a href="{{route("users.edit" , Auth::user()->id)}}" class=" btn btn-primary m-1" style="float:right;">Edit Profile</a>

        <img src="{{asset("Upload/icons8-admin-96.png")}}" class="h-10 p-2" style="" alt="profile">
        <Strong style="font-size:26px" >{{$user['first_name'] . " " . $user['last_name']}}</Strong>
        
    </div>
    
    <h5 class="mt-5">Post Data</h5>
    
    <hr>

    <div class="justify-content-center mt-4" style="display:grid; grid-template-columns:25% 25% 25% 25%; ">
        
        @foreach($user['posts'] as $values)
        
            <div class="card bg-white p-4" style=" font-size:12px ; border:1px solid lightgrey; border-radius:0;">
                
                <div class="h-50">
                    <p>Title : {{$values['title']}}</p>
                    <p>Category : {{$values['category']['title']}}</p>
                </div>

                <div class="h-50 mt-2 mb-2 d-flex align-items-end" style="justify-content:space-between ; ">
                    <span>Like : {{count($values['likes'])}}</span>
                    <span>Comment : {{count($values['comments'])}}</span>
                </div>

                <a href="{{route("posts.show" , $values->id)}}" class=" mt-3 p-1 btn btn-outline-success">view</a>

            </div>

        @endforeach
    </div>

</div>

@endsection