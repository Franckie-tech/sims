@extends('layouts.app')

@section('content')
<h2>Edit Course</h2>

<form action="{{ route('course.update', $course->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Course Name</label>
        <input type="text" name="name" class="form-control" value="{{ $course->name }}" required>
    </div>

    <div>
        <label for="form-label">code</label>
        <input type="text" name="code" class="form-control" value="{{ $course->code }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('course.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
