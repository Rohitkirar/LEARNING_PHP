@extends('layouts.user')

@section('title') Post @endsection

@section('main')

@php 
  $postData = json_decode($postData , true);
@endphp

<div class="bg-light shadow-lg mt-3 " id="viewstorydiv" style="margin:0 auto; width:55% ; text-align:justify">

@if($postData)

  @foreach ($postData as $key=>$values)

    @php 
      $imageData = $values['images'];
      $likeData = $values['likes'];
      $commentData = $values['comments'];
      $category = $values['category'];
    @endphp

    <div class="p-4">
      <div class="d-flex " style="justify-content: space-between">
        <div>
          <h3>Title : {{$values['title']}}</h3>

          <h4>Category : {{ $category['title'] }}</h4>
        </div>
        <div class="d-flex h-100" >

          <a class="btn btn-primary" href="/posts/{{$values['id']}}/edit">update</a>

          <form method="POST" action="{{ route('posts.destroy' , $values['id'] ) }}">

            @csrf @method('delete')
            
            <button type="submit" class="btn btn-danger">delete</button>
          
          </form>
        </div>
      </div>
      
      @if ($imageData)
      <div>
        @foreach($imageData as $image)
          <img src="Upload/{{$image['url']}}" class="card" style="width:100%" alt="image unavailable">
        @endforeach
      </div>
      @endif

      <div>
        <p>{{$values['content']}}</p>
      </div>

      <div>
        <h5>Comments</h5>
        <hr>
        @if (count($commentData))
          
          @foreach($commentData as $commentvalues)

            <p>{{$commentvalues['content']}}</p>
          
          @endforeach

        @else
          <p>No comments available</p>
        @endif
      </div>

    </div>

  @endforeach

@else
  <p>No Post Available</p>    
@endif
</div>


<script src="../../public/js/editcomment.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="../../public/js/allstoryviewpage.js"></script>

@endsection


