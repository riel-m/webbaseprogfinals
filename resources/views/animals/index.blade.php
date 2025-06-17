@extends('master')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center">Animals</h2>

    <div class="row justify-content-center g-4">
        @foreach ($animals as $item)
            <div class="col-md-4 col-lg-3">
                <div class="card bg-dark text-white shadow-sm h-100">
                    <a href="/animals/{{ $item->id }}" class="text-decoration-none text-white">
                        @if ($item->image)
                            <div class="position-relative" style="height: 300px;">
                                <img src="{{ asset('storage/' . $item->image) }}"
                                     class="card-img-top"
                                     alt="Animal photo"
                                     style="height: 100%; object-fit: cover;">

                                <div class="position-absolute bottom-0 w-100 p-2 text-center"
                                     style="background: rgba(0, 0, 0, 0.5);">
                                    <h5 class="mb-0">{{ $item->name }}</h5>
                                </div>
                            </div>
                        @else
                            <div class="d-flex align-items-center justify-content-center" style="height: 300px;">
                                <i class="fas fa-id-badge" style="font-size: 120px; color: #ccc;"></i>
                            </div>
                        @endif
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    @if (auth()->check() && auth()->user()->is_admin)
        <div class="text-center mt-5">
            <a href="/animals/create" class="btn btn-warning btn-lg px-5">
                <i class="bi bi-plus-circle me-2"></i> Add Animal
            </a>
        </div>
    @endif
</div>
@endsection
