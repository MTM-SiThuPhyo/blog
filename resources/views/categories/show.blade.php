@extends('layouts.master')

@section('title', $category->name)

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Category Detail</h3>
        </div>
        <div class="card-body">
            <h3>{{ $category->name }}</h3>
            <a href="/categories" class="btn btn-outline-secondary">Back</a>
        </div>
    </div>
@endsection
