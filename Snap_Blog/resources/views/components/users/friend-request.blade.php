<div class="bg-white px-2 border" style="min-height: 21rem ; ">

    <h6 class="py-3 border-bottom"><i class="bi bi-arrow-down-right-square fs-5"></i> Friend Request</h6>
    
    <ul class="list-unstyled ">
        @foreach ($friendRequests as $friend)
            <div class="d-flex align-items-center ">
                <div class="d-flex">
                    <img src="{{ $friend->user->profileImage() }}" width="4%" alt="">
                    <li class="mx-2">{{ $friend->user->fullName() }}</li>
                </div>

                <button class="btn btn-outline-success" style="border:none"><i class="bi bi-plus fs-5"></i></button>
            </div>
        @endforeach
    </ul>

    <a href="" class="w-100 btn " style="border:1px solid black;">view more</a>

</div>