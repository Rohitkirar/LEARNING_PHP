@extends('layouts.app')

@section('title', 'users')


@section('sidebar')
    <div class="pt-2">
        @isset($users)
            <x-users.friend-suggestion :$users />
        @endisset
    </div>
@endsection 


@section('content')

    <div style="display:grid; grid-template-columns:70% 30%">
        <div class="pt-3">
            @isset($posts)
                @foreach($posts as $post)
                    <x-posts.show-post :$post />
                @endforeach
            @endisset
        </div>

        <div>
            <div class=" w-100 position-fixed">
                
                <div class="p-3 pb-0">
                    <x-users.index-profile : />
                </div>

                
                <div class="p-3 pt-2">
                    @isset($friendRequests)
                        <x-users.friend-request :$friendRequests />
                    @endisset
                </div> 
            
            </div>
        </div>
    </div>
@endsection



