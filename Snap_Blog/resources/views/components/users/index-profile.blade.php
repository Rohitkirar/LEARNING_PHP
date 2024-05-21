<div class="border py-3 bg-white rounded text-center position-fixed" style="width:21%">
    <div>
        <img class="rounded-circle" src="{{ Auth::user()->profileImage() }}" height="90" width="90" alt="profile">
        <p class="mt-1 mb-0">{{ Auth::user()->fullName() }}</p>
    </div>
    
    <div class="card-body d-flex justify-content-around">
        <div>
            <span>Follower</span>
            <span>{{ count(Auth::user()->followers()->where('type', 'follower')->get()) }}</span>
        </div>
        <div>
            <span>Following</span> 
            <span>{{ count(Auth::user()->followers()->where('type', 'following')->get()) }}</span>
        </div>
    </div>
    
    <div class="d-flex justify-content-around">
        <a href="{{route("users.show" , Auth::id())}}" class="w-100 btn btn-outline-primary p-0 mx-2" style="border:none">view profile</a>
    </div>
</div>
