@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Subject</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 10px;">
            <label for="name">Subject Name:</label><br>
            <input type="text" name="name" id="name" value="{{ $subject->name }}" required>
        </div>

        <div style="margin-bottom: 10px;">
            <label for="course_id">Select Course:</label><br>
            <select name="course_id" id="course_id" required>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" {{ $subject->course_id == $course->id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" 
                style="background-color: #4CAF50; color: white; padding: 8px 15px; border: none; border-radius: 5px; cursor:pointer;">
            Update Subject
        </button>
    </form>
</div>
@endsection
