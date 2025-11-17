@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Teacher Dashboard</h2>

    <div class="card p-3 mt-4">
        <h4>{{ auth()->user()->name }}</h4>
        <p>Email: {{ auth()->user()->email }}</p>
        <p>Phone: {{ auth()->user()->phone_number }}</p>
        <p>Role: Teacher</p>
    </div>

    <div class="row mt-4">
        <div class="col-md-4">
            <a href="{{ route('results.create') }}" class="card p-3 text-center shadow">
                <h4>Add Results</h4>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('results.index') }}" class="card p-3 text-center shadow">
                <h4>Edit Results</h4>
            </a>
        </div>
    </div>

</div>
@endsection
