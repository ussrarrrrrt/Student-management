@extends('layouts')

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Liste des Students</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('students.create') }}"> Create New Student</a>
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

                <form action="{{ route('students.destroy',$student->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('students.show',$student->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>

  

    {!! $students->links() !!}

      

@endsection