<div class="row">
    <div class="col-auto">
        @if($user->avatar)
            <img src="{{asset('storage/avatars/' . $user->avatar)}}" alt="{{$user->avatar}}" class="img-profile">
        @else
            <i class="fa-solid fa-user icon-profile p-2"></i>
        @endif
    </div>
    <div class="col-8">
        <div class="row mb-3 align-items-center pt-4">
            <div class="col-auto">
                <h2>{{$user->name}}</h2>
            </div>
            <div class="col-auto text-center">
                <div class="mb-3">
                    <p class="text-muted fs-5 ps-2">
                        <strong>{{$user->posts->count()}} </strong>
                        <span class="fs-sm text-center" style="display: block;">{{$user->posts->count() <= 1? "Post":"Posts"}}</span>
                    </p>
                </div>
            </div>
            <div class="col-auto text-center">
                <div class="mb-2">
                    <p class="text-muted fs-5 ps-2">
                        <a href="{{route('following', $user->id)}}" class="text-decoration-none">
                            <strong>{{$user->following->count()}} </strong>
                            <span class="fs-sm text-center" style="display: block;">{{$user->following->count() <= 1? "Following":"Followings"}}</span>
                        </a>
                    </p>
                </div>
            </div>
            <div class="col-auto text-center">
                <div class="mb-2">
                    <p class="text-muted fs-5 ps-2">
                        <a href="{{route('followers', $user->id)}}" class="text-decoration-none">
                            <strong>{{$user->followers->count()}} </strong>
                            <span class="fs-sm text-center" style="display: block;">{{$user->followers->count() <= 1? "Follower":"Followers"}}</span>
                        </a>
                    </p>
                </div>
            </div>
            <div class="col-auto"> 
                <!-- Other items in the flex container -->
                
                @if(Auth::user()->id === $user->id)
                <div>
                    <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editProfile{{$user->id}}">Edit Profile</button>
                </div>
                @elseif($user->isFollowed())
                    <form action="{{route('unfollow',$user->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-secondary btn-sm">Following</button>
                    </form>
                @else
                    <a href="{{route('follow', $user->id)}}" class="btn btn-outline-secondary btn-sm">Follow</a>
                @endif
            </div>                     
            @include('users.profile.modal.edit')
        </div>
    </div>
</div>