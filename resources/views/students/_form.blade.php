@csrf

<div class="form-group mb-3">
    <label>Name:</label>
    <input type="text" name="name" value="{{ old('name', $student->name ?? '') }}" class="form-control">
</div>


<div class="form-group mb-3">
    <label>Course:</label>
    <input type="text" name="course" value="{{ old('course', $student->course ?? '') }}" class="form-control">
</div>

<div class="form-group mb-3">
    <label>Phone:</label>
    <input type="text" name="phone" value="{{ old('phone', $student->phone ?? '') }}" class="form-control">
</div>

<button type="submit" class="btn btn-success">
    {{ isset($student) ? 'Update Student' : 'Add Student' }}
</button>
<a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
