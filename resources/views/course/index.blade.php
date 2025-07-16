@extends('layouts')

@section('content')

<div class="row">


    <div class="row mb-3">
        <div class="col-md-6">
            <h2>Liste des courses</h2>
        </div>
        <div class="col-md-6 text-end">
            <a class="btn btn-success" href="{{ route('courses.create') }}">Créer un nouvel Course</a>
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
        <th>Nom</th>
        <th>syallbus</th>
        <th>duration</th>

        <th width="280px">Action</th>

    </tr>
    @php $i = ($courses->currentPage() - 1) * $courses->perPage(); @endphp
    @foreach ($courses as $course)

    <tr>

        <td>{{ ++$i }}</td>
        <td>{{ $course->nom }}</td>
        <td>{{ $course->syallbus}}</td>
        <td>{{ $course->duration }}</td>



        <td>

            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display: flex; gap: 5px;">
                <a class="btn btn-info btn-sm" href="{{ route('courses.show', $course->id) }}" title="Voir">
                    <i class="bi bi-eye"></i>
                </a>

                <a class="btn btn-primary btn-sm" href="{{ route('courses.edit', $course->id) }}" title="Modifier">
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



{!! $courses->links() !!}



@endsection