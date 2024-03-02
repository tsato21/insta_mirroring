@extends('layouts.app')

@section('title', 'Ad/Categories')

@section('content')
<div class="container">
    <table class="table table-hover">
        <thead class="table-primary align-middle">
            <th>ID</th>
            <th>Name</th>
            <th>Created_at</th>
            <th>Post Num</th>
            <th>Status</th>
            <th style="width:40px">Status Update</th>
            <th style="width:40px">Edit/Delete</th>
        </thead>
        @foreach($allCategories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>
                    @if($category->created_at)
                        {{$category->created_at}}
                    @else
                        Created by Seeder
                    @endif
                </td>
                <td>
                    <button class="btn btn-sm text-color fs-5" data-bs-toggle="modal" data-bs-target="#postDetails{{$category->id}}">
                        {{$category->posts->count()}}
                    </button>
                </td>
                <td>
                    @if($category->trashed())
                    <i class="fa-solid fa-circle text-secondary">
                        &nbsp; Hidden
                    </i>
                    @else
                    <i class="fa-solid fa-circle text-success">
                        &nbsp; Active
                    </i>
                    @endif
                </td>
                <td>
                    <div class="dropdown text-center">
                        <button class="btn" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>
                        <div class="dropdown-menu">
                            @if($category->trashed())
                                <button class="btn btn-sm dropdown-item text-success" data-bs-toggle="modal" data-bs-target="#unhideCategory{{$category->id}}">Unhide</button>
                            @else
                                <button class="btn btn-sm dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#hideCategory{{$category->id}}">Hide</button>
                            @endif
                        </div>
                        @include('admin.categories.modals.posts-details')
                        @include('admin.categories.modals.update-status')
                    </div>
                </td>
                <td>
                    <div class="dropdown text-center">
                        <button class="btn btn-sm" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu">
                            <button class="btn btn-sm dropdown-item" data-bs-toggle="modal" data-bs-target="#editCategory{{$category->id}}">
                                <div class="text-warning" >
                                    <i class="fa-solid fa-pen-nib"></i> Edit
                                </div>
                            </button>
                            <button class="btn btn-sm dropdown-item" data-bs-toggle="modal" data-bs-target="#forceDeleteCategory{{$category->id}}">
                                <div class="text-danger" >
                                    <i class="fa-solid fa-pen-nib"></i> Permanently Delete
                                </div>
                            </button>
                        </div>
                    </div>
                    @include('admin.categories.modals.edit-force-delete')
                </td>

            </tr>
            
        @endforeach
    </table>
</div>
@endsection