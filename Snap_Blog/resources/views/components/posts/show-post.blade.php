<div class="mb-4 box-shadow rounded border">

    <div class="card-header align-items-center bg-white d-flex justify-content-between">
        <div class="d-flex align-items-center">
            <img src="{{ $post->user->profileImage() }}" class="rounded-circle" height="55" width="55"
                alt="profile" />
            <div class="mx-3">
                <p class="h6 p-0 m-0"><a class="text-dark text-decoration-none"
                        href="{{ route('users.show', $post->user->id) }}">{{ $post->user->fullName() }}</a></p>
                <p class="m-0">India</p>
            </div>
        </div>

        <div>
            <button class="btn btn-outline-secondary p-0 border-0" href="#" role="button" id="dropdownMenuLink"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bi bi-three-dots-vertical"></i>
            </button>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                <a class="dropdown-item" href="{{ route('users.show', $post->user->id) }}">View Profile</a>
                <a class="dropdown-item" href="{{ route('posts.show', $post->id) }}">View Post</a>

                @if (Auth::id() == $post->user_id)
                    <a class="dropdown-item" href="{{ route('posts.edit', $post->id) }}">Edit Post</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                        @csrf @method('DELETE')
                        <button type="submit" class="dropdown-item">Delete Post</button>
                    </form>

                @endif

                {{-- <a class="dropdown-item" href="#">Save Post</a>
                <a class="dropdown-item" href="#">Report</a> --}}
            </div>
        </div>
    </div>

    @if ($images = $post->images)
        <x-images.post-image :$images />
    @endif

    <div class="card-body " style='word-wrap: break-word; text-align:justify;'>
        <p class="card-text text-break">
            {{ $post->caption }}
        </p>
    </div>
    <div class="card-footer d-flex justify-content-between align-items-center">
        <div class="align-items-center">
            <button class="bg-transparent p-0 border-0" id="{{ $post->id }}"
                value="
                @if ($post->likes->first() && $post->likes->first()->id) {{ $post->likes->first()->id }}
                @else
                    '' @endif
                "
                onclick="like('{{ $post->id }}')">
                <i
                    class="
                    @if ($post->likes->first()) @if ($post->likes->first()->deleted_at) 
                            bi bi-heart fs-2 
                        @else 
                            bi-heart-fill fs-2 text-danger @endif
@else
bi bi-heart fs-2 
                    @endif
                    "></i>
            </button>

            <button type="button" data-toggle="modal" data-target="#commentModal"
                onclick="commentData('{{ $post->id }}')" class="bg-transparent p-0 border-0">
                <i class="bi bi-chat fs-2 mx-3"></i>
            </button>

            {{-- <button class="bg-transparent p-0 border-0"><i class="bi bi-send fs-2"></i></button> --}}
        </div>
        <small class="text-muted">Total Likes <span
                id="like{{ $post->id }}">{{ $post->likes_count }}</span></small>
        <small class="text-muted">Total Comments <span
                id="comment{{ $post->id }}">{{ $post->comments_count }}</span></small>
        <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Comments</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <div class="d-flex">
                    <span id="commentErr" class="text-danger"></span>
                    <input type="text" id="body" class="form-control mx-2">
                    <button type="button" id="createComment" class="btn btn-primary">comment</button>
                </div>

                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        function like(post_id) {

            let like_id = $("#" + post_id).val();

            if (like_id == "") like_id = null;

            $.ajax({
                url: "{{ route('likes.store') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    like_id: like_id,
                    post_id: post_id,
                },
                success: function(data) {

                    if (data['res']) {
                        $("#" + post_id).children('i').removeClass("bi bi-heart fs-2").addClass(
                            "bi-heart-fill fs-2 text-danger");
                        $("#" + post_id).val(data['like_id']);
                        $("#like" + post_id).text(parseInt($("#like" + post_id).text()) + 1);
                    } else {
                        $("#" + post_id).children('i').removeClass("bi-heart-fill fs-2 text-danger").addClass(
                            "bi bi-heart fs-2");
                        $("#like" + post_id).text(parseInt($("#like" + post_id).text()) - 1);
                    }
                }
            });
        }


        function commentData(post_id) {
            globalPostId = post_id;
            $.ajax({
                url: '{{ route('comments.index') }}',
                type: "GET",
                data: {
                    post_id: post_id,
                },
                success: function(data) {
                    if (data != "[]") {
                        data = JSON.parse(data);
                        data.forEach(function(comment) {
                            $(".modal-body").append(
                                "<div class='card-header' style='word-wrap: break-word; ' >" +
                                "<p class='my-0' style='font-size:13px' >" +
                                comment["user"]["first_name"] + " " + comment["user"]["last_name"] +
                                "</p>" +
                                "<p class='' >" + comment['body'] + "</p>" +
                                "</div>"
                            );
                        });
                    } else {
                        $(".modal-body").html("No Comments Yet");
                    }
                }
            });
        }

        $(".close").click(function() {
            $(".modal-body").html("");
            $("#commentErr").html("");
        });

        $("#createComment").click(function() {
            let body = $("#body").val();
            if (body == "")
                $("#commentErr").removeClass().addClass("text-danger").html("required");
            else {
                $.ajax({
                    url: "{{ route('comments.store') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        body: body,
                        post_id: globalPostId,
                    },
                    success: function(data) {
                        if (data) {
                            $(".modal-body").html("");
                            commentData(globalPostId);
                            $("#commentErr").removeClass().addClass("text-success").html("success");
                            $("#body").val("");
                            $("#comment" + globalPostId).text(parseInt($("#comment" + globalPostId)
                                .text()) + 1);
                        }
                    }
                });
            }
        });
    </script>
@endsection
