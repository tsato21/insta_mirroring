@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="row align-item-end m-3">
        <div class="col-3">
            @if(request()->is('show/all'))
                <a href="{{route('home')}}" class="btn btn-sm btn-secondary">Posts of Following Users</a>
            @else
                <a href="{{route('show.all')}}" class="btn btn-sm btn-secondary">All Posts</a>
            @endif
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-8 bg-light">
            @forelse ($allPosts as $post)
                <div class="card mb-4">
                    @include('users.posts.contents.title')
                    @include('users.posts.contents.body')
                </div>
            @empty
                <div class="text-center">
                    <h2>Share Posts</h2>
                    <p class="text-muted">
                        Users that you follow have not posted anything. <a href="{{route('post.create')}}" class="text-decoration-none">HERE</a>.
                    </p>
                </div>
            @endforelse
        </div>
        {{-- Profile Overview --}}
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
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        
    </div>
@endsection