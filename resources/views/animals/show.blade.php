@extends('master')

@section('content')
@if(session('error'))
<div class="container mt-3">
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
</div>
@endif

<div class="container mt-5">
    <h2 class="text-center mb-4">{{ $animals->name }}'s Profile</h2>

    <div class="row justify-content-center">
        <div class="card bg-dark text-white col-md-8 shadow p-4">
            <div class="row g-4 align-items-center">
                <div class="col-md-5">
                    @if ($animals->image)
                        <img src="{{ asset('storage/' . $animals->image) }}" alt="Animal photo"
                             class="img-fluid rounded" style="height: 360px; object-fit: cover;">
                    @else
                        <div class="d-flex justify-content-center align-items-center" style="height: 360px;">
                            <i class="fas fa-id-badge" style="font-size: 180px; color: #aaa;"></i>
                        </div>
                    @endif
                </div>

                <div class="col-md-7">
                    <ul class="list-unstyled">
                        <li><h5><strong>Name:</strong> {{ $animals->name }}</h5></li>
                        <li><h5><strong>Breed:</strong> {{ $animals->breed }}</h5></li>
                        <li><h5><strong>Age:</strong> {{ $animals->age }}</h5></li>
                        @if ($animals->centre)
                            <li><h5><strong>Center:</strong> {{ $animals->centre->name }}</h5></li>
                        @endif
                        <li class="mt-3">
                            <h5><strong>Description:</strong></h5>
                            <p class="text-light">{{ $animals->desc }}</p>
                        </li>
                        <h5>People who want to adopt: {{ $animals->adoption_plans_count }}</h5>
                        @if($animals->centre)
                            <li class="mt-2">
                                <a href="/centre/{{ $animals->centre->id }}" class="btn btn-outline-warning btn-sm">
                                    Visit {{ $animals->name }}'s Center
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>

            <div class="mt-4 d-flex justify-content-between flex-wrap">
                <a href="/animals" class="btn btn-secondary"><< Back</a>

                <div class="d-flex flex-wrap">
                    @auth
                        @if (auth()->user()->is_admin)
                            <a href="/animals/{{ $animals->id }}/edit" class="btn btn-info mx-2">Edit</a>

                            <form action="/animals/{{ $animals->id }}" method="POST" class="mx-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @endif

                        {{-- Adoption Form with Limit Check --}}
                        @if(!$animals->adoptionPlans->contains('user_id', auth()->id()))
                            <form action="{{ route('adoptionplan.store', ['animal' => $animals->id]) }}" method="POST" class="mx-2">
                                @csrf
                                <input type="hidden" name="animal_id" value="{{ $animals->id }}">
                                <button type="submit" class="btn btn-warning text-white">Adopt Me</button>
                            </form>
                        @else
                            <div class="alert alert-info mx-2 my-0 align-self-center py-2">
                                You've already adopted this animal!
                            </div>
                        @endif
                    @else
                        <div class="alert alert-warning mx-2 my-0 align-self-center py-2">
                            Please login to adopt this animal
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
