<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminPost;
use App\Http\Requests\UpdateAdminPost;
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

    public function index(): View
    {
        return view('posts.admin.index', [
            'posts' => Post::paginate(3)
        ]);
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
            $request->safe()->merge([
                    'user_id' => auth()->id(),
                    'thumbnail' => $request->file('thumbnail')->store('thumbnails')
                ])->toArray()
        );

        return redirect('/')->with('success', 'Post created!');
    }

    public function edit(Post $post): View
    {
        return view('posts.admin.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    public function update(Post $post, UpdateAdminPost $request): mixed
    {
        $post->update(
            $request->safe()->merge([
                    'user_id' => auth()->id(),
                    'thumbnail' => $post->newThumbnail($request),
                ])->toArray()
        );

        return back()->with('success', 'Post Updated!');
    }
    
    public function destroy(Post $post): RedirectResponse
    {
        $post->deleteThumbnailFile();
        $post->delete();

        return redirect('/admin/posts')->with('success', 'Post Deleted!');
    }
}
