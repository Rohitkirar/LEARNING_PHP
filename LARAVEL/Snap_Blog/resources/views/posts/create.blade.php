@extends('layouts.user')

@section('title') create post @endsection

@section('main')

    <div class="container shadow-lg p-5 mt-5"  style="width:45%; margin:0 auto; border:1px solid lightgrey">
        <div class="text-center m-3">
            <img src="{{ asset('upload/snapchat.png')}}" alt="logo" style="width:10%">
            <span style="font-size:x-large">ɮʟօɢ</span>
        </div>

        <h5 class="text-center">Create Post</h5>

        <hr style="color:lightgrey">

        {!! Form::open([ 'route'=>'posts.store' , 'method'=>'POST' , 'files'=>true ]) !!}

            <div class="container mb-3">
                {!! Form::label('title' , 'Post Title' , ['class'=>'form-label']) !!}
                <span class="text-danger">*</span>
                <span class="text-danger " style="float: right">
                    @if ($errors->has('title'))
                        {{ $errors->first('title') }}
                    @endif
                </span>
                {!! Form::text('title' , null , ['class'=>'form-control']) !!}
            </div>

            <div class="container mb-3">
                {!! Form::label('category_id' , 'Category Title' , ['class'=>'form-label'] ) !!}
                <span class="text-danger">*</span>
                <span class="text-danger " style="float: right">
                    @if ($errors->has('category_id'))
                        {{ $errors->first('cateogory_id') }}
                    @endif
                </span>
                {!! Form::select('category_id' , $categories , null , [ 'class'=>'form-control' ]) !!}
            </div>

            <div class="container mb-3">
                {!! Form::label('content' , 'Content' , ['class'=>'form-label']) !!}
                <span class="text-danger">*</span>
                <span class="text-danger " style="float: right">
                    @if ($errors->has('content'))
                        {{ $errors->first('content') }}
                    @endif
                </span>
                {!! Form::textarea('content' , null , ['class'=>'form-control' , 'placeholder'=>'Type here...']) !!}
            </div>

            <div class="container mb-5">
                {!! Form::label('images' , 'Image Upload' , ['class' => 'form-label'] ) !!}
                <span class="text-danger">*</span>
                <span class="text-danger " style="float: right">
                    @if ($errors->has('images'))
                        {{ $errors->first('images') }}
                    @endif
                </span>
                {!! Form::file('images[]' , [ 'multiple'=>true ,  'id'=>'images' ,  'class'=>'form-control' ] ) !!}
            </div>

            <div class="container mb-3">
                {!! Form::submit('Add Post' , ['class'=>'form-control btn btn-primary' ]) !!}
            </div>

        {!! Form::close() !!}

    </div>
{{-- 
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
                    @if($categories)
                        @foreach($categories as $id => $title)
                                <option value='{{$id}}'> {{$title}} </option>
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
    </div> --}}


@endsection