@extends(Auth::check() ? 'layouts.app' : 'layouts.guest')

@section('title')
    Categories
@endsection

@section('content')

@if($categories)

    <x-category-content :$categories />

@else

    <p>No Category Avaiable !</p>

@endif
@endsection
