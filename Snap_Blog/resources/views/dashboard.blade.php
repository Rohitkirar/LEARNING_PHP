@extends('layouts.app')

@section('title')
    dashboard
@endsection

@section('content')
    <div class="mt-5 p-5 pt-0" style="margin:0 auto">
        @if ($posts)
            <div class="mt-5 mb-5 pb-5 pt-0">
                <h4 class="m-3">Top Posts</h4>

                <div style="display: grid; grid-template-columns:auto auto auto auto auto">
                    @foreach ($posts as $post)
                        <div class="card m-2 p-3">
                            <p>{{ $post->title }}</p>

                            <img src='{{ asset("Upload/$post->images->first())") }}' style="height:10rem"
                                alt="image not available">
                        </div>
                    @endforeach
                </div>

                <a href="#" class="btn btn-primary mb-5" style="float:right">View More</a>
            </div>
        @endif
        
        <hr class="">

        @if ($categorys)
            <div class="container mt-5 mb-5 ">
                <h4 class="m-3">Top Categories</h4>


                <div style="display: grid; grid-template-columns:auto auto auto auto auto">
                    @foreach ($categorys as $category)
                        <div class="card m-2 p-3">
                            <p>{{ $category->title }}</p>

                            <img src='{{ asset("Upload/$category->image") }}' style="height:10rem"
                                alt="image not available">
                        </div>
                    @endforeach
                </div>

                <a href="#" class="btn btn-primary m-2" style="float:right">View More</a>
            </div>
    </div>
    @endif

@endsection
