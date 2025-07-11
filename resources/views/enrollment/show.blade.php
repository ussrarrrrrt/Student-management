@extends('layouts')

@section('content')
<div class="container">
    <h1>Détails de l’enrollment</h1>

    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">
                Enrollment #{{ $enrollment->enroll_no }}
            </h5>

            <p class="card-text"><strong>Student :</strong>
                {{ $enrollment->student->name }}
            </p>

            <p class="card-text"><strong>Promotion :</strong>
                {{ $enrollment->promotion->name }}
            </p>

            <p class="card-text">
                <strong>Join Date :</strong>
                {{ \Carbon\Carbon::parse($enrollment->join_date)->format('d/m/Y') }}
                
            </p>

            <p class="card-text"><strong>Fee :</strong>
                {{ number_format($enrollment->fee, 2) }} MAD
            </p>
        </div>
    </div>

    <a href="{{ route('enrollments.index') }}"
        class="btn btn-secondary mt-3">
        Retour à la liste
    </a>
</div>
@endsection