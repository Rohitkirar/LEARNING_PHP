<div class="mb-4 box-shadow rounded border">

    <div class="card-header align-items-center bg-white d-flex">
        <div class="d-flex align-items-center">
            <img src="{{ $post->user->profileImage() }}" class="rounded-circle" width="10%" alt="profile" />
            <div class="mx-3 ">
                <p class="h6 p-0 m-0">{{ $post->user->fullName() }}</p>
                <p class="m-0">India</p>
            </div>
        </div>

        <div>
            <button class="btn btn-outline-secondary p-0 border-0" href="#" role="button" id="dropdownMenuLink"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bi bi-three-dots-vertical"></i>
            </button>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                @if (Auth::id() == $post->user_id)
                    <a class="dropdown-item" href="{{ route('posts.edit', $post->id) }}">Edit Post</a>
                @endif
                <a class="dropdown-item" href="#">Save Post</a>
                <a class="dropdown-item" href="#">Hide Post</a>
                <a class="dropdown-item" href="#">Report</a>
            </div>
        </div>
    </div>

    <img class="card-img-top" height="100%" @if (count($post->images) > 0) src='{{ $post->images[0]->url }}' @endif
        alt="Card image cap" />

    <div class="card-body">
        <p class="card-text">{{ $post->caption }}</p>

    </div>
    <div class="card-footer d-flex justify-content-between align-items-center">
        <div class="align-items-center">
            <button class="bg-transparent p-0 border-0" id="{{$post->id}}" 
                value="@if($post->likes->first()){{$post->likes->first()->id}}@endif" 
                onclick="like('{{$post->id}}')"><i
                    class="bi bi-heart fs-2"></i></button>
            <button class="bg-transparent p-0 border-0"><i class="bi bi-chat fs-2 mx-3"></i></button>
            <button class="bg-transparent p-0 border-0"><i class="bi bi-send fs-2"></i></button>
        </div>
        <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
    </div>
</div>

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        function like(post_id) {
            let like_id = $("#post_id").val();

            if(like_id == "")  like_id = null;
            
            $.ajax({
                url: "{{ route('likes.store') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    like_id: like_id,
                    post_id: post_id,
                },
                success: function(data) {
                    if (data == 1)
                        $("#" + post_id).children('i').removeClass("bi bi-heart fs-2").addClass(
                            "bi-heart-fill fs-2");
                     else 
                        $("#" + post_id).children('i').removeClass("bi-heart-fill fs-2").addClass(
                            "bi bi-heart fs-2");
                    
                }
            });
        }
    </script>
@endsection
