@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="category" class="form-label me-2">Categories <span class="text-muted">(Up to 3)</span></label>
            @if($allCategories->count()>0)
                @foreach($allCategories as $category)
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="category[]" id="{{$category->id}}" value="{{$category->id}}" class="form-check-input">
                    <label for="" class="form-check-label">{{$category->name}}</label>
                </div>
                @endforeach
                @error('category')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            @else
                <div class="text-muted">No categories created yet. Create a new category from <strong><a href="#">HERE</a></strong>.</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="What's on your mind">{{old('description')}}</textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input class="form-control" type="file" id="image" name="image" arial-descripbedby="image-info">
            <div id="image-info" class="form-text">The acceptable formats are jpeg, png, and gif.</div>
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection