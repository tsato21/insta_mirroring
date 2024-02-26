<div class="m-3 comment-range">
    <ul class="list-group">
        @if($post->comments->count()>0)
            <div class="text-dark"><strong>{{$post->comments->count()}}</strong> {{$post->comments->count() === 1? "comment":"comments"}}</div>
            @forelse ($post->comments()->latest()->take(5)->get() as $comment)
                <li class="list-group-item border-0 p-0">
                    <a href="{{route('profile.show', $comment->user_id)}}" class="text-decoration-none fw-bold">
                        {{$comment->user->name}}
                    </a>
                    <div class="text-muted">{{$comment->body}}</div>
                    @if($comment->user_id === auth()->user()->id)
                        <form action="{{route('comment.delete', $comment->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            &middot;
                            <button type="submit" class="border-0 bg-transparent text-danger p-0 xsmall" onclick="return confirm('Are you sure to delete the comment?')">Delete</button>
                        </form>
                    @endif
                    <div class="text-muted text-end">{{$comment->created_at->diffForHumans()}}</div>
                </li>
            @endforeach
        @else
            <div class="text-muted m-3">No comments so far</div>
            <hr>
        @endif
    </ul>
</div>

