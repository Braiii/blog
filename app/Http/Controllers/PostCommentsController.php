<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostComments;
use App\Models\Post;

class PostCommentsController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function store(Post $post, StorePostComments $request)
    {
        $post->comments()->create(
            $request
                ->safe()
                ->merge(['user_id' => auth()->id()])
                ->toArray()
        );

        return back()
            ->with('success', 'Comment posted.');
    }
}
