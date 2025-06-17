@extends('master')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Add New Pet</h2>

    <form action="/animals" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card shadow-sm">
            <div class="card-body">

                <div class="mb-3">
                    <label for="name" class="form-label">Pet Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                           id="name" name="name" placeholder="Enter pet's name">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="breed" class="form-label">Breed</label>
                    <input type="text" class="form-control @error('breed') is-invalid @enderror"
                           id="breed" name="breed" placeholder="Enter breed">
                    @error('breed')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input type="text" class="form-control @error('age') is-invalid @enderror"
                           id="age" name="age" placeholder="Enter age (e.g., 2 years)">
                    @error('age')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="centre_id" class="form-label">Centre</label>
                    <select class="form-select @error('centre_id') is-invalid @enderror" name="centre_id" id="centre_id">
                        <option value="" selected disabled>Select a centre</option>
                        @foreach ($centres as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('centre_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="/" class="btn btn-secondary">
                        &laquo; Back
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-plus-circle me-1"></i> Add Pet
                    </button>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection
