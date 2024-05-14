<div class="mt-5 p-5 pt-0" style="margin:0 auto">

    @isset($categories)
        <div class="mt-5 mb-5 ">
            <h4 class="m-3">All Categories</h4>

            <div style="display: grid; grid-template-columns:20% 20% 20% 20% 20%">
                @foreach ($categories as $category)
                    <div class="card m-2 p-3 " style="height:18rem;" >

                        <a class="mb-2 " style="color:black; text-decoration:none" href="{{route('categories.show' , $category->id)}}" >{{ $category->title }}</a>

                        <img class="border mt-3" style="height:12rem"  src='{{ asset("Upload/$category->image") }}' alt="image not available">
                    
                    </div>
                @endforeach
            </div>
        </div>

    @endisset
    
</div>