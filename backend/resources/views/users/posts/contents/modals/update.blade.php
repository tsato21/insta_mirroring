<div class="modal fade" id="editPost{{$post->id}}" tabindex="-1" aria-labelledby="editPostLabel{{$post->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPostLabel{{$post->id}}">Edit Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="mb-3">
                        @if($allCategories->count() > 0)
                            <label class="form-label">Category</label>
                            @foreach($allCategories as $category)
                                <div class="form-check form-check-inline">
                                    @php
                                        $isChecked = $post->categoryPost->contains('category_id', $category->id);
                                    @endphp
                                    <input class="form-check-input" type="checkbox" name="category[]" id="category{{$category->id}}" value="{{$category->id}}" {{$isChecked ? 'checked' : ''}}>
                                    <label class="form-check-label" for="category{{$category->id}}">
                                        {{$category->name}}
                                    </label>
                                </div>
                            @endforeach
                        @else
                            No categories created yet.
                        @endif                    
                    </div>
                    <div class="row m-3">
                        <div class="col-3 pe-0">
                            <img src="{{asset('storage/images/' . $post->image)}}" alt="$post->image" class="w-100">
                        </div>
                        <div class="col-9 ps-3">
                            <input type="file" name="image" class="form-control" value="{{$post->image}}">
                            <div class="text-form ps-2 text-muted">Acceptable formats are jpeg, jpg, png.</div>
                            @error('image')
                                <p class="text-danger small">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row ps-2">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" value="{{$post->description}}">
                        @error('description')
                                <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <!-- Buttons for submitting changes or closing the modal -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            
        </div>
    </div>
</div>