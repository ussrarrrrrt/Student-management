@extends('layouts')

@section('content')

    <div class="row">

        <div class="row mb-3">
        <div class="col-md-6">
            <h2>Liste des Teachers</h2>
        </div>
        <div class="col-md-6 text-end">
            <a class="btn btn-success" href="{{ route('teachers.create') }}">Créer un nouvel Teacher</a>
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
        @php $i = ($teachers->currentPage() - 1) * $teachers->perPage(); @endphp
        @foreach ($teachers as $teacher)

        <tr>

            <td>{{ ++$i }}</td>

            <td>{{ $teacher->nom}}</td>

            <td>{{ $teacher->address }}</td>
            <td>{{ $teacher->mobile }}</td>
            


            <td>

                 <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" style="display: flex; gap: 5px;">
                <a class="btn btn-info btn-sm" href="{{ route('teachers.show', $teacher->id) }}" title="Voir">
                    <i class="bi bi-eye"></i>
                </a>

                <a class="btn btn-primary btn-sm" href="{{ route('teachers.edit', $teacher->id) }}" title="Modifier">
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

  
<div class="d-flex justify-content-center mt-4 pagination-container">
    {!! $teachers->links() !!}
</div>

      

@endsection