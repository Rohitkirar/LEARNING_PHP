@extends(Auth::check() ? 'layouts.app' : 'layouts.guest')

@section('title') Post @endsection

@section('content')

<div class="bg-light shadow-lg mt-3 " id="viewstorydiv" style="margin:0 auto; width:55% ; text-align:justify">

@if($post)

    @php 
      $images = $post['images'];
      $likes = $post['likes'];
      $comments = $post['comments'];
      $category = $post['category'];
    @endphp

    <div class="p-4">
      
      <div class="d-flex " style="justify-content: space-between">
        
        <div>
          <h3>Title : {{ $post->title }}</h3>

          @if($category)
            <h4>Category : {{ $category->title  }}</h4>
          @endif
        </div>

        <div class="d-flex h-100" >

          @auth

          <a class="btn btn-primary" href="{{ route('posts.edit' , $post->id ) }}/edit">update</a>

          <form method="POST" action="{{ route('posts.destroy' , $post->id ) }}">
            
            @csrf @method('delete')
            
            <button type="submit" class="btn btn-danger">delete</button>
          
          </form>

          @endauth
        </div>
      </div>
      
      @if ($images)

        <div>
          
          @foreach($images as $image)
            <img src='{{ asset($image->url) }}'  class="card" style="width:100%" alt="image unavailable">
          @endforeach

        </div>

      @endif

      <div>
        <p>{{stripslashes($post['content']) }}</p>
      </div>

      <div>
        <h5>Comments</h5>
        <hr>
        @if (count($comments))
          
          @foreach($comments as $comment)

            <p>{{$comment->content}}</p>
          
          @endforeach

        @else
          <p>No comments available</p>
        @endif
      </div>

    </div>

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