@extends('layouts.master')

@section('title', 'Home Page')

@section('content')

    <div class="d-flex justify-content-end">
        <a class="btn btn-success" href="/posts/create">Create A Post</a>
    </div>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @foreach ($posts as $post)
        <div>
            <h3><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
            January 1, 2021 by Mark
            <p>{{ $post->body }}</p>
            <div class="d-flex justify-content-end">
                <a href="/posts/{{ $post->id }}/edit/" class="btn btn-outline-success">Edit</a>
                <form action="/posts/{{ $post->id }}"
                    method="POST"
                    onsubmit="return confirm('Are you sure to delete?')">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-outline-danger ms-2">Delete</button>
                </form>
            </div>
        </div>

        <hr>
    @endforeach

@endsection  
