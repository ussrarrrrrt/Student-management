@extends('layouts')

@section('content')
<div class="container mt-5">
    <h3 class="text-center mb-4">Add new payement</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('payement.store') }}">
        @csrf

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="enrollment_id" class="form-label">Enrollment (Student)</label>
                <select name="enrollment_id" id="enrollment_id" class="form-control" required>
                    <option value="">-- Select an enrollment --</option>
                    @foreach($enrollments as $enrollment)
                        <option value="{{ $enrollment->id }}"
                                {{ old('enrollment_id') == $enrollment->id ? 'selected' : '' }}>
                            {{ $enrollment->student->name }} (ID {{ $enrollment->id }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Paid date</label>
                <input type="date"
                       name="paid_date"
                       class="form-control"
                       value="{{ old('paid_date') }}"
                       required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label">Amount (DH)</label>
                <input type="number"
                       name="amount"
                       step="0.01"
                       class="form-control"
                       value="{{ old('amount') }}"
                       required>
            </div>
        </div>

        <button class="btn btn-success">Create</button>
        <a href="{{ route('payement.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
