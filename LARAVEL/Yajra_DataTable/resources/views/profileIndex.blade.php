@extends('layouts.app')

@section("content")

<div class="container mt-2 bg-white p-3">
    <table class="table" id="user-table">
        <thead>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
        </thead>
    </table>
</div>

@endsection

@section("scripts")
$(document).ready(function(){
    $('#user-table').DataTable({
        processing:true,
        serverSide:true,
        ajax: '{{ route('profile.getDataTable') }}',
        columns:[
            {data : 'id' , name: 'Id'},
            {data : 'first_name' , name: 'first_name'},
            {data : 'last_name' , name: 'last_name'},
            {data : 'email' , name: 'Email'},
            {data : 'number' , name:"number"},

        ]
    })
});
@endsection