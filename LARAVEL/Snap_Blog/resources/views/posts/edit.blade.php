@extends('layouts.user')

@section('title') Edit Story @endsection

@php

    if(isset($post['images']))
        $images = $post['images'];
    else 
        $images = 0 ;

@endphp

@section('main')
    <div class="container p-5 shadow-lg p-3 mb-5 mt-5 bg-white rounded" style="width:45%">
        <div class="text-center">
            <p>
                <img src="../../Upload/snapchat.png" alt="logo" style="width:10%">
                <span style="font-size:x-large">ɮʟօɢ</span>
            </p>

            <h4 class="mt-1 pb-1">Update Story</h4>         
        </div>
        
        <form  action="{{ route( 'posts.update' , $post['id'] )}}" method="post" enctype="multipart/form-data" >
            @method('patch') @csrf

            <div class="form-outline mb-4">
                <label class="form-label" for="category_title">Category Title:</label>
                <select id="category_title" name='category_id' >

                    @foreach($categorys as $category)
                        @if($category['id'] == $post['category']['id'])
                            <option value="{{ $category['id'] }}" selected> {{ $category['title'] }} </option>
                        @else
                            <option value="{{ $category['id'] }}"> {{ $category['title'] }} </option>
                        @endif
                    @endforeach

                </select>
            </div>
            
            <div class="form-outline mb-4">
                <label class="form-label" for="title">Story Title:</label>
                <input class="form-control" type="text" name='title' id='title' value="{{ $post['title'] }}" required />
            </div>
            
            <div class="form-outline mb-4">
                <label class="form-label" for="content">Content:</label>
                <textarea class="form-control" id="content" name="content" rows="10" required >{{ stripslashes($post['content']) }}</textarea>
            </div>
            
            @if($images)
            <div style="display:grid; grid-template-columns: auto auto;">
                @foreach($images as $image)

                    @if(count($images)==1)
                        <div class='card m-2 p-2'  >
                            <img src="../../upload/{{$image['url']}}" style="object-fit: contain" alt='image Not uploaded'/>
                        </div>
                    @else 
                        <div class='card m-2 p-2'>
                            <img src="../../upload/{{ $image['url'] }}" style="object-fit: contain" alt='image Not uploaded'/>
                            <a href="#" class='btn btn-danger mt-2'>Delete</a>
                        </div>
                    @endif

                @endforeach
            </div>           
            @endif

 

            <div class="form-outline mb-4">
                <label class="form-label" for="image">Add Image</label>
                <input class="form-control" type="file" id="image" name="image[]" multiple />
            </div>

            <div class="form-outline mb-4">
                <label class="form-label">Story Status:</label><br>
                <input type="radio" name="status" value="1" checked>Active<br>
                <input type="radio" name="status" value="0">Hide<br>
            </div>
            
            <div class="form-label" class="form-outline mb-4">
                <button class="form-control btn btn-primary" style="width:100%" type="submit" name='submit'>Submit</button>
            </div>
        </form>
    </div>


@endsection
