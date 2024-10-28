<x-layout>
    <x-slot:heading>
        Update post {{$post->title}}
    </x-slot:heading>
    
    <form method="POST" action="/posts/{{$post->id}}">
        @method('PUT')
        @csrf

        <label for="title">Title</label><br>
        <input type="text" name="title" id="title" value = "{{$post->title}}" required><br>
        <label for="content">Content</label><br>
        <textarea name="content" id="content" required>{{$post->content}}</textarea><br>

        <button type="submit">Update post</button>
    </form>


    <form method="POST" action="/posts/{{$post->id}}">
        @method('DELETE')
        @csrf
        <button type="submit">Delete post</button>
    </form>
</x-layout>