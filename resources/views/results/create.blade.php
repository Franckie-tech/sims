@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('results.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="student_id" class="form-label">Select Student</label>
        <select name="student_id" id="student_id" class="form-control" required>
            <option value="">-- Choose Student --</option>
            @foreach($students as $student)
                <option value="{{ $student->id }}">{{ $student->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="subject_id" class="form-label">Select Subject</label>
        <select name="subject_id" id="subject_id" class="form-control" required>
            <option value="">-- Choose Subject --</option>
            @foreach($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="marks" class="form-label">Marks</label>
        <input type="number" name="marks" id="marks" class="form-control" min="0" max="100" required>
    </div>

    <button type="submit" class="btn btn-primary">Save Result</button>
    <a href="{{ route('results.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection