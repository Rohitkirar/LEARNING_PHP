<x-admin-master>

    @section('css')
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    @endsection

    @section('content')

        <div class="container-fluid">

            <!-- DataTables Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h1 class="h3 mb-2 text-gray-800">Posts</h1>
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
                                        <td>{{ Str::limit($post->title, 20, '...') }} </td>
                                        <td>{{ Str::limit($post->content, 50, '...') }}</td>
                                        <td class="text-center"><img src="{{ asset($post->image) }}" height="50px"
                                                alt=""></td>
                                        <td>{{ $post->created_at->diffForHumans() }}</td>
                                        <td>{{ $post->updated_at->diffForHumans() }}</td>
                                        <td>
                                            @if ($post->deleted_at)
                                                {{ $post->deleted_at->diffForHumans() }}
                                            @else
                                                null
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    @endsection

    @section('scripts')

        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>

        <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    @endsection

</x-admin-master>
