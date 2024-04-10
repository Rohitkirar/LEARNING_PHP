@extends('layouts.user')

@section('title') Post @endsection

@section('maincontent')


<div class="bg-light mt-3" id="viewstorydiv" style="margin:0 auto; width:55%">
  @foreach ($storyData as $key=>$values)
    @php 
      $imageData = $values['postImages'];
      $likeData = $values['postLikes'];
      $commentData = $values['postComments'];
      $category = $values['category'];
    @endphp
{{$category}}
    <div>
      <a class="btn btn-primary" href="/post/{{$values['id']}}/edit">update</a>
      <h1>Title : {{$values['title']}}</h1>
      {{-- <h1>Category : {{ $category['title'] }}</h1> --}}

      <p>{{$values['content']}}</p>

      @if (count($commentData))
        @foreach($commentData as $commentvalues)
          <p>{{$commentvalues['content']}}</p>
        @endforeach
      @else
        <p>No comments available</p>
      @endif

    </div>

  @endforeach

</div>


<script src="../../public/js/editcomment.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="../../public/js/allstoryviewpage.js"></script>

@endsection


