@extends('layouts')

@section('content')

<div class="container">

    <h3 class="text-center mt-5">Add New Enrollment</h3>

    <div class="row">
        <div class="col-md-2"></div>

        <div class="col-md-8">

            <div class="form-area">

                <form method="POST" action="{{ route('enrollments.store') }}">
                    @csrf

                    {{-- première ligne --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Enroll&nbsp;No</label>
                            <input type="text"
                                   name="enroll_no"
                                   value="{{ old('enroll_no') }}"
                                   class="form-control @error('enroll_no') is-invalid @enderror">
                            @error('enroll_no')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="promotion_id">Promotion</label>
                            <select name="promotion_id"
                                    id="promotion_id"
                                    class="form-control @error('promotion_id') is-invalid @enderror">
                                <option value="">-- Select a promotion --</option>
                                @foreach ($promotions as $promotion)
                                    <option value="{{ $promotion->id }}"
                                        {{ old('promotion_id') == $promotion->id ? 'selected' : '' }}>
                                        {{ $promotion->name /* ou $promotion->title */ }}
                                    </option>
                                @endforeach
                            </select>
                            @error('promotion_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- deuxième ligne --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label" for="student_id">Student</label>
                            <select name="student_id"
                                    id="student_id"
                                    class="form-control @error('student_id') is-invalid @enderror">
                                <option value="">-- Select a student --</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}"
                                        {{ old('student_id') == $student->id ? 'selected' : '' }}>
                                        {{ $student->name /* ou full_name */ }}
                                    </option>
                                @endforeach
                            </select>
                            @error('student_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Join&nbsp;Date</label>
                            <input type="date"
                                   name="join_date"
                                   value="{{ old('join_date') }}"
                                   class="form-control @error('join_date') is-invalid @enderror">
                            @error('join_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- troisième ligne --}}
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Fee&nbsp;(MAD)</label>
                            <input type="number"
                                   step="0.01"
                                   name="fee"
                                   value="{{ old('fee') }}"
                                   class="form-control @error('fee') is-invalid @enderror">
                            @error('fee')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- bouton --}}
                    <button type="submit" class="btn btn-success">
                        Create
                    </button>
                    <a href="{{ route('enrollments.index') }}" class="btn btn-link">
                        Cancel
                    </a>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
