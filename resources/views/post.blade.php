<x-layout>
    <x-slot:heading>
        Post
    </x-slot:heading>
    
    <div>
        Author: {{$user}}
        Created at: {{$post['created_at']}}
    </div>

    <h2>
        {{$post['title']}}
    </h2>

    <div>
        {{$post['content']}}
    </div>
    <br>

    @can('edit-post', $post)
        <a href="/posts/{{$post->id}}/edit">Edit post</a><br>
    @endcan

<h2>Comments:</h2>

    <ul>
@foreach($comments as $comment)
    <li>
        {{$comment['username']}}: {{$comment['created_at']}}<br>
        {{$comment['content']}}
        @can('delete-comment', $comment)
            <form method="POST" action="/comments/{{$comment->id}}">
                @method('DELETE')
                @csrf

                <button type="submit">Remove comment</button>
            </form>
        @endcan
    </li>
@endforeach
    </ul>

    @auth
<h3>Add comment</h3>
    <form method="POST" action="/posts/{{$post->id}}/comments">
        @csrf

        <label for="content">Content</label><br>
        <textarea name="content" id="content" required></textarea><br>
        <button type="submit">Add comment</button>
    </form>
    @endauth
</x-layout>