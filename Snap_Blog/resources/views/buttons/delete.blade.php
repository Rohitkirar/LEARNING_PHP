<form action="{{$route}}" method="post">
    @csrf @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>