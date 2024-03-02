<div class="modal fade" id="editProfile{{$user->id}}">
    <div class="modal-dialog">
        <div class="modal-content border-secondary">
            <div class="modal-header border-secondary">
                <h2>
                    Edit Profile
                </h2>
            </div>
            <div class="modal-body">
                <form action="{{route('profile.update', $user->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-4">
                            @if($user->avatar)
                            <img src="{{asset('storage/avatars/' . $user->avatar)}}" alt="{{$user->avatar}}" class="w-75">
                            
                            @else
                            <i class="fa-solid fa-user" style="font-size: 75px"></i>
                            @endif
                        </div>
                        <div class="col-auto align-self-end">
                            <input type="file" name="avatar" class="form-control form-control-sm mt-1">
                            <div class="form-text" id="avatra-info">
                                Acceptable formats: jpeg, jpg, png, gif
                                <br>
                                Maximum size: 1048KB
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Name</label>
                            <input type="text" class="form-control" name="name" value="{{$user->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}">
                        </div>
                    </div>
                    <button class="btn btn-outline-secondary bt-sm" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>