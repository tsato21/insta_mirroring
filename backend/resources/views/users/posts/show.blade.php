@extends('layouts.app')

@section('title', 'Show Post')

@section('content')

<div class="row border shadow mt-3">
    <div class="col-7 p-0 border-end">
        @include('users.posts.contents.body')
    </div>
    <div class="col-5">
        <div class="card border-0">
            <card class="card-header bg-white py-3">
                <div class="row align-items-center">
                    <div class="col-3">
                        <a href="{{route('profile.show', $post->user->id)}}">
                            @if($post->user->avatar)
                                <img src="{{asset('storage/avatars/' . $post->user->avatar)}}" alt="{{$post->user->avatar}}" class="w-100">
                            @else
                                <i class="fa-solid fa-circle-user text-secondary icon-md"></i>
                            @endif
                        </a>
                    </div>
                    <div class="col-5">
                        <a href="{{route('profile.show', $post->user->id)}}" class="text-decoration-none text-dark fs-5">{{$post->user->name}}</a>
                        <div class="text-muted">
                            <strong>{{$post->user->posts->count()}}</strong> {{$post->user->posts->count() === 1? "Post":"Posts"}}
                        </div>
                    </div>
                    <div class="col-3">
                        @if(Auth::user()->id === $post->user->id)
                            @include('users.posts.contents.edit-delete-button')
                        @endif
                    </div>
                </div>
                <div class="row mt-3">
                    @include('users.posts.contents.comments.show')                    
                </div>
            </card>
        </div>
    </div>

    
</div>
@endsection