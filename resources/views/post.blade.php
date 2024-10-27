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
Comments:

    <ul>
@foreach($comments as $comment)
    <li>
        {{$comment['username']}}: {{$comment['created_at']}}<br>
        {{$comment['content']}}
    </li>
@endforeach
    </ul>

</x-layout>