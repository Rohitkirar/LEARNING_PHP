<div class="" style="min-height: 21rem ; ">

    <h6 class="py-3 border-bottom"><i class="bi bi-arrow-down-right-square fs-5"></i> Friend Suggestion</h6>

    <ul class="list-unstyled ">
        @foreach ($users as $user)
            @if($user == Auth::user())
                @continue
            @endif
            <div class="d-flex align-items-center ">
                <div class="d-flex">
                    <img src="{{ $user->profileImage() }}" width="10%" alt="">
                    <li class="mx-2">{{ $user->fullName() }}</li>
                </div>

                <button class="btn btn-outline-success p-1" style="border:none"><i class="bi bi-plus fs-5"></i></button>
            </div>
        @endforeach
    </ul>

    <a href="" class="w-100 btn btn-outline-primary p-0" style="border:none">view more</a>

</div>
