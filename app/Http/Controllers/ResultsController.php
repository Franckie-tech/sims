<?php

namespace App\Http\Controllers;

use App\Models\Results;
use App\Models\Subjects;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;

class ResultsController extends Controller
{
    //
    public function index(){
        $results = Results::with(['student', 'subject', 'course', ])->get();
        $subjects = Subjects::all();
        $course = Course::all();
        return view('results.index', compact('results', 'subjects', 'course'));
    }

    public function store(Request $request){
        $request->validate([
            'student_id'=>'required|exists:students,id',
            'subject_id'=>'required|exists:subjects,id',
            'marks'=>'required|numeric|min:0|max:100',
        ]);

        $grade =$this->calculateGrade($request->input('marks'));

        Results::create([
            'student_id'=>$request->student_id,
            'subject_id'=>$request->subject_id,
            'marks'=>$request->marks,
            'grade'=>$grade,
        ]);

        return redirect()->back()->with('success', 'Result added successfully');
    }
    

    private function calculateGrade($marks){
        if($marks >= 90){
            return 'A';
        }elseif($marks >= 80){
            return 'B';
        }elseif($marks >= 70){
            return 'C';
        }elseif($marks >= 60){
            return 'D';
        }else{
            return 'F';
        }
    }

    public function edit($id){
        $result = Results::findOrFail($id);
        return view('results.edit', compact('result'));
    }

    public function update(Request $request, $id){
        $result = Results::findOrFail($id);
        $result->validate([
            'marks'=>'required|numeric|min:0|max:100',
        ]);
        $grade = $this->calculateGrade($request->input('marks'));
        $result->update([
            'marks'=>$request->marks,
            'grade'=>$grade,
        ]);
        return redirect()->route('results.index')->with('success', 'Result updated successfully.');
    }

    public function destroy($id){
        $result = Results::findOrFail($id);
        $result->delete();
        return redirect()->route('results.index')->with('success', 'Result deleted successfully.');
    }

    public function create(){

       $students = Student::all();
       $subjects = Subjects::all();
       $courses = Course::all();
       return view('results.create', compact('students', 'subjects', 'courses'));
    }
}
