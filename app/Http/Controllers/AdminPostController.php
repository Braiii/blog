<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminPost;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Category;
use App\Models\Post;

class AdminPostController extends Controller
{
    public function __construct()
    {
       $this->middleware('admin');
    }

    public function create(): View
    {        
        return view('posts.admin.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(StoreAdminPost $request): RedirectResponse
    {
        Post::create(
            $request
                ->safe()
                ->merge([
                    'user_id' => auth()->id(),
                    'thumbnail' => $request->file('thumbnail')->store('thumbnails')
                    ])
                ->toArray()
        );

        return redirect('/')->with('success', 'Post successfully created.');
    }
}
