<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function index(){
        $courses= Course::all();
        return view('course.index', compact('courses'));
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
            'code'=>'required|string|max:50|unique:courses,code',
        ]);

        Course::create($request->only(['name','code']));

        return  redirect()->back()->with('success', 'Course created successfully.');
    }

    public function destroy($id){
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('course.index')->with('success', 'Course deleted successfully.');
    }

    public function update(Request $request, $id){
        $course = Course::findOrFail($id);

        $request->validate([
            'name'=>'required|string|max:255',
            'code'=>'required|string|max:50|unique:courses,code,'.$course->id,
        ]);

        $course->update($request->only(['name','code']));
        return redirect()->route('course.index')->with('success', 'Course updated successfully.');
    }
    public function edit($id){
        $course = Course::findOrFail($id);
        return view('courses.edit', ['course' => $course]);
    }

    public function create(){
        return view('course.create');
    }   
}
