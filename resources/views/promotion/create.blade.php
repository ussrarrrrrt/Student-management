@extends('layouts')

@section('content')

<div class="container">

    <h3 align="center" class="mt-5">Add New promotion</h3>

    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">

            <div class="form-area">
                <form method="post" action="{{ route('promotions.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Name</label>
                            <input class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="course_id">Course</label>
                            <select name="course_id" id="course_id" class="form-control">
                                <option value="">-- Select a course --</option>
                                @foreach($courses as $course)
                                <option value="{{ $course->id }}" {{ old('course') == $course->id ? 'selected' : '' }}>
                                    {{ $course->nom }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>start_date</label>
                            <input type="date" class="form-control" name="start_date" value="{{ old('start_date') }}">
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