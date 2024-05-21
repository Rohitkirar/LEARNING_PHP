<div id="{{$images->first()->id}}" class="carousel" data-interval="false" data-ride="carousel" style="position: relative;">
    <div class="carousel-inner" style="position: relative; height:400px">
        @if (count($images) > 0)
            @foreach ($images as $key=>$image)
                @if($key == 0)
                    <div class="carousel-item active">
                        <img width="100%" src='{{$image->url}}'alt="post_image" />
                    </div>
                @else
                    <div class="carousel-item">
                        <img width="100%"  src='{{$image->url}}' alt="post_image" />
                    </div>
                @endif
            @endforeach
        @endif
    </div>
    @if (count($images) > 1)
        <a class="carousel-control-prev" href="#{{$images->first()->id}}" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            {{-- <span class="sr-only">Previous</span> --}}
        </a>
        <a class="carousel-control-next" href="#{{$images->first()->id}}" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            {{-- <span class="sr-only">Next</span> --}}
        </a>
    @endif
</div>