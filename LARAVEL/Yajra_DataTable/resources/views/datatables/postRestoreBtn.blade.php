<form action="{{route("posts.restore" , $id)}}" method="POST">
    @csrf @method("PATCH")

    <button type="submit" class="btn btn-success">
        Restore
    </button>

</form>