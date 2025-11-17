@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Result</h2>

    {{-- Display validation errors --}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('results.update', $result->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 10px;">
            <label for="student_id">Student:</label><br>
            <select name="student_id" id="student_id" required>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}" {{ $result->student_id == $student->id ? 'selected' : '' }}>
                        {{ $student->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 10px;">
            <label for="subject_id">Subject:</label><br>
            <select name="subject_id" id="subject_id" required>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ $result->subject_id == $subject->id ? 'selected' : '' }}>
                        {{ $subject->name }} ({{ $subject->course->name }})
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 10px;">
            <label for="marks">Marks:</label><br>
            <input type="number" name="marks" id="marks" value="{{ $result->marks }}" required min="0" max="100">
        </div>

        <button type="submit" 
                style="background-color: #4CAF50; color: white; padding: 8px 15px; border: none; border-radius: 5px; cursor:pointer;">
            Update Result
        </button>
    </form>
</div>
@endsection
