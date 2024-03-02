<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Insta_Mirroring') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            {{-- HOME --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
                            </li>
                            {{-- CREATE POST --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('post.create') }}">{{ __('Create Post') }}</a>
                            </li>
                        
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a href="{{route('profile.show', auth()->user()->id)}}" class="text-decoration-none text-black dropdown-item">
                                        @if(Auth::user()->avatar)
                                            <img src="{{asset('storage/avatars/'. Auth::user()->avatar)}}" alt="{{Auth::user()->avatar}}" class="img-nav"> {{__('My Profile')}}
                                        @else
                                            <i class="fa-solid fa-circle-user icon-nav"></i> {{__('My Profile')}}
                                        @endif
                                        
                                    </a>

                                    {{-- @if(Auth::user()->role_id === 1)
                                        <a href="{{route('admin.home')}}" class="dropdown-item">
                                            <i class="fa-solid fa-gear icon-nav"></i>{{__('Admin')}}
                                        </a>
                                    @endif --}}
                                    @can('admin')
                                        <a href="{{route('admin.home')}}" class="dropdown-item">
                                            <i class="fa-solid fa-gear icon-nav"></i>{{__('Admin')}}
                                        </a>
                                    @endcan

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    {{-- LOGOUT --}}
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-2">
            <div class="container">
                <div class="row justify-content-center">
                    {{-- Admin Control --}}
                    <div class="col-2">
                        @if(request()->is('admin/*'))
                            <div class="list-group">
                                <div class="list-group-item">
                                    <a href="{{route('admin.users.index')}}" class="list-group-item {{request()->is('admin/users') ?"active": ""}}">
                                        <i class="fa-regular fa-user"></i> Users
                                    </a>
                                    <a href="{{route('admin.posts.index')}}" class="list-group-item {{request()->is('admin/posts') ? "active":""}}">
                                        <i class="fa-solid fa-signs-post"></i> Posts
                                    </a>
                                    <a href="{{route('admin.categories.index')}}" class="list-group-item {{request()->is('admin/categories') ? "active": ""}} ">
                                        <i class="fa-solid fa-list"></i> Category
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-10">
                        @yield('content')
                    </div>
                </div>
            </div>
            
        </main>
    </div>
</body>
</html>
