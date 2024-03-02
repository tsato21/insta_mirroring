<div class="modal fade" id="deleteUser{{$user->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h2 class="text-danger">Are you sure to delete your account?</h2>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-outline-danger" data-bs-dismisss="modal">Close</button>
                <form action="{{route('profile.delete', $user->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>