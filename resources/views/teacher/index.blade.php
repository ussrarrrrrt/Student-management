@extends('layouts')

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Liste des Teachers</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('teachers.create') }}"> Create New Teachers</a>
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
        @php $i = ($teachers->currentPage() - 1) * $teachers->perPage(); @endphp
        @foreach ($teachers as $teacher)

        <tr>

            <td>{{ ++$i }}</td>

            <td>{{ $teacher->nom}}</td>

            <td>{{ $teacher->address }}</td>
            <td>{{ $teacher->mobile }}</td>
            


            <td>

                <form action="{{ route('teachers.destroy',$teacher->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('teachers.show',$teacher->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('teachers.edit',$teacher->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>

  
<div class="d-flex justify-content-center mt-4 pagination-container">
    {!! $teachers->links() !!}
</div>

      

@endsection