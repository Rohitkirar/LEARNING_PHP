        <div class="dropdown">
          
            <button class="btn p-0" type="button" id="MonthlyCampaign" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ti ti-dots-vertical ti-sm text-muted"></i>
            </button>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="MonthlyCampaign">     

                <a class="dropdown-item text-outline-primary" href="{{route('admin.posts.show' , $post->id)}}"><i class="fa-solid fa-eye"></i> View</a>
                
                <a class="dropdown-item text-outline-primary" href="{{route('admin.posts.pages' , $post->id)}}"><i class="fa-solid fa-eye"></i> View Pages</a>
                
                <a class="dropdown-item text-outline-primary" href="{{route('admin.posts.edit' , $post->id)}}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                
                @if($post->deleted_at)
                    <form action="{{route('admin.posts.restore' , $post->id)}}" method="POST">
                        @csrf
                        <button type="submit" class="border-0 bg-transparent text-success dropdown-item"><i class="fa-solid fa-redo"></i> Restore</button>
                    </form>
                @else
                    <form action="{{route('admin.posts.destroy' , $post->id)}}" method="POST">
                        @csrf @method("delete")
                        <button type="submit" class="border-0 bg-transparent text-danger dropdown-item"><i class="fa-solid fa-trash"></i> Delete</button>
                    </form>
                @endif
                
            </div>
        </div>