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
        <x-nav-link href="/" active="{{ request()->is('/') }}" type="{{ request()->is('/') }}">Home</x-nav-link>
        <x-nav-link href="/posts" active="{{ request()->is('about') }}" type="{{ request()->is('about') }}">Posts</x-nav-link>
    </nav>
    <header>
        <h1>{{ $heading }}</h1>
    </header>
    {{ $slot }}
</body>
</html>