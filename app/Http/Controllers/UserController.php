<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    {   $users = User::with('student')->get();
        return view('users.index', compact('users'));
    }

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:8|confirmed',
            'role'=>'required|string',
            'phone_number'=>'required|string',
        ]);

        //create user
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>$request->role,
            'phone_number'=>$request->phone_number,
        ]);

        // if a user is a student , i create a student passowrd


            return redirect()->route('users.index')->with('success', 'User created successfully.');
        
       
    }
     public function destroy($id){
            $user = User::with('student')->findOrFail($id);

            if($user->student){
                $user->student->delete();
            }

            $user->delete();
            return redirect()->route('users.index')->with('success', 'User deleted successfully.');
        }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }    

   

    public function update(Request $request, $id){
        $user = User::with('student')->findOrFail($id);

        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users,email,'.$user->id,
            'password'=>'required|string|min:8|confirmed',
            'role'=>'required|string',
            'phone_number'=>'required|string',
        ]);

        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>$request->role,
            'phone_number'=>$request->phone_number,
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');

    }
}
