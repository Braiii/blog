<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Models\Category;
use App\Models\Post;
use Illuminate\View\View;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('store');
        $this->middleware('admin')->only('create');
    }

    public function index(): View
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author']
            ))->paginate(6)->withQueryString()
        ]);
    }

    public function show(Post $post): View
    {
        return view('posts.show', [
            'post' => $post,
            'comments' => $post
                ->comments()
                ->latest()
                ->paginate(10)
        ]);
    }

    public function create(): View
    {        
        return view('posts.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(StorePost $request): mixed
    {
        Post::create(
            $request
                ->safe()
                ->merge(['user_id' => auth()->id()])
                ->toArray()
        );

        return redirect('/')->with('success', 'Post successfully created.');
    }
}
