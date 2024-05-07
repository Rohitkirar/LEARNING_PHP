@extends('layouts.admin')

@section("title" , "Create Category")

@section("content")

<h4 class="page-header">Create Category</h4>

<div class="col-sm-4">
    <x-categories.create-category />
</div>

<div class="col-sm-6" style="margin-left: 1rem">
    @isset($categories)
        <x-categories.all-category :$categories />
    @endisset
</div>

@endsection