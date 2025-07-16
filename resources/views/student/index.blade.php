@extends('layouts')

@section('content')

<div class="row">

     <div class="row mb-3">
        <div class="col-md-6">
            <h2>Liste des Students</h2>
        </div>
        <div class="col-md-6 text-end">
            <a class="btn btn-success" href="{{ route('students.create') }}">Créer un nouvel Students</a>
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

        <th>address</th>
        <th>mobile</th>

        <th width="280px">Action</th>

    </tr>
    @php $i = ($students->currentPage() - 1) * $students->perPage(); @endphp
    @foreach ($students as $student)

    <tr>

        <td>{{ ++$i }}</td>

        <td>{{ $student->name }}</td>

        <td>{{ $student->address }}</td>
        <td>{{ $student->mobile }}</td>



        <td>
            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: flex; gap: 5px;">
                <a class="btn btn-info btn-sm" href="{{ route('students.show', $student->id) }}" title="Voir">
                    <i class="bi bi-eye"></i>
                </a>

                <a class="btn btn-primary btn-sm" href="{{ route('students.edit', $student->id) }}" title="Modifier">
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



{!! $students->links() !!}



@endsection