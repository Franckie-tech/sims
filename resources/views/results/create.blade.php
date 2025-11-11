@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Result</h2>
    <form action="{{ route('results.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="student_id">Student</label>
            <select name="student_id" id="student_id" class="form-control" required>
                <option value="">-- Select Student --</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="subject_id">Subject</label>
            <select name="subject_id" id="subject_id" class="form-control" required>
                <option value="">-- Select Subject --</option>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }} ({{ $subject->course->name }})</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="score">marks</label>
            <input type="number" step="0.01" min="0" max="100" name="score" id="score" class="form-control" required>
        </div>
        <button class="btn btn-success">Save Result</button>
        <a href="{{ route('results.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
