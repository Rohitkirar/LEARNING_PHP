@extends('layouts.app')

@section('title')
    create post
@endsection

@section('content')
    <div class="container w-50 p-4 border mt-5 bg-white">
        @isset($post)
            <x-posts.edit-post :$post />
        @endisset
    </div>
@endsection

@section('scripts')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script>

        function imageDeleteFun(image_id) {
            console.log("function called");
            console.log(image_id);
            $.ajax({
                url: "/images/" + image_id + "/destroy",  
                type: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(data) {
                    if(data)
                        location.reload();
                }
            });
        }
    </script>
@endsection
