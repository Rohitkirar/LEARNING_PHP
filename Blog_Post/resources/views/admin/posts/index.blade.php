<x-admin-master>

    @section('css')
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    @endsection

    @section('content')

        <div class="container-fluid">

            @if(session('post-delete'))
                <p class="alert alert-danger">{{session('post-delete')}}</p>
            @elseif(session('post-create'))
                <p class="alert alert-success">{{session('post-create')}}</p>
            @elseif(session('post-update'))
                <p class="alert alert-success">{{session('post-update')}}</p>
            @endif
            
            <!-- DataTables Example -->
            <div class="card shadow mb-4">
                
                <div class="card-header py-3">
                    <p class="h3 mb-2 text-gray-800">Posts</p>
                </div>

                <div class="container">
                    <form  class="d-flex float-right mt-2" action="{{route('posts.index')}}" method="GET">
                        <input type="text" name="search" class="form-control" style="border-radius:0;">
                        <button type="submit" class="btn btn-primary" style="border-radius:0;">search</button>
                    </form>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Posted By</th>
                                    <th>title</th>
                                    <th>content</th>
                                    <th>Image</th>
                                    <th>created_at</th>
                                    <th>updated_at</th>
                                    <th>deleted_at</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>id</th>
                                    <th>Posted By</th>
                                    <th>title</th>
                                    <th>content</th>
                                    <th>Image</th>
                                    <th>created_at</th>
                                    <th>updated_at</th>
                                    <th>deleted_at</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($posts as $key => $post)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>
                                            <a href="{{route('posts.edit' , $post->id)}}">{{ Str::limit($post->title, 20, '...') }}</a>
                                        </td>
                                        <td>{{ Str::limit($post->content, 50, '...') }}</td>
                                        <td class="text-center"><img src="{{ asset($post->image) }}" height="50px"
                                                alt=""></td>
                                        <td>{{ $post->created_at->diffForHumans() }}</td>
                                        <td>{{ $post->updated_at->diffForHumans() }}</td>
                                        <td>
                                            @can(auth()->user() , $post)
                                            @if ($post->deleted_at)
                                                {{ $post->deleted_at->diffForHumans() }}
                                            @else
                                                <form action="{{route('posts.destroy' , $post->id)}}" method="post" enctype="multipart/form-data">
                                                    @csrf @method('delete')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            @endif
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>

        <div class="text-center">
            {{$posts->links()}}
        </div>
    @endsection

    @section('scripts')

        {{-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script> --}}

        {{-- <script src="{{ asset('js/demo/datatables-demo.js') }}"></script> --}}
    @endsection

</x-admin-master>
