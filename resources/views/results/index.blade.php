@extends('layouts.app')

@section('content')
<div class="container">
    <h2>All Results</h2>
    <a href="{{ route('results.create') }}" class="btn btn-primary mb-3">Add Result</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Student</th>
                <th>Course</th>
                <th>Subject</th>
                <th>Score</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $result)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $result->student->name }}</td>
                <td>{{ $result->subject->course->name }}</td>
                <td>{{ $result->subject->name }}</td>
                <td>{{ $result->marks }}</td>
                <td>
                    <a href="{{ route('results.edit', $result->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('results.destroy', $result->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this result?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
