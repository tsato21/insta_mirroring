@extends('layouts.app')

@section('title','Following')

@section('content')

@include('users.profile.header')

<div class="row justify-content-center mt-3">
    <h2 class="text-muted">Following</h2>

    @if($user->following->isNotEmpty())
        @foreach($user->following as $following)
            <div class="row mt-3 align-items-center">
                <div class="col-auto">
                    <a href="{{route('profile.show',$following->followingUser->id )}}" class="text-decoration-none">
                        @if($following->followingUser->image)
                            <img src="{{asset('storage/avatars/'. $following->followingUser->image)}}" alt="img-sm">
                        @else
                            <i class="fa-regular fa-user icon-sm"></i>
                        @endif
                    </a>
                </div>
                <div class="col-auto">
                    <a href="{{route('profile.show', $following->followingUser->id)}}" class="text-decoration-none">
                        <div class="col-auto text-muted">
                        {{$following->followingUser->name}}
                        </div>
                    </a>
                </div>
                <div class="col-auto text-end">
                    @if(auth()->user()->id !== $following->followingUser->id)
                        @if($following->followingUser->isFollowed())
                            <form action="{{route('unfollow',$following->followingUser->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-secondary btn-sm">Following</button>
                            </form>
                        @else
                            <form action="{{route('follow',$following->followingUser->id)}}" method="get">
                                @csrf
                                <button class="btn btn-outline-secondary btn-sm">Follow</button>
                            </form>
                        @endif
                        
                    @endif
                </div>
            </div>
        @endforeach
    @else
        <div class="text-muted">No following yet</div>
    @endif
</div>

@endsection