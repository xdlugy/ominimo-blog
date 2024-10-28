<x-layout>
    <x-slot:heading>
        Create a post
    </x-slot:heading>
    
    <form method="POST" action="/posts">
        @csrf

        <label for="title">Title</label><br>
        <input type="text" name="title" id="title" required><br>
        <label for="content">Content</label><br>
        <textarea name="content" id="content" required></textarea><br>

        <button type="submit">Add post</button>
    </form>
</x-layout>