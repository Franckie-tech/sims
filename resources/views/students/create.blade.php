@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Student</h2>



    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif




    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    {{-- Student creation form --}}
    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 10px;">
            <label for="name">Full Name:</label><br>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        </div>

        <div style="margin-bottom: 10px;">
            <label for="year_of_study">Year of Study:</label><br>
            <input type="number" name="year_of_study" id="year_of_study" min="1" max="10" value="{{ old('year_of_study') }}" required>
        </div>

        <div style="margin-bottom: 10px;">
            <label for="course_id">Select Course:</label><br>
            <select name="course_id" id="course_id" required>
                <option value="">-- Select Course --</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" 
                style="background-color: #4CAF50; color: white; padding: 8px 15px; border: none; border-radius: 5px; cursor:pointer;">
            Save Student
        </button>
        <a href="{{ route('students.index') }}" 
           style="margin-left: 10px; background-color: #f44336; color: white; padding: 8px 15px; border: none; border-radius: 5px; text-decoration: none;">
            Cancel
        </a>0
    </form>
</div>
@endsection
