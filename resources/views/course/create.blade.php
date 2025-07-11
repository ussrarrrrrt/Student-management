@extends('layouts')

@section('content')

<div class="container">

    <h3 align="center" class="mt-5">Add New Course</h3>

    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">

            <div class="form-area">
                <form method="post" action="{{ route('courses.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Name</label>
                            <input class="form-control" name="nom" value="{{ old('nom') }}">
                        </div>
                        <div class="col-md-6">
                            <label>Syallbus</label>
                            <input type="text" class="form-control" name="syallbus" value="{{ old('syallbus') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Duration</label>
                            <input class="form-control" name="duration" value="{{ old('duration ') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-success" value="Create">
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection

@push('css')
@endpush