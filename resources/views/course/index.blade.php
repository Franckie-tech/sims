@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Courses</h2>
    <a href="{{ route('course.create') }}" class="btn btn-primary">+ Add Course</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($courses->count() > 0)
<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($courses as $course)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $course->name }}</td>
            <td>
                <a href="{{ route('course.edit', $course->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('course.destroy', $course->id) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Are you sure you want to delete this course?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>No courses found. <a href="{{ route('course.create') }}">Add one now</a>.</p>
@endif
@endsection
