@extends('master')
@section('content')
<div class="container my-5">
    <h1 class="mb-3">{{ Auth::user()->name }}</h1>
    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
    @if(Auth::user()->bio)
        <p><strong>Bio:</strong> {{ Auth::user()->bio }}</p>
    @endif

    <div class="mt-5">
        <h2>Adoption Plans</h2>
        @if(!empty($adoptionplan) && $adoptionplan->count())
            <ul class="list-group">
                @foreach ($adoptionplan as $plan)
                    <li class="list-group-item">
                        <strong>Animal Name:</strong> {{ $plan->animal->name }}
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-muted">No adoption plans yet.</p>
        @endif
    </div>
</div>
@endsection
