<div class="dropdown">
    <button class="btn btn-secondary btn-sm" type="button" id="actionDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-solid fa-user icon-size p-2" style="font-size: 10px"></i>
    </button>
    <ul class="dropdown-menu" aria-labelledby="actionDropdown">
        <li>
            <button class="dropdown-item text-primary" data-bs-toggle="modal" data-bs-target="#editPost{{$post->id}}">
            <i class="fa-solid fa-pen text-primary"></i> Edit
            </button>
        </li>
        <li>
            <form action="{{route('post.delete', $post->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Are you sure you want to delete this post?');">
                    <i class="fa-solid fa-trash"></i> Delete
                </button>
            </form>
        </li>
    </ul>
</div>
@include('users.posts.contents.modals.edit')