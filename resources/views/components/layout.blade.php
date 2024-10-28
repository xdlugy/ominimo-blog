<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Document</title>
</head>
<body>
    <nav>
        <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
        <x-nav-link href="/posts" :active="request()->is('posts')">Posts</x-nav-link>
        @guest
            <x-nav-link href="/login" :active="request()->is('login')">Login</x-nav-link>
            <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
        @endguest

        @auth
        <x-nav-link href="/posts/create" :active="request()->is('register')">Create post</x-nav-link>
            <form method="POST" action="/logout">
                @csrf
                
                <button type="submit">Logout</button>
            </form>
        @endauth
    </nav>
    <header>
        <h1>{{ $heading }}</h1>
    </header>
    {{ $slot }}
</body>
</html>