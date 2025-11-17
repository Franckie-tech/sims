@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Your Results</h2>

    @if($results->count() == 0)
        <p>You have no results yet.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Course</th>
                    <th>Score</th>
                    <th>Grade</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $index => $result)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $result->course->name ?? 'N/A' }}</td>
                        <td>{{ $result->score }}</td>
                        <td>{{ $result->grade }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
