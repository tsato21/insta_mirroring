<div class="col-4">
    <h2 class="text-dark mt-2">Suggested Users</h2>
    <div class="row">
        <ul class="list-group">
            @foreach($suggestedUsers as $user)
                <li class="list-group-item shadow-sm rounded-3">
                    <div class="row">
                        <div class="col-auto">
                            @if($user->avatar)
                            <a href="{{route('profile.show', $user->id)}}">
                                <img src="{{asset('storage/avatars/' . $user->avatar)}}" alt="$user->avatar" class="img-sm">
                            </a>
                            
                            @else
                            <a href="{{route('profile.show', $user->id)}}">
                                <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                            </a>
                            @endif
                        </div>
                        <div class="col-auto">
                            <a href="{{route('profile.show', $user->id)}}" class="text-decoration-none">
                                <div class="text-muted">{{$user->name}}</div>
                            </a>
                        </div>
                        <div class="col-auto">
                            @if($user->isFollowed())
                                <form action="{{route('unfollow', $user->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-secondary">Following</button>
                                </form>
                            @else
                                <a href="{{route('follow', $user->id)}}" class="btn btn-sm btn-outline-secondary">Follow</a>
                            @endif
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>