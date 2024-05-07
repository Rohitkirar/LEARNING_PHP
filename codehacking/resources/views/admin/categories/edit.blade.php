@extends('layouts.admin')

@section("title" , "Edit Category")

@section("content")

<h4 class="page-header">Edit Category</h4>

<div class="container" style="width:50%">
    @isset($category)
        <x-categories.edit-category :$category />
    @endisset
</div>
@endsection