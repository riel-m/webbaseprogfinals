@extends('master')
@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">{{ $centres->name }} Details</h2>

    <div class="d-flex justify-content-center">
        <div class="card bg-dark text-white p-4" style="max-width: 600px; width: 100%;">
            <div class="card-body d-flex align-items-center">
                <i class="bi bi-house-door" style="font-size: 140px; color: #f97316;"></i>

                <div class="ms-4 flex-grow-1">
                    <h5><strong>Name:</strong> {{ $centres->name }}</h5>
                    <h5><strong>Location:</strong> {{ $centres->location }}</h5>
                    <h5><strong>Telephone Numbers:</strong> {{ $centres->telephone }}</h5>
                    <h5><strong>Email:</strong> {{ $centres->email }}</h5>
                </div>
            </div>

            <form action="/centre/{{ $centres->id }}" method="POST" class="mt-4">
                @csrf
                @method('delete')
                <div class="d-flex justify-content-between">
                    <a href="/centre" class="btn btn-dark">&laquo; Back</a>

                    @if (auth()->check() && auth()->user()->is_admin)
                        <div>
                            <a href="/centre/{{ $centres->id }}/edit" class="btn btn-warning text-white me-2">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
