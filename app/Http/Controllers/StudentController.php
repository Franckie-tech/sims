<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\User;


class StudentController extends Controller
{
    //
    public function index(){

        $user = Auth::user();
        /** @var \App\Models\User $user */
        $user = Auth::user()->load('student.course', 'results');

       
        $user = auth()->user()->load('student.course', 'results');

        return view('student.dashboard', compact('user'));
        
    }
}
