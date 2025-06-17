@extends('master')
@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Pethub Centers</h2>

    <div class="row justify-content-center gx-4 gy-4">
        @foreach ($centres as $item)
            <div class="col-md-4 col-lg-3">
                <div class="card bg-dark text-white h-100 shadow">
                    <div class="card-body d-flex flex-column align-items-center text-center">
                        <h4 class="mb-3">{{ $item->name }}</h4>
                        <i class="bi bi-house-door" style="font-size: 120px; color: #f97316;"></i>

                        <div class="my-3 w-100">
                            <h5 class="mb-1"><strong>Name:</strong> {{ $item->name }}</h5>
                            <h5><strong>Location:</strong> {{ $item->location }}</h5>
                        </div>

                        <a href="/centre/{{ $item->id }}" class="btn btn-warning text-white mt-auto px-4">Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if (auth()->check() && auth()->user()->is_admin)
        <div class="d-flex justify-content-center my-5">
            <a href="/centre/create" class="btn btn-warning text-white px-5" style="max-width: 18rem;">+ Add Center</a>
        </div>
    @endif
</div>
@endsection
