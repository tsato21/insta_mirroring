<div class="modal fade" id="postDetails{{$category->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="text-secondary">Lists of Posts with {{$category->name}}</h2>
            </div>
            <div class="modal-body">
                <table class="table table-hover w-100">
                    <thead class="text-secondary">
                        <th>ID</th>
                        <th></th>
                        <th>Use</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Categories</th>
                        <th>Create_At</th>
                        <th>Status</th>
                    </thead>

                    @php
                        $allPosts = $category->posts;
                    @endphp

                    @foreach($allPosts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>
                            @if($post->user->avatar)
                                <img src="{{asset('storage/avatars/'. $post->user->avatar)}}" alt="{{$post->user->avatar}}" class="img-sm">
                            @else
                                <i class="fa-solid fa-user icon-sm"></i>
                            @endif
                        </td>
                        <td>{{$post->user->name}}</td>
                        <td>
                            @if($post->image)
                                <img src="{{asset('storage/images/' . $post->image)}}" alt="{{$post->image}}" class="img-sm">
                            @else
                            <i class="fa-solid fa-image icon-sm"></i>
                            @endif
                        </td>
                        <td>{{$post->description}}</td>
                        <td>
                            @forelse($post->categoryPost as $categoryPost)
                                <span class="badge bg-secondary bg-opacity-50">{{$categoryPost->category->name}}</span>
                            @empty
                                <div class="text-muted">No Category</div>
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
                                &nbsp; Active
                            </i>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </table>
                <div class="text-danger">*To manage posts, click <a href="{{route('admin.posts.index')}}" class="fw-bold">HERE</a>.</div>
            </div>
        </div>
    </div>
</div>