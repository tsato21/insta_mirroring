@extends('layouts.app')
@section('title', 'Ad/Users')

@section('content')
<div class="row ms-3 mt-2">
    <table class="table table-hover align-middle bg-white border-text-secondary">
        <thead class="small table-success text-secondary">
            <tr>
                <th></th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>CREATED_AT</th>
                <th>STATUS</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($allUsers as $user)
                <tr>
                    <td>
                        @if($user->avatar)
                            <img src="{{asset('storage/avatars/'. $user->avatar)}}" alt="{{$user->avatar}}" class="rounded-circle d-block mx-auto img-sm">
                        @else
                            <i class="fa-solid fa-circle-user text-secondary d-block text-center icon-sm"></i>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('profile.show', $user->id)}}" class="text-decoration-none text-dark fw-bold">{{$user->name}}</a>
                    </td>
                    <td>
                        <div class="text-muted">{{$user->email}}</div>
                    </td>
                    <td>
                        <div class="text-muted">{{$user->created_at}}</div>
                    </td>
                    <td>
                        @if($user->trashed())
                            <i class="fa-solid fa-circle text-secondary">
                                &nbsp; In-active
                            </i>
                        @else
                            <i class="fa-solid fa-circle text-success">
                                &nbsp; Active
                            </i>
                        @endif
                    </td>
                    <td>
                        @if(Auth::user()->id !== $user->id)
                            <div class="dropdown">
                                <button class="btn" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                
                                <div class="dropdown-menu">
                                    @if($user->trashed())
                                        <button class="btn" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#activateUser{{$user->id}}">
                                            <i class="fa-solid fa-user-check text-success"></i> Activate
                                        </button>
                                    @else
                                        <button class="btn" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deactivateUser{{$user->id}}"><i class="fa-solid fa-user-check text-danger"></i> Deactivate</button>
                                    @endif
                                </div>
                            </div>
                            @include('admin.users.modals.update-status')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection