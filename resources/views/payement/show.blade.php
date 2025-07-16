@extends('layouts')

@section('content')
<div class="container mt-4">
    <h2>Détail du paiement</h2>

    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">Paiement #{{ $payement->id }}</h5>

            <p class="card-text">
                <strong>Étudiant :</strong>
                {{ $payement->enrollment->student->name ?? '—' }}
            </p>

            <p class="card-text">
                <strong>Date de paiement :</strong>
                {{ $payement->paid_date->format('d/m/Y') }}
            </p>

            <p class="card-text">
                <strong>Montant :</strong>
                {{ number_format($payement->amount,2) }} DH
            </p>
        </div>
    </div>

    <a href="{{ route('payements.index') }}" class="btn btn-secondary mt-3">
        Retour à la liste
    </a>
</div>
@endsection

