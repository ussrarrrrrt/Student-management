@extends('layouts')

@section('content')

<div class="row mb-3">
    <div class="col-md-6">
        <h2>Liste des Enrollments</h2>
    </div>
    <div class="col-md-6 text-end">
        <a class="btn btn-success" href="{{ route('enrollments.create') }}">Créer un nouvel Enrollment</a>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered table-striped">
    <thead class="table-light">
        <tr>
            <th>#</th>
            <th>Enroll No</th>
            <th>Promotion</th>
            <th>Student</th>
            <th>Join Date</th>
            <th>Fee</th>
            <th width="200px">Action</th>
        </tr>
    </thead>
    <tbody>
        @php $i = ($enrollments->currentPage() - 1) * $enrollments->perPage(); @endphp
        @foreach ($enrollments as $item)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $item->enroll_no }}</td>
                <td>{{ $item->promotion->title ?? 'N/A' }}</td>
                <td>{{ $item->student->name ?? 'N/A' }}</td>
                <td>{{ $item->join_date }}</td>
                <td>{{ number_format($item->fee, 2) }} MAD</td>
                <td>
                    <form action="{{ route('enrollments.destroy', $item->id) }}" method="POST" style="display: flex; gap: 5px;">
                        <a class="btn btn-info btn-sm" href="{{ route('enrollments.show', $item->id) }}" title="Voir">
                            <i class="bi bi-eye"></i>
                        </a>

                        <a class="btn btn-primary btn-sm" href="{{ route('enrollments.edit', $item->id) }}" title="Modifier">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" title="Supprimer" onclick="return confirm('Supprimer cet enrollment ?')">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{-- Pagination --}}
{!! $enrollments->links() !!}

@endsection
