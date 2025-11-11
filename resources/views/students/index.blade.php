<!DOCTYPE html>
<html>
<head>
    <title>Students List</title>
</head>
<body>
    <h1>All Students</h1>

    <a href="{{ route('students.create') }}">Add New Student</a>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Registration Number</th>
            <th>Name</th>
            <th>Course</th>
            <th>Year of Study</th>
            <th>Actions</th>
        </tr>

        @foreach($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->registration_number }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->course->name ?? 'N/A' }}</td>
            <td>{{ $student->year_of_study }}</td>
            <td>
                <a href="{{ route('students.show', $student->id) }}">View</a> |
                <a href="{{ route('students.edit', $student->id) }}">Edit</a> |
                <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this student?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
