<div class="modal fade" id="hideCategory{{$category->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h2 class="text-danger">Are you sure to hide {{$category->name}}</h2>
            </div>
            <div class="modal-footer">
                <form action="{{route('admin.categories.hide', $category->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger btn-sm">Hide</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="unhideCategory{{$category->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h2 class="text-success">Are you sure to unhide {{$category->name}}</h2>
            </div>
            <div class="modal-footer">
                <form action="{{route('admin.categories.unhide', $category->id)}}" method="get">
                    <button class="btn btn-sm btn-outline-success" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm">unhide</button>
                </form>
            </div>
        </div>
    </div>
</div>