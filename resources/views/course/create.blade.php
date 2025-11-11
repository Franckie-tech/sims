@extends('layouts.app')

@section('content')
<h2>Add Course</h2>

<form action="{{ route('course.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Course Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div>
        <label for="form-label">code</label>
        <input type="text" name="code" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('course.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
