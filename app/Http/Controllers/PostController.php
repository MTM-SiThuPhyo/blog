<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\CategoryPost;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')
                ->paginate(5);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::get();
        return view('posts.create', compact('categories'));
    }

    public function store(PostRequest $request)
    {
        // $post = new Post();
        // $post->title = $request->title;
        // $post->body = $request->body;
        // $post->created_at = now();
        // $post->updated_at = now();
        // $post->save();
        $post = Post::create([
            'title' => $request->title,
            'body'  => $request->body,
            'user_id'   => auth()->id(),
        ]);
        foreach($request->category as $category) {
            CategoryPost::create([
                'category_id' => $category,
                'post_id'     => $post->id
            ]);
        }

        // Post::create($request->only(['title', 'body']));

        // Post::create($request->except(['_token']));
        // session()->flash('success', 'A post was created successfully');
        return redirect('/posts')->with('success', 'A post was created successfully');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::get();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);
        // $post->title = $request->title;
        // $post->body = $request->body;
        // $post->updated_at = now();
        // $post->save();

        $post->update([
            'title' => $request->title,
            'body'  => $request->body
        ]);

        CategoryPost::where('post_id', $id)->delete();
        foreach($request->category as $category) {
            CategoryPost::create([
                'category_id' => $category,
                'post_id'     => $id
            ]);
        }

        $post->update($request->only(['title', 'body']));
        // session()->flash('success', 'A post was updated successfully');
        return redirect('/posts')->with('success', 'A post was updated successfully');
    }

    public function show($id)
    {
        $post = Post::select('posts.*', 'users.name as author')
                    ->join('users', 'posts.user_id', 'users.id')
                    ->find($id);

        return view('posts.show', compact('post'));
    }

    public function destroy($id)
    {
        Post::destroy($id);

        return redirect('/posts')->with('success', 'A post was deleted successfully');
    }
}
