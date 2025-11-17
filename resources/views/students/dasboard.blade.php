@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Welcome, {{ $student->name }}</h2>
    <p><strong>Registration Number: {{ $student->registration_number  }}</strong></p>
    <p><strong>You have been registered in {{ $student->course->name ?? 'Not Assigned' }}</strong></p>
    <p><strong>Academic Year: {{ $student->year_of_study }}</strong></p>


    <h4>Your Results</h4>
    <p>Here are your examination results for the academic year ,{{ $student->year_of_study }}</p>
    <table class="table table-bordered">
        <thead>
            <tr>Subject</tr>
            <tr>Marks</tr>
            <tr>Grade</tr>
        </thead>
        <tbody>
            @forelse($student->results as $result)
              <tr>
                <td>{{ $result->subject }}</td>
                <td>{{ $result->marks }}</td>
                <td>{{ $result->grade }}</td>
              </tr>
             

            @empty

            <tr>
                <td colspan="3" class="text-center">No results available yet</td>
            </tr>
        </tbody>


    </table>

    
</div>

@endsection

