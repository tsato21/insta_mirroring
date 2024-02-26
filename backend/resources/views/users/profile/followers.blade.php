@extends('layouts.app')

@section('title', 'Followers')

@section('content')

@include('users.profile.header')

<div class="row justify-content-center">
    <h2 class="text-muted">Followers</h2>
    @if($user->followers)
        @foreach($user->followers as $follower)
            <div class="row align-item-center">
                <div class="col-auto">
                    <a href="{{route('profile.show',$follower->followedUser->id )}}" class="text-decoration-none">
                        @if($follower->followedUser->image)
                            <img src="{{asset('storage/avatars/'. $follower->followedUser->image)}}" alt="img-sm">
                        @else
                            <i class="fa-regular fa-user icon-sm"></i>
                        @endif
                    </a>
                    <a href="{{route('profile.show', $follower->followedUser->id)}}" class="text-decoration-none">
                        <div class="col-auto text-muted">
                        {{$follower->followedUser->name}}
                        </div>
                    </a>
                </div>
                <div class="col-auto">
                    @if(auth()->user()->id !== $follower->followedUser->id)
                        @if($follower->followedUser->isFollowed())
                            <form action="{{route('unfollow', $follower->followedUser->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-secondary btn-sm">Following</button>
                            </form>
                        @else
                            <form action="{{route('follow', $follower->followedUser->id)}}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-outline-secondary btn-sm">Follow</button>
                            </form>
                        @endif
                    @endif
                </div>
            </div>
        @endforeach
    @else
        Not being followed yet
    @endif
</div>

@endsection