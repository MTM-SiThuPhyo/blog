@extends('layouts.auth')

@section('title', 'Login Page')

@section('content')

<div class="container">
    <div class="row vh-100 justify-content-center align-items-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header">Login Form</div>
                <div class="card-body">
                    <form action="/login" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="sithuphyo@gmail.com" value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter your Password" value="{{ old('password') }}">
                            @error('password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
