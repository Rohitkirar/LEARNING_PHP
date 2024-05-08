<form action="{{route("posts.destroy" , $id)}}" method="POST">
    @csrf @method("DELETE")
    
    <button type="submit" class="btn btn-danger">
        Delete
    </button>

</form>