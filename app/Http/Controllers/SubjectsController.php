<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subjects;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    //
    public function index(){
        $subjects = Subjects::with('course')->get();
        $courses = Course::all();
        return view('subjects.index', ['subjects' => $subjects, 'courses' => $courses]);

    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
            'course_id'=>'required|exists:courses,id',
            'code'=>'required|string|max:50|unique:subjects,code',
        ]);

        Subjects::create($request->only(['name', 'course_id', 'code']));
        return  redirect()->back()->with('success', 'Subject created successfully.');
    }

    public function destroy($id){
        $subject = Subjects::findOrFail($id);
        $subject->delete();
        return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully.');
    }

    public function update(Request $request, $id){
        $subject = Subjects::findOrFail($id);

        $request->validate([
            'name'=>'required|string|max:255',
            'course_id'=>'required|exists:courses,id',
            'code'=>'required|string|max:50|unique:subjects,code,'.$subject->id,
        ]);

        $subject->update($request->only(['name', 'course_id', 'code']));
        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully.');
    }

    public function edit($id){
        $subject = Subjects::findOrFail($id);
        $courses = Course::all();
        return view('subjects.edit', ['subject' => $subject, 'courses' => $courses]);
    }

    public function create(){
        $courses = Course::all();
        $subjects = Subjects::all();
        return view('subjects.create', compact('courses'));
    }
}
