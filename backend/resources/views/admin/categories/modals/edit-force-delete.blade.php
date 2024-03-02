<div class="modal fade" id="editCategory{{$category->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="text-warning">Edit {{$category->name}}</h2>
            </div>
            <form action="{{route('admin.categories.update', $category->id)}}" method="post">
                @csrf
                @method('PATCH')
                    <div class="modal-content">
                        <div class="m-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{$category->name}}">
                        </div>
                        @error('name')
                            <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-sm btn-outline-warning" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning btn-sm">Update</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="forceDeleteCategory{{$category->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="text-danger">Are you sure to delete {{$category->name}}</h2>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-outline-danger" data-bs-dismiss="modal">Close</button>
                <form action="{{route('admin.categories.force.delete', $category->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Permanently Delete</button>
                </form>
                
            </div>
        </div>
    </div>
</div>