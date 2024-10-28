<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use DateTime;

class PostController extends Controller
{
    public function showall() {
        return view('posts', [
            'posts' => Post::all()
        ]);
    }

    public function show($id) {

        $post = Post::find($id);
        $user = User::find($post['user_id'])['name'];
        $comments = Post::find($id)->comments;
        foreach($comments as $comment) {
            $comment_username = User::find($comment['user_id'])['name'];
            $comment['username'] = $comment_username;
        }

        return view('post', ['post' => $post, 'user' => $user, 'comments' => $comments]);
    }

    public function create() {
        return view('post.create');
    }

    public function store() {
        request()->validate([
            'title' => ['required', 'min:3'],
            'content' => ['required']
        ]);

        Post::create([
            'user_id' => Auth::id(),
            'title' => request('title'),
            'content' => request('content'),
            'created_at' => new DateTime()
        ]);

        return redirect('/posts');
    }

    public function edit($id) {
        $post = Post::find($id);

        Gate::authorize('edit-post', $post);

        return view('post.edit', ['post' => $post]);
    }

    public function update($id) {
        $post = Post::find($id);
        
        Gate::authorize('edit-post', $post);

        request()->validate([
            'title' => ['required'],
            'content' => ['required']
        ]);

        $post->update([
            'title' => request('title'),
            'content' => request('content')
        ]);

        return redirect('/posts/'.$post->id);
    }

    public function destroy($id){
        $post = Post::find($id);

        Gate::authorize('edit-post', $post);

        $post->delete();

        return redirect('/posts');
    }
}
