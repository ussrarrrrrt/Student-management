@extends('layouts')

@section('content')
<div class="container">
    <h1>Détails de tech</h1>

    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">{{ $teacher?->nom }}</h5>
            <p class="card-text"><strong>Adresse :</strong> {{ $teacher?->address }}</p>
            <p class="card-text"><strong>Téléphone :</strong> {{ $teacher?->mobile }}</p>
        </div>
    </div>

    <a href="{{ route('teachers.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
</div>
@endsection