<a href="{{route('post.show', $post->id)}}" class="">
    <img src="{{asset('storage/images/' . $post->image)}}" alt="{{$post->image}}" class="w-100 align-items-center p-2">
</a>

<div class="mb-2 ps-3">
    <strong class="text-muted mb-2">{{$post->description}}</strong>
    
    @if($post->created_at->isToday())
        <div class="mb-2 text-muted">Posted {{ $post->created_at->diffForHumans() }}</div>
    @else
        <div class="mb-2 text-muted">{{ $post->created_at->format('M d, Y') }}</div>
    @endif
    
    <div class="mb-2">
        @if($post->categoryPost->count()>0)
            @foreach ($post->categoryPost as $categoryPost)
                @if(!$categoryPost->category->trashed())
                    <span class="badge bg-secondary bg-opacity-50">
                        {{$categoryPost->category->name}}
                    </span>
                @endif
            @endforeach
        @else
            <div class="text-muted">No category</div>
        @endif
    </div>

    <div class="row mt-2">
        <div class="col-auto">
            @include('users.posts.contents.likes.show')
        </div>
        <div class="col-auto">
            @include('users.posts.contents.comments.button')
        </div>
    </div>
</div>