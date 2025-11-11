@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Student</h2>

      {{-- ✅ Success message --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Name:</label>
            <input type="text" name="name" value="{{ old('name', $student->name) }}" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Registration Number:</label>
            <input type="text" name="registration_number" value="{{ old('registration_number', $student->registration_number) }}" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Course:</label>
            <input type="text" name="course" value="{{ old('course', $student->course) }}" class="form-control">
        </div>


        <button type="submit" class="btn btn-success">Update Student</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
