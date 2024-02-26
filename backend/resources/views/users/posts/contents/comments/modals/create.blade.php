<div class="modal fade" id="createComment{{$post->id}}">
    <div class="modal-dialog">
        <div class="modal-content border-secondary">
            <div class="modal-header">
                Add your comment on this post
            </div>
            <div class="modal-body">
                <form action="{{route('comment.create', $post->id)}}" method="get">
                    <textarea name="comment" id="" cols="50" rows="5" placeholder="Add comment..."></textarea>
                    <div>
                        <button type="submit" class="btn btn-outline-secondary">Comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>