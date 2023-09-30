<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
            <a class="navbar-brand" href="/">Online-shop</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Disabled</a>
                    </li>
                </ul>
                <div class="">
                    <ul class="navbar-nav mr-auto">
                        @auth
                            <li class="nav-item active">
                                <span class="nav-link text-success">Hi, {{ \Illuminate\Support\Facades\Auth::user()->name }}!</span>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="/">Cart<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item active">
                                <form action="{{ route('api.logout') }}" method="post">
                                    @csrf
                                    <button class="btn btn-link text-dark" type="submit">Logout</button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item active">
                                <a class="nav-link" href="/login">Login <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="/register">Register</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    @if(session('danger'))
        <div class="container">
            <div class="alert alert-danger center">
                {{ session('danger') }}
            </div>
        </div>
    @elseif(session('success'))
        <div class="container">
            <div class="alert alert-success center">
                {{ session('success') }}
            </div>
        </div>
    @else
        <br>
        <br>
    @endif

    <div class="container">
        @yield('content')
    </div>

{{--@yield('footer_scrip    ts')--}}
</body>
</html>
