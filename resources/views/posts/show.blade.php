@extends('layouts.master')

@section('title', $post->title)

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Post Detail</h3>
        </div>
        <div class="card-body">
            <h3>{{ $post->title }}</h3>
            <p>{{ $post->body }}</p>
            <a href="/posts" class="btn btn-outline-secondary">Back</a>
        </div>
    </div>
@endsection
