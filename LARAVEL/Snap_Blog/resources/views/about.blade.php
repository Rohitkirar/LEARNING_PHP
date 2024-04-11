@extends('layouts.app')

@section('title')
    About
@endsection

@section('main')
  <section class="jumbotron ">
      <div class="container shadow-lg mt-5 p-3 mb-5 bg-white rounded " style="background-color: whitesmoke;  ">
          <div class="text-center">
              <img src="../upload/snapchat.png" style="width:5% ;" alt="logo">
              <span style="font-size:xx-large;">ɮʟօɢ</span><br><br>
          </div>
          <p class="lead text-muted">
              A Snap blog is an online journal that displays information on a variety of topics.
              The blog is a shortened version of “ weblog ” which means web blog.
          </p>
          <div class="container d-flex" style="justify-content: space-around;">
              <div class="container p-4"><img src="../Upload/wp7348236-blogger-wallpapers.jpg" style="width:100% ;"
                      alt="img not found"></div>
              <div class="p-4 lead">
                  <p>Blogging can help you1234:</p>
                  <ol>
                      <li>Boost brand awareness</li>
                      <li>Increase credibility</li>
                      <li>Increase conversions and revenue</li>
                      <li>Drive traffic to your website</li>
                      <li>Grow online traffic</li>
                  </ol>
              </div>
          </div>
      </div>
      <div class="container shadow-lg mt-5 p-3 mb-5 bg-white rounded " style="background-color:gray; height:25rem ; ">
          <h1 class="jumbotron-heading">Join millions of others</h1>
          <p class="lead text-muted">
              Whether sharing your expertise, breaking news, or whatever’s on your mind,
              you’re in good company on Blogger. Sign up to discover why millions of people have published their passions
              here.
          </p>
          <p>
              <a href="login" class="btn btn-primary my-2">login here</a>
              <a href="register" class="btn btn-secondary my-2">Register</a>
          </p>
      </div>
  </section>
@endsection
