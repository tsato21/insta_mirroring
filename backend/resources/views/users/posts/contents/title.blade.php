<div class="card-header bg-white py-3">
    <div class="row align-items-center">
        <div class="col-3 p-0">
            @if($post->user->avatar)
                <a href="{{route('profile.show', $post->user->id)}}">
                    <img src="{{asset('storage/avatars/' . $post->user->avatar)}}" alt="$post->user->avatar" class="w-50 ms-1">
                </a>
            @else
                <i class="fa-solid fa-user icon-size p-2" style="font-size: 25px"></i>
            @endif
        </div>
        <div class="col-3 p-0">
            <a href="{{route('profile.show', $post->user->id)}}" class="text-decoration-none text-muted">{{$post->user->name}}</a>
        </div>
        <div class="col-3"></div>
        <div class="col-auto">
            @php
                $followingButton = 'none';
                if(auth()->user()->id !== $post->user->id){
                    if ($post->user->isFollowed()){
                        $followingButton = 'unfollowButton';
                    } else {
                        $followingButton = 'followButton';
                    }
                }
            @endphp

            @if($followingButton === 'unfollowButton')
                <form action="{{route('unfollow', $post->user->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-secondary">Following</button>
                </form>
            @elseif($followingButton === 'followButton')
                <form action="{{route('follow',$post->user->id)}}" method="get">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-secondary">Follow</button>
                </form>
            @endif
        </div>
        <div class="col-auto">
            @if($post->user->id === auth()->user()->id)
                <div class="dropdown">
                    <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-user"></i>
                    </button>
                    <div class="dropdown-menu">
                        <button class="dropdown-item text-primary" data-bs-toggle="modal" data-bs-target="#editPost{{$post->id}}">edit</button>
                        <form action="{{route('post.delete', $post->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Are you sure to delete this post?')">delete</button>
                        </form>
                    </div>
                    @include('users.posts.contents.modals.update')
                </div>
            @endif
        </div>
    </div>
</div>