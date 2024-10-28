<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use DateTime;

class CommentController extends Controller
{
    public function store($id) {
        request()->validate([
            'content' => ['required']
        ]);

        Comment::create([
            'post_id' => $id,
            'user_id' => Auth::id(),
            'content' => request('content'),
            'created_at' => new DateTime()
        ]);

        return redirect('/posts/'.$id);
    }

    public function destroy($id) {
        $comment = Comment::find($id);

        Gate::authorize('delete-comment', $comment);

        $comment->delete();

        return redirect('/posts');
    }
}
