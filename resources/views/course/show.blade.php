@extends('layouts')

@section('content')
<div class="container">
    <h1>Détails de Cours</h1>

    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">{{ $course?->nom }}</h5>
            <p class="card-text"><strong>Syallbus :</strong> {{ $course?->syallbus }}</p>
            <p class="card-text"><strong>Duration :</strong> {{ $course?->duration }}</p>
        </div>
    </div>

    <a href="{{ route('courses.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
</div>
@endsection