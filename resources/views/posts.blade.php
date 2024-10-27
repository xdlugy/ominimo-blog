<x-layout>
    <x-slot:heading>
        Posts
    </x-slot:heading>
    
    <ul>
@foreach($posts as $post)
    <li>
        <a href="/posts/{{$post['id']}}">
        {{$post['title']}}: {{$post['created_at']}}
        </a>
    </li>
@endforeach
    </ul>

</x-layout>