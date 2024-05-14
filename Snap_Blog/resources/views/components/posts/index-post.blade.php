<div class="album p-3 mb-4 bg-light">
    @foreach ($posts as $post)
        <div class="mb-4 box-shadow rounded border">

            <div class="card-header align-items-center bg-white d-flex">
                <div class="d-flex align-items-center">
                    <img src="{{ $post->user->profileImage() }}" class="rounded-circle" width="10%" alt="profile" />
                    <div class="mx-3 ">
                        <p class="h6 p-0 m-0">{{ $post->user->fullName() }}</p>
                        <p class="m-0">India</p>
                    </div>
                </div>
                <i class="bi bi-three-dots-vertical"></i>
            </div>

            <img class="card-img-top" height="100%"
                @if (count($post->images) > 0) src='{{ $post->images[0]->url }}' @endif alt="Card image cap" />

            <div class="card-body">
                <p class="card-text">{{ $post->caption }}</p>

            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
                <div class="align-items-center">
                    <i class="bi bi-heart fs-2"></i>
                    <i class="bi bi-chat fs-2 mx-3"></i>
                    <i class="bi bi-send fs-2"></i>
                </div>
                <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
            </div>
        </div>
    @endforeach
</div>
