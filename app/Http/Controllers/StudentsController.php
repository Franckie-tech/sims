<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;

class StudentsController extends Controller
{
    //
    public function index(){

        $students = Student::with('course', )->get();
        return view('students.index', compact('students', ));


        
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            
            'year_of_study' => 'required|integer|min:1|max:4',
            'course_id' => 'required|exists:courses,id',
           
        ]);

        do {
            $registrationNumber = 'REG' . rand(1000, 9999); // e.g., REG1234
        } while (Student::where('registration_number', $registrationNumber)->exists());

         $request->merge(['registration_number' => $registrationNumber]);
        

        Student::create([
            'name' => $request->input('name'),
            
            'year_of_study' => $request->input('year_of_study'),
            'course_id' => $request->input('course_id'),
            'registration_number' => $registrationNumber,
        ]);

    }

    public function update(Request $request, $id)
    {
        Student::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            
            'year_of_study' => 'required|integer|min:1|max:4',
            'course_id' => 'required|exists:courses,id',
        ]);

        $student = Student::findOrFail($id);
        $student->update([
            'name' => $request->input('name'),
           
            'year_of_study' => $request->input('year_of_study'),
            'course_id' => $request->input('course_id'),
        ]);
    }

    public function destroy($id){
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }

    public function create(){
        $courses = Course::all();
        return view('students.create', compact('courses')); 
    }





}
