<div class="modal fade" id="unhidePost{{$post->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h2 class="text-success">Unhide Post_{{$post->id}}</h2>
            </div>
            <div class="modal-header">
                <button data-bs-dismiss="modal" class="btn btn-outline-success">Close</button>
                <form action="{{route('admin.posts.unhide', $post->id)}}" method="get">
                    <button type="submit" class="btn btn-success">Unhide</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="hidePost{{$post->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h2 class="text-danger">Hide Post_{{$post->id}}</h2>
            </div>
            <div class="modal-header">
                <button data-bs-dismiss="modal" class="btn btn-outline-danger">Close</button>
                <form action="{{route('admin.posts.hide', $post->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hide</button>
                </form>
            </div>
        </div>
    </div>
</div>