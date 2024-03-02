<div class="modal fade" id="forceDeletePost{{$post->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="text-danger">Are you sure to permanentlly delete Post {{$post->id}} by {{$post->user->name}}</h2>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Close</button>
                <form action="{{route('admin.posts.force.delete', $post->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Permanently Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>