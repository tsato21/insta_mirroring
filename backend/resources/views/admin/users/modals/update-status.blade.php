{{-- Deactivate Modal --}}
<div class="modal fade" id="deactivateUser{{$user->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h2 class="text-danger m-2">Are you sure to deactivate {{$user->name}}?</h2>
            </div>
            <div class="modal-footer">
                <form action="{{route('admin.deactivate', $user->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm">Deactivate</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Activate Modal --}}
<div class="modal fade" id="activateUser{{$user->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h2 class="text-success">Are you sure to activate {{$user->name}}?</h2>
            </div>
            <div class="modal-footer">
                <form action="{{route('admin.activate', $user->id)}}" method="get">
                    @csrf
                    <button class="btn btn-outline-success btn-sm" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-success btn-sm">Activate</button>
                </form>
            </div>
        </div>
    </div>
</div>