@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4">Welcome, {{ $user->name }}</h2>

    <div class="row">

        {{-- User Info Card --}}
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    Personal Information
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Phone:</strong> {{ $user->phone_number }}</p>
                    <p><strong>Role:</strong> Student</p>
                </div>
            </div>
        </div>

        {{-- Academic Info Card --}}

        <pre>
            {{ print_r($user->student) }}
        </pre>

        @if($user->student)
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    Academic Information
                </div>
                <div class="card-body">
                    <p><strong>Course:</strong> {{ $user->student->course->name ?? 'N/A' }}</p>
                    <p><strong>Year of Study:</strong> {{ $user->student->year_of_study ?? 'N/A' }}</p>
                    <p><strong>Registration Number:</strong> {{ $user->student->registration_number ?? 'N/A' }}</p>
                </div>
            </div>
        </div>
        @endif

        {{-- Results Card --}}
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-white">
                    Your Results
                </div>
                <div class="card-body">
                    <p>Total Results: {{ $user->results->count() }}</p>
                    <a href="{{ route('student.results') }}" class="btn btn-outline-primary btn-sm mt-2">
                        View Your Results
                    </a>
                </div>
            </div>
        </div>

    </div>

    {{-- Optional: Quick summary table of recent results --}}
    @if($user->results->count() > 0)
    <div class="card shadow-sm mt-4">
        <div class="card-header bg-info text-white">
            Recent Results
        </div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Course</th>
                        <th>Marks</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user->results->take(5) as $index => $result)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $result->course->name ?? 'N/A' }}</td>
                        <td>{{ $result->marks }}</td>
                        <td>{{ $result->grade }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

</div>
@endsection
