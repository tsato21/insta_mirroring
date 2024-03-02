@extends('layouts.app')

@section('title', 'Ad/Posts')

@section('content')
<div class="cotainer">
    @foreach($allCategories as $category)
        {{$category->name}}
    @endforeach
    <table class="table table-hover border-0">
        <thead class="table-danger align-middle">
            <th>ID</th>
            <th></th>
            <th>User</th>
            <th>Image</th>
            <th>Description</th>
            <th>Category</th>
            <th>Created_At</th>
            <th>Status</th>
            <th style="width: 60px">Status Change</th>
            <th style="width: 50px">Edit/Delete</th>
        </thead>
        @foreach($allPosts as $post)
            <tr>
                <td>
                    {{$post->id}}
                </td>
                <td>
                    @if($post->user->avatar)
                        <img src="{{asset('storage/avatars/' . $post->user->avatar)}}" alt="{{$post->user->avatar}}" class="rounded-circle d-block mx-auto img-sm">
                    @else
                        <i class="fa-solid fa-circle-user text-secondary d-block text-center icon-sm"></i>
                    @endif
                </td>
                <td>{{$post->user->name}}</td>
                <td>
                    <img src="{{asset('storage/images/' . $post->image)}}" alt="{{$post->image}}" class="rounded-circle d-block img-sm">
                </td>
                <td>{{$post->description}}</td>
                <td>
                    @forelse($post->categoryPost as $categoryPost)
                        @if($categoryPost->category->trashed())
                            <span class="badge bg-secondary bg-opacity-10 text-decoration-line-through">{{$categoryPost->category->name}}</span>
                        @else
                            <span class="badge bg-secondary bg-opacity-50">{{$categoryPost->category->name}}</span>
                        @endif
                        
                    @empty
                        <div class="text-muted">No category</div>
                    @endforelse
                </td>
                <td>{{$post->created_at}}</td>
                <td>
                    @if($post->trashed())
                        <i class="fa-solid fa-circle text-secondary">
                            &nbsp; Hidden
                        </i>
                    @else
                        <i class="fa-solid fa-circle text-success">
                            &nbsp; Visible
                        </i>
                    @endif
                </td>
                <td>
                    <div class="dropdown">
                        <button class="btn" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>

                        <div class="dropdown-menu">
                            @if($post->trashed())
                                <button class="dropdown-item text-success" data-bs-toggle="modal" data-bs-target="#unhidePost{{$post->id}}">Unhide</button>
                            @else
                                <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#hidePost{{$post->id}}">Hide</button>
                            @endif
                        </div>
                        @include('admin.posts.modals.update-status')
                    </div>
                </td>
                <td>
                    <div class="dropdown text-center">
                        <button class="btn btn-sm" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>
                        <div class="dropdown-menu">
                            <button class="btn btn-sm dropdown-item" data-bs-toggle="modal" data-bs-target="#editPost{{$post->id}}">
                                <i class="fa-solid fa-pen-nib text-warning"></i> Edit
                            </button>
                            <button class="btn btn-sm dropdown-item" data-bs-toggle="modal" data-bs-target="#forceDeletePost{{$post->id}}">
                                <i class="fa-solid fa-pen-nib text-danger"></i> Delete
                            </button>
                        </div>
                    </div>
                    @include('users.posts.contents.modals.edit')
                    @include('admin.posts.modals.force-delete')
                </td>
            </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-center">
        {{$allPosts->links()}}
    </div>
</div>
@endsection