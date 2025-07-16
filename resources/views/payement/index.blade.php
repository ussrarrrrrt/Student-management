
@extends('layouts')

@section('content')
<div class="container mt-4">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Liste des paiements</h2>
        <a href="{{ route('payement.create') }}" class="btn btn-success">
            Nouveau paiement
        </a>
    </div>

    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Étudiant</th>
                <th>Date</th>
                <th>Montant (DH)</th>
                <th width="160">Actions</th>
            </tr>
        </thead>
        <tbody>
            @php $i = ($payements->currentPage() - 1) * $payements->perPage(); @endphp
            @foreach($payements as $payement)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $payement->enrollment->student->name ?? '—' }}</td>
                    <td>{{ $payement->paid_date }}</td>
                    <td>{{ number_format($payement->amount,2) }}</td>
                    <td class="d-flex gap-1">
                        <a href="{{ route('payement.show',  $payement) }}"
                           class="btn btn-info btn-sm" title="Voir">
                           <i class="bi bi-eye"></i>
                        </a>

                        <a href="{{ route('payement.edit', $payement) }}"
                           class="btn btn-primary btn-sm" title="Modifier">
                           <i class="bi bi-pencil-square"></i>
                        </a>

                        <form action="{{ route('payement.destroy', $payement) }}"
                              method="POST"
                              onsubmit="return confirm('Supprimer ?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" title="Supprimer">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $payements->links('pagination::bootstrap-5') }}
</div>
@endsection
