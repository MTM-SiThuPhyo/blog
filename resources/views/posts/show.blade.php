@extends('layouts.master')

@section('title', $post->title)

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Post Detail</h3>
        </div>
        <div class="card-body">
            <h3>{{ $post->title }}</h3>
            <i>{{ $post->created_at->diffForHumans() }}</i> by {{ $post->author_name }}
            <p>{{ $post->body }}</p>
            <a href="/posts" class="btn btn-outline-secondary">Back</a>
        </div>
    </div>
@endsection
