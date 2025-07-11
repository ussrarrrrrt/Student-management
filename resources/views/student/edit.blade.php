@extends('layouts')

@section('content')

<div class="container">

    <h3 align="center" class="mt-5">Student Management</h3>

    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">

            <div class="form-area">
                <form method="post" action="{{url('students/'.$student->id)}}">
                    @csrf
                    @method("put")
                    <div class="row">
                        <div class="col-md-6">
                            <label> Name</label>
                            <input class="form-control" name="name" value="{{ $student->name }}">
                        </div>
                        <div class="col-md-6">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address" value="{{ $student->address }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Mobile</label>
                            <input class="form-control" name="mobile" value="{{ $student->mobile }}">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-primary" value="Update">
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