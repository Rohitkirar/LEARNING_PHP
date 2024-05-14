<div class="mt-5 p-5 pt-0" style="margin:0 auto">

    @isset($posts)

        <div class="album p-3 mb-4 bg-light">

            <h4 class="p-2">Top Posts</h4>

            <div class="d-flex p-2 flex-wrap">

                <div class="row">

                    @foreach ($posts as $post)
                        <div class="my-3" style="width:20%;">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" height="150rem"
                                    @if (count($post->images) > 0) src='{{ $post->images[0]->url }}' @endif
                                    alt="Card image cap" />
                                <div class="card-body">
                                    <p class="card-text">{{ $post->title }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                            {{-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> --}}
                                        </div>
                                        <small class="text-muted">9 mins</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>

        </div>
    @endisset

    @isset($categories)

        <div class="album p-3 mt-2 bg-light">

            <h4 class="p-2">Top Categories</h4>

            <div class="d-flex p-2">

                <div class="row">

                    @foreach ($categories as $category)
                        <div class="my-3" style="width:20%">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" height="200rem" src="{{ asset("$category->image->url") }}"
                                    alt="image">
                                <div class="card-body">
                                    <p class="card-text">{{ $category->title }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                            {{-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> --}}
                                        </div>
                                        {{-- <small class="text-muted">9 mins</small> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>

        </div>
    @endisset
