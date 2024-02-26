@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="row mb-3 shadow-sm">
    @include('users.profile.header')
</div>
    <div class="mt-2">
        @if($user->posts->count() > 0)
            <div class="row">
                @foreach ($user->posts as $post)
                    <div class="col-lg-4 col-md6 mb-4">
                        <a href="{{route('post.show', $post->id)}}">
                            <img src="{{asset('storage/images/' . $post->image)}}" alt="{{$post->image}}" class="img-grid">
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <h3 class="text-muted text-center">No Post Yet</h3>
        @endif
    </div>
@endsection