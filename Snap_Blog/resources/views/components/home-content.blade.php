
<div class="mt-5 p-5 pt-0" style="margin:0 auto">

    @if ($posts)
        <div class="mt-5 mb-5 pb-5 pt-0">
            <h4 class="m-3">Top Posts</h4>
            <div style="display: grid; grid-template-columns:20% 20% 20% 20% 20%">
                @foreach ($posts as $post)
                    <div class="card m-2 p-3">
                        <a class="mb-2" style="color:black; text-decoration:none" href="{{route('posts.show' , $post->id)}}">{{ $post->title }}</a>
                        <img class="border mt-3" style="height:12rem" @if(count($post->images)>0) src='{{$post->images[0]->url}}' @endif style="height:10rem"
                            alt="image not available">   
                    </div>      
                @endforeach
            </div>
            <a href="#" class="btn btn-primary mb-5" style="float:right">View More</a>
        </div>
    @endif
    
    <hr class="">

    @if ($categories)
        <div class="mt-5 mb-5 ">
            <h4 class="m-3">Top Categories</h4>

            <div style="display: grid; grid-template-columns:20% 20% 20% 20% 20%">
                @foreach ($categories as $category)
                    <div class="card m-2 p-3 " style="height:18rem;" >
                        <a class="mb-2 " style="color:black; text-decoration:none" href="{{route('posts.show' , $category->id)}}" >{{ $category->title }}</a>

                        <img class="border mt-3" style="height:12rem"  src='{{ asset("Upload/$category->image") }}' alt="image not available">
                    </div>
                @endforeach
            </div>

            <a href="#" class="btn btn-primary m-2" style="float:right">View More</a>
        </div>

    @endif

</div>