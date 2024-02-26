<button class="btn btn-shadow-none" data-bs-toggle="modal" data-bs-target="#createComment{{$post->id}}">
    <i class="fa-regular fa-comment" style="font-size: 20px"></i>
</button>
@include('users.posts.contents.comments.modals.create')