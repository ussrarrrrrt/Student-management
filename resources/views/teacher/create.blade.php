@extends('layouts')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5">Add New Teachers</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form method="post" action="{{ route('teachers.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Name</label>
                            <input class="form-control" name="nom" value="{{ old('nom') }}">
                        </div>
                        <div class="col-md-6">
                            <label>Adress</label>
                            <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Mobile</label>
                            <input class="form-control" name="mobile" value="{{ old('mobile ') }}">
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