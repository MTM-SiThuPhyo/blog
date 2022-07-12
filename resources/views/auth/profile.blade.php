@extends('layouts.master')

@section('title', 'My Profile')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Edit Profile</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Profile Image</label>
                    <div class="row">
                        <div class="col-md-6">
                        <input class="form-control @error('image') is-invalid @enderror" type="file" name="image">
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="col-md-6">
                            @if($profile->path)
                            <img src="{{ Storage::url($profile->path) }}" class="card-img-top" alt="..." style="width: 30%;">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Si Thu Phyo" value="{{ $profile->name }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="sithuphyo@gmail.com" value="{{ $profile->email }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your Password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" placeholder="Enter your Confirm  Password" class="form-control">
                </div>
                <button type="submit" class="btn btn-outline-primary">Update</button>
            </form>
        </div>
    </div>
</div>

@endsection