@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Admin Dashboard</h2>

    <div class="row mt-4">

        <div class="col-md-3">
            <a href="{{ route('users.index') }}" class="card p-3 text-center shadow">
                <h4>Manage Users</h4>
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ route('student.dashboard') }}" class="card p-3 text-center shadow">
                <h4>Manage Students</h4>
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ route('teacher.dashboard') }}" class="card p-3 text-center shadow">
                <h4>Manage Teachers</h4>
            </a>
        </div>

        <div class="col-md-3">
            <a href="{{ route('results.index') }}" class="card p-3 text-center shadow">
                <h4>Manage Results</h4>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('results.create') }}" class="card p-3 text-center shadow">
                <h4>Add Results</h4>
            </a>

        </div>
        <div class="col-md-3">
            <a href="{{ route('results.index') }}" class="card p-3 text-center shadow">
                <h4>Edit Results</h4>
            </a>


        </div>
        <div class="col-md-3">
            <a href="{{ route('students.index') }}" class="card p-3 text-center shadow">
                <h4>Manage Students</h4>
            </a>


        </div>
        <div class="col-md-3">
            <a href="{{ route('course.index') }}" class="card p-3 text-center shadow">
                <h4>Manage Courses</h4>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('subjects.index') }}" class="card p-3 text-center shadow">
                <h4>Manage Subjects</h4>
            </a>
        </div>

    </div>
</div>
@endsection
