@extends('master')
@section('content')
    <div class="container">
        <h1>{{ Auth::user()->name }}</h1>
        <p>{{ Auth::user()->email }}</p>
        <p>{{ Auth::user()->bio }}</p>
        <div>
            <h2>Adoption Plans</h2>
            <ul>
                @forelse ($adoptionplan as $plan)
                    <li>
                        <h5>Animal Name: {{ $plan->animal->name }}</h5>
                    </li>
                @empty
                    <p>No adoption plans yet.</p>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
