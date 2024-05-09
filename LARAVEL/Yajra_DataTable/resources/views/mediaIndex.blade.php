@extends('layouts.app')

@section('content')

<table class="table" id="media-table">
    <thead>
        <th>Id</th>
        <th>url</th>
        <th>Model Id</th>
        <th>Model Name</th>
    </thead>
</table>
    
@endsection

@section('scripts')
    $(document).ready(function(){
    $("#media-table").DataTable({
        processing:true,
        serverSide:true,
        ajax : '{{route('getMediaData')}}' ,
        columns : [
            { data : 'id' , name : "id" }, 
            { data : 'url' , name : "url" }, 
            { data : 'imageable_id' , name : "imageable_id" },
            { data : 'imageable_type' , name : "imageable_type" },
        ]
    });
});
    
@endsection