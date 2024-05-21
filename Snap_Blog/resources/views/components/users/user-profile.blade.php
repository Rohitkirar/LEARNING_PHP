<div class="border py-3 bg-white rounded text-center">

    <div class="d-flex m-3 justify-content-between">
        <div class="d-flex m-3">
            <img class="rounded-circle" src="{{ $user->profileImage() }}" height="100" width="100" alt="profile">
            <div>
                <p class="mx-5 mt-2 mb-1 fs-4">{{ $user->fullName() }}</p>
                <p class="mx-4 mt-0">Add Your Bio</p>
            </div>
        </div>
        <div>
            <button class="btn btn-outline-secondary p-0 border-0" href="#" role="button"
                id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bi bi-three-dots-vertical fs-5"></i>
            </button>

            <div class="dropdown-menu " aria-labelledby="dropdownMenuLink">
                @if(Auth::id() == $user->id) <a class="dropdown-item" href="{{route("users.edit" , $user->id)}}">Edit Profile</a> @endif
                {{-- <a class="dropdown-item" href="#">Save Post</a>
                <a class="dropdown-item" href="#">Hide Post</a>
                <a class="dropdown-item" href="#">Report</a> --}}
            </div>
        </div>
    </div>

    <div class="card-header border-0 d-flex justify-content-around">
        <div>
            <span class="fs-5">{{ count($user->followers()->where('type', 'follower')->get()) }}</span>
            <span>Follower</span>
        </div>
        <div>
            <span class="fs-5">{{ count($user->followers()->where('type', 'following')->get()) }}</span>
            <span>Following</span>
        </div>
        <div>
            <span class="fs-5">{{ count($user->posts) }}</span>
            <span>Post</span>
        </div>
    </div>

    <p class="text-start mx-4 my-0 mt-2 border-bottom pb-1">All Posts</p>
    <div class="card-body justify-content-around" style="display: grid; grid-template-columns:25% 25% 25% 25%">
        @foreach ($user->posts as $post)
            <div>
                <a href="{{ route('posts.show', $post->id) }}"><img src="{{ $post->images[0]->url }}"
                        style="height:10rem" width="100%" alt="post"></a>
            </div>
        @endforeach
    </div>
</div>
