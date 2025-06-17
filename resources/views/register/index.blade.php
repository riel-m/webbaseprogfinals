@extends('master')
@section('content')

<main class="form-registration w-100 m-auto" style="max-width: 420px; padding: 15px;">
    <form action="/register" method="post" novalidate>
        @csrf
        <div class="text-center mb-4">
            <h1 class="h3 fw-normal">Registration Form</h1>
        </div>

        <div class="form-floating mb-3">
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}" required autofocus>
            <label for="name">Name</label>
            @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" value="{{ old('username') }}" required>
            <label for="username">Username</label>
            @error('username')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com" value="{{ old('email') }}" required>
            <label for="email">Email address</label>
            @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating mb-4">
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
            <label for="password">Password</label>
            @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
    </form>

    <small class="d-block text-center mt-3">
        Already a user? <a href="/login">Login here</a>
    </small>
</main>

@endsection
