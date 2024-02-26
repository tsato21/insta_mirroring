@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="row align-item-end m-3">
        <div class="col-3">
            @if(request()->is('show/all'))
                <a href="{{route('home')}}" class="btn btn-sm btn-secondary">Only Posts of Following Users</a>
            @else
                <a href="{{route('show.all')}}" class="btn btn-sm btn-secondary">All Posts</a>
            @endif
        </div>
    </div>
    <div class="row gx-5">
        <div class="col-8 bg-light">
            @forelse ($postsOfFollowingUsers as $post)
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
        @include('users.suggested-users')
        
    </div>
@endsection