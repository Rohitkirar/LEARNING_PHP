@extends('layouts.app')

@section('title', 'users')

{{-- 
    @section('sidebar')
        <div class="p-3 pt-2">
            @isset($users)
                <x-users.friend-suggestion :$users />
            @endisset
        </div>
    @endsection 
--}}

@section('content')

    <div style="display:grid; grid-template-columns:70% 30%">
        <div class="pt-3">
            <div>
                @isset($posts)
                    @foreach($posts as $post)
                        <x-posts.show-post :$post />
                    @endforeach
                @endisset
            </div>
            <div class="d-flex">{{$posts->links()}}</div>
        </div>

        <div>
            <div class="p-3 pb-0">
                <x-users.index-profile : />
            </div>

            {{-- 
            <div class="p-3 pt-2">
                <x-users.friend-request />
            </div> 
            --}}
        </div>
    </div>
@endsection
