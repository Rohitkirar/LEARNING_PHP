<div>
    <button class="bg-transparent" style="border:none"><i class="bi bi-list fs-2"></i></button>

    <p class="border-top m-0"></p>
    
    <div class="d-grid mx-3 ">

        <a href="{{route("users.index")}}" class="text-dark mt-2" style="text-decoration: none"><i class="bi bi-house fs-5"></i> Home</a>
                
        <a href="{{route("posts.create")}}" class="text-dark mt-2" style="text-decoration: none"><i class="bi bi-plus-square fs-5"></i> Create Post</a>
{{-- 
        <a href="" class="text-dark mt-2" style="text-decoration: none"><i class="bi bi-plus-square fs-5"></i> Explore</a>

        <a href="" class="text-dark mt-2" style="text-decoration: none"><i class="bi bi-bell fs-5"></i> Notifications </a>

        <a href="" class="text-dark mt-2" style="text-decoration: none"><i class="bi bi-chat-left fs-5"></i> Messages </a> 
--}}

        {!! Form::open(['route' => 'logout', 'method' => 'post' , 'class' => "mt-2 link-danger" ]) !!}
        <i class="bi bi-box-arrow-right fs-5"></i>
        {!! Form::submit('logout', [
            'class' => 'link-danger',
            'style' => 'border:none;  background-color:transparent',
        ]) !!}
        {!! Form::close() !!}
    </div>
</div>