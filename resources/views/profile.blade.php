@extends('master')

@section('content')
    <div class="container">
        <h1>{{ Auth::user()->name }}</h1>
        <p>{{ Auth::user()->email }}</p>
        <p>{{ Auth::user()->bio }}</p>
        <div>
            <h2>Adoption Plans</h2>
            <ul>
                @foreach ($adoptionplan as $adoptionplan)
                    <h5>Animal Name: {{ $adoptionlan->animal->name }}</h5>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

