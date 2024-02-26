@if($post->isLiked())
    <form action="{{route('like.delete', $post->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm shadow-none">
            <i class="fa-solid fa-heart text-danger" style="font-size: 20px"></i>
        </button>
    </form>
    
@else
    <form action="{{route('like.create', $post->id)}}" method="get">
        @csrf
        <button type="submit" class="btn btn-sm shadow-none">
            <i class="fa-regular fa-heart text-danger" style="font-size: 20px"></i>
        </button>
    </form>
@endif
<span class="text-muted">{{$post->likes->count()}} {{$post->likes->count()<=1?"Like": "Likes"}} </span>