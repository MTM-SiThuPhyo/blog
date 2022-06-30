@extends('layouts.master')

@section('title', $post->title)

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Post Detail</h3>
        </div>
        <div class="card-body">
            <h3>{{ $post->title }}</h3>
            <p>Post by <b>{{ $post->author }}</b> by <i>{{ $post->created_at->diffForHumans() }}</i></p>
            <p>{{ $post->body }}</p>
            <ul>
            @foreach ($post->categories as $category)
                <li>{{ $category->name }}</li>
            @endforeach
            </ul>
            <a href="/posts" class="btn btn-outline-secondary">Back</a>
        </div>
    </div>
@endsection
