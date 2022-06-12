<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body'  => 'required|min:5'
        ], [
            'title.required' => 'ခေါင်းစဉ်ထည့်ပါ။',
            'body.required' => 'အ‌ကြောင်းအရာထည့်ပါ။',
            'body.min'  => 'အနည်းဆုံး၅လုံးထည့်ပါ။'
        ]);
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->created_at = now();
        $post->updated_at = now();
        $post->save();
        return redirect('/posts');
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'body'  => 'required|min:5'
        ], [
            'title.required' => 'ခေါင်းစဉ်ထည့်ပါ။',
            'body.required' => 'အ‌ကြောင်းအရာထည့်ပါ။',
            'body.min'  => 'အနည်းဆုံး၅လုံးထည့်ပါ။'
        ]);
        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->updated_at = now();
        $post->save();

        return redirect('/posts');
    }

    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }

    public function destroy($id)
    {
        Post::destroy($id);

        return redirect('/posts');
    }
}
