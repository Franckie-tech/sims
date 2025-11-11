<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Student;


class StudentsController extends Controller
{
    //
    public function index(){
        $students = Student::with(['course', ])->get();
        $courses = Course::all();
        return view('students.index', ['students' => $students, 'courses' => $courses]);
    }



   



 public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'course_id' => 'required|exists:courses,id',
        'year_of_study' => 'required|integer|min:1|max:10',
    ]);

    $validated['registration_number'] = 'REG' . rand(1000, 9999);

    Student::create($validated);

    return redirect()->route('students.index')->with('success', 'Student created!');
}





    public function create(){
        $courses = Course::all();
        return view('students.create', compact('courses'));
    }

    public function show($id){
        $student = Student::with(['course', 'results.subject'])->findOrFail($id);
        return view('students.show', compact('student'));
    }

    public function edit($id){
        $student = Student::findOrFail($id);
        $courses = Course::all();
        return view('students.edit', ['student' => $student, 'courses' => $courses]);
    }

    public function update(Request $request, $id){
        $student = Student::findOrFail($id);

        $request->validate([
            'name'=>'required|string|max:255',
            
            'year_of_study'=>'required|integer|min:1|max:4',
            'course_id'=>'required|exists:courses,id',
        ]);

        $student->update($request->only(['name', 'year_of_study', 'course_id']));
        return redirect()->route('students.show', $student->id)->with('success', 'Student updated successfully.');
    }

    public function destroy($id){
        $student =Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
