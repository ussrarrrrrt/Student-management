@extends('layouts')

@section('content')



<div class="row">

      <div class="row mb-3">
        <div class="col-md-6">
            <h2>Liste des Promotions</h2>
        </div>
        <div class="col-md-6 text-end">
            <a class="btn btn-success" href="{{ route('promotions.create') }}">Créer un nouvel Promotion</a>
        </div>
    </div>

</div>



@if ($message = Session::get('success'))

<div class="alert alert-success">

    <p>{{ $message }}</p>

</div>

@endif



<table class="table table-bordered">

    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Course</th>
        <th>start_date</th>

        <th width="280px">Action</th>

    </tr>
    @php $i = ($promotions->currentPage() - 1) * $promotions->perPage(); @endphp
    @foreach ($promotions as $promotion)

    <tr>

        <td>{{ ++$i }}</td>
        <td>{{ $promotion->name }}</td>

        <td>{{ $promotion->course->nom}}</td>
        <td>{{ $promotion->start_date }}</td>

        <td>
            <form action="{{ route('promotions.destroy', $promotion->id) }}" method="POST" style="display: flex; gap: 5px;">
                <a class="btn btn-info btn-sm" href="{{ route('promotions.show', $promotion->id) }}" title="Voir">
                    <i class="bi bi-eye"></i>
                </a>

                <a class="btn btn-primary btn-sm" href="{{ route('promotions.edit', $promotion->id) }}" title="Modifier">
                    <i class="bi bi-pencil-square"></i>
                </a>

                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" title="Supprimer" onclick="return confirm('Are you sure?')">
                    <i class="bi bi-trash"></i>
                </button>
            </form>
        </td>

    </tr>

    @endforeach

</table>



{!! $promotions->links() !!}



@endsection