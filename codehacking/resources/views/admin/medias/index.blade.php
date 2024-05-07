@extends('layouts.admin')

@section("title" , "Media")

@section("content")

<h4 class="page-header">All Media's</h4>

<div>
    <x-medias.media-datatable :$images />
</div>

@endsection