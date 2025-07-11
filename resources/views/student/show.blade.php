@extends('layouts')

@section('content')
<div class="container">
    <h1>Détails de l'étudiant</h1>

    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">{{ $student?->name }}</h5>
            <p class="card-text"><strong>Adresse :</strong> {{ $student?->address }}</p>
            <p class="card-text"><strong>Téléphone :</strong> {{ $student?->mobile }}</p>
        </div>
    </div>

    <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
</div>
@endsection