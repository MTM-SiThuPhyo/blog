@extends('layouts.master')

@section('title', 'Edit Post Page')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3>Edit A Post</h3>
        </div>
        <div class="card-body">
            <form action="/posts/{{ $post->id }}" method="POST">
                @method('PUT')
                @csrf

                <div class="mb-3">
                    <label class="form-label">Post Title</label>
                    <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ $post->title }}">
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Post Body</label>
                    <textarea class="form-control  @error('body') is-invalid @enderror" name="body" rows="5">{{ $post->title }}</textarea>
                    @error('body')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <select class="form-select" name="category[]" multiple>
                        <option disabled>Choose...</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-outline-primary">Update</button>
                    <a href="/posts" class="btn btn-outline-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>

@endsection
