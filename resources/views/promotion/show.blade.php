@extends('layouts')

@section('content')
<div class="container">
    <h1>Détails de promotions</h1>

    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">{{ $promotion?->name }}</h5>
            <p class="card-text"><strong>Course:</strong> {{ $promotion?->Course->name }}</p>
            <p class="card-text"><strong>Start Date:</strong> {{ $promotion?->start_date }}</p>
        </div>
    </div>


    <a href="{{ route('promotions.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
</div>
@endsection