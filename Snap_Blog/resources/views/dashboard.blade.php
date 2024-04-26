@extends('layouts.app')

@section('title')
    dashboard
@endsection

@section('content')

    <x-home-content :$posts :$categories />

@endsection
