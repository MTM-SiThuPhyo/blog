@extends('layouts.master')

@section('title', 'Edit Category Page')
    
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Edit A Category</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('category.update', $category->id) }}" method="POST">
                @method('PUT')
                @include('categories._form')

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-outline-primary">Update</button>
                    <a href="{{ route('category.index') }}" class="btn btn-outline-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>

@endsection
