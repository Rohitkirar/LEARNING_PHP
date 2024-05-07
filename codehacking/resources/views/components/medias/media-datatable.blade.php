<table class="table">

<thead>
    <th>Id</th>
    <th>Image</th>
    <th>Model Id</th>
    <th>Model Name</th>
    <th>created_at</th>
    <th>updated_at</th>
    {{-- <th>deleted_at</th> --}}
</thead>
<tbody>
    @foreach ($images as $image)    
        <tr>
            <td> {{ $image->id }} </td>
            <td> <img height="80rem" src="{{ $image->image }}" alt=""></td>
            <td> {{ $image->imageable_id }} </td>
            <td> {{ basename($image->imageable_type) }} </td>
            <td> {{ $image->created_at->diffForHumans() }} </td>
            <td> {{ $image->updated_at->diffForHumans() }} </td>
            {{-- <td> {{ $image->deleted_at }} </td> --}}
        </tr>
    @endforeach
    
</tbody>

</table>