@extends('layouts.admin')

@section("title" , "Category")

@section("content")

<h4 class="page-header">ALL Categories</h4>


<div>
    @isset($categories)
        <x-categories.categories-datatable :$categories />
    @endisset
</div>

@endsection