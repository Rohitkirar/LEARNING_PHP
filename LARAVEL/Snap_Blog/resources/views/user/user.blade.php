@extends('layouts.user')

@section('title') User @endsection

@section('maincontent')

{{-- <div class="container" style="display:grid; grid-template-columns:25% 25% 25% 25%">
  
  @foreach($result as $values)
    
    <div class="card m-3 p-3 shadow-lg">
      
      <p>{{$values['id']}}</p>
      <p>{{$values['title']}}</p>
    
    </div>
  
  @endforeach

</div> --}}

{{-- 
<div class="album py-2 bg-light">
  <h3>Latest Story</h3>

  <div class="container">

    <div class="" style="display : grid ; grid-template-columns:auto auto auto auto; ">
      <?php

      foreach ($storyArray as $key => $values) {
      ?>
        <div class="m-3 shadow-lg card">
          <div class="box-shadow ">
            <?php
            $imageArray = $image->imageDetails($values['story_id']);
            if ($imageArray) {
            ?>
              <img class="card-img-top" style="height:10rem ; object-fit:fill;" src="../../Upload/<?php echo $imageArray[0]['image'] ?>" alt="image not found">
            <?php } ?>

          </div>
          <div class=" m-2 text-center">
            <div class="card-body" style="min-height:6rem ; text-align:justify">
              <h6 style="font-size:12px">Category :
                <?php echo $values['category_title'] ?>
              </h6>
              <h6 style="font-size:12px">Title :
                <?php echo $values['story_title'] ?>
              </h6>
            </div>
            <div class="btn-group mb-2">
              <a href="storyView.php?story_id=<?php echo $values['story_id'] ?>" class="btn btn-sm btn-outline-primary">View</a>
            </div>
          </div>
        </div>
      <?php } ?>

    </div>
  </div>
</div> --}}

@endsection