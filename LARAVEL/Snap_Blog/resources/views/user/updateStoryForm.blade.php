@extends('layouts.user')

@section('title') Edit Story @endsection

@section('main')
    <div class="container p-5 shadow-lg p-3 mb-5 mt-5 bg-white rounded" style="width:45%">
        <div class="text-center">
            
            <p>
                <img src="../../upload/snapchat.png" alt="logo" style="width:10%">
                <span style="font-size:x-large">ɮʟօɢ</span>
            </p>

            <h4 class="mt-1 pb-1">Update Story</h4>
            
        </div>
        
        <form  action="/post/{{$storyData['id']}}" method="post" enctype="multipart/form-data" >
            @method('put')
            @csrf

            <div class="form-outline mb-4">
            <label class="form-label" for="category_title">Category Title:</label>
            <select id="category_title" name='category_id' >
                {{-- <?php 
                    foreach($categoryArray as $key=>$values){
                            echo "<option value='". $categoryArray[$key]['id'] ."'>" . $categoryArray[$key]['Title'] . "</option>";
                    }
                ?> --}}
            </select>
            </div>
            
            <div class="form-outline mb-4">
            <label class="form-label" for="title">Story Title:</label>
            <input class="form-control" type="text" name='title' id='title' value="{{ $storyData['title'] }}" required />
            </div>
            
            <div class="form-outline mb-4">
            <label class="form-label" for="content">Content:</label>
            <textarea class="form-control" id="content" name="content" rows="10" required >{{ $storyData['content'] }}</textarea>
            </div>
            
            <div class="container mb-4" style="display:grid; grid-template-columns: auto auto;">
                <?php
                    
                    $imageArray = 0;
                    if($imageArray)
                        foreach($imageArray as $key=>$path){
                            if(count($imageArray)==1){
                            echo 
                                "<div class='card p-2 m-2 '   >
                                    <img src='../../upload/{$path['image']}' alt='image Not uploaded'/>
                                </div>";
                            }else{
                            echo 
                                "<div class='card p-2 m-2 '   >
                                    <img src='../../upload/{$path['image']}' alt='image Not uploaded'/>
                                    <a href=\"deleteImage.php?story_id={$resultArray[0]['story_id']}&image_id={$path['id']}\" class='btn btn-danger mt-2'>Delete</a>
                                </div>";
                            }
                        }
                ?>
            </div>

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
                <button class="form-control btn btn-primary" style="width:100%" type="submit" name='submit' value="{{ $storyData['id'] }}">Submit</button>
            </div>
        </form>
    </div>


@endsection
