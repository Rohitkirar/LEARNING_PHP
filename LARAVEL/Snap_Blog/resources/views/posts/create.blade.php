@extends('layouts.user')

@section('title') create post @endsection

@section('main')

    <div class="container shadow-lg p-5 mt-5 rounded-3" style="width:45% ; margin:0 auto;">

        <div class="text-center m-3">
                <img src="../../upload/snapchat.png" alt="logo" style="width:10%">
                <span style="font-size:x-large">ɮʟօɢ</span>
        </div>

        <p class="text-center">Fill Details to Add Story</p>

        <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data" >                        
            @csrf

            <div class="form-outline mb-4">

                <label class="form-label"  for="category_title">Category Title:<span style="color:red">* </span></label>
                <select class="form-control" id="category_title" name='category_id'>
                    @if($categorys)
                        @foreach($categorys as $category)
                                <option value='{{$category['id']}}'>{{$category['title']}}</option>
                        @endforeach
                    @endif
                </select>

            </div>

            <div class="form-outline mb-4">

                <label class="form-label" for="title">Story Title: <span style="color:red">* </span></label>
                <input class="form-control" type="text" name='title' id='title' value="" required />    

            </div>

            <div class="form-outline mb-4">

                <label class="form-label" for="content">Content: <span style="color:red">* </span></label>
                <textarea class="form-control" id="content" name="content" rows="4" placeholder="Write your story here" required></textarea>  

            </div>

            <div class="form-outline mb-4">

                <label class="form-label" for="image">Add Image <span style="color:red">* </span></label>
                <input class="form-control" type="file" id="image" name="image[]" multiple required >  

            </div>

            <div class="text-center pt-1 mb-5 pb-1">

                <button type="submit" class="btn btn-primary mb-3" name="submit" style="width: 100%;" value="submit" >Add Story</button>

            </div>

        </form>
    </div>


@endsection