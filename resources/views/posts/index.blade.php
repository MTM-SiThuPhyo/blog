@extends('layouts.master')

@section('title', 'Home Page')

@section('content')

    @auth
    <div class="d-flex justify-content-end">
        <a class="btn btn-success" href="{{ route('posts.create') }}">Create A Post</a>
    </div>
    @endauth
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @foreach ($posts as $post)
        <div>
            <h3><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h3>
            <!-- {{ $post->created_at->format('M d, Y') }} by Mark -->
            <i>{{ $post->created_at->diffForHumans() }}</i> by {{ $post->user->name }}
            <p>{{ $post->body }}</p>
            <ul>
            @foreach ($post->categories as $category)
                <li>{{ $category->name }}</li>
            @endforeach
            </ul>
            @if($post->isOwnPost())
            <div class="d-flex justify-content-end">
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-success">Edit</a>
                <form action="{{ route('posts.destroy', $post->id) }}"
                    method="POST"
                    onsubmit="return confirm('Are you sure to delete?')">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-outline-danger ms-2">Delete</button>
                </form>
            </div>
            @endif
        </div>

        <hr>
    @endforeach

    {{ $posts->links() }}
@endsection  
