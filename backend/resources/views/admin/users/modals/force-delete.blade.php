<div class="modal fade" id="forceDeleteProfile{{$user->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h2 class="text-danger">Are you sure to force-delete (permanent deletion) the user: {{$user->name}}</h2>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-outline-danger" data-bs-dismiss="modal">Close</button>
                <form action="{{route('admin.users.force.delete', $user->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>