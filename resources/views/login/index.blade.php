@extends('master')
@section('content')

<main class="form-signin w-100 m-auto" style="max-width: 400px; padding: 2rem;">
  @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  @if (session()->has('fail'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('fail') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <h1 class="h3 mb-4 fw-semibold text-center">Please Sign In</h1>

  <form action="/login" method="post" novalidate>
    @csrf

    <div class="form-floating mb-3">
      <input
        type="email"
        name="email"
        id="email"
        class="form-control @error('email') is-invalid @enderror"
        placeholder="name@example.com"
        value="{{ old('email') }}"
        autofocus
        required
      >
      <label for="email">Email address</label>
      @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-floating mb-4">
      <input
        type="password"
        name="password"
        id="password"
        class="form-control @error('password') is-invalid @enderror"
        placeholder="Password"
        required
      >
      <label for="password">Password</label>
      @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <button class="w-100 btn btn-lg btn-primary mb-3" type="submit">Sign In</button>
  </form>

  <div class="text-center">
    <small>Don't have an account? <a href="/register">Register now!</a></small>
  </div>
</main>

@endsection
