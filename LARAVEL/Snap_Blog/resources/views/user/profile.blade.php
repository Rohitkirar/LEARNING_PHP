@extends('layouts.user')

@section('title')
    user profile
@endsection

@section('main')

@php
    $user = json_decode($user , true);
@endphp

<div class="container shadow-lg mt-5 mb-5" style="margin: 0 auto ; width:70%">
    <div class="container p-4">
        
        <div class="text-center">
            <h1 class="">{{$user['first_name'] . " " . $user['last_name']}}</h1>
        </div>
        
        <h5 class="mt-5">Post Data</h5>

        <div class="justify-content-center" style="display:grid; grid-template-columns:25% 25% 25% 25%; ">
            
            @foreach($user['posts'] as $values)

                <div class="card shadow-lg p-4 m-2" style="height:10rem ; font-size:12px">
                    
                    <div class="h-50">
                        <p>Title : {{$values['title']}}</p>
                        <p>Category : {{$values['category']['title']}}</p>
                    </div>

                    <div class="h-50 d-flex align-items-end" style="justify-content:space-between ; ">
                        <span>Like : {{count($values['post_likes'])}}</span>
                        <span>Comment : {{count($values['post_comments'])}}</span>
                    </div>

                </div>

            @endforeach
        </div>
    </div>
</div>

@endsection