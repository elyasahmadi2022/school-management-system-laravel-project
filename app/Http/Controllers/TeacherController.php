<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use DB;
use Hash;
use Illuminate\Http\Request;
use Laravel\Pail\ValueObjects\Origin\Console;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('teachers.create');
    }
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:teachers|unique:users,email',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string',
        'subject' => 'required|string|max:255',
        'qualification' => 'nullable|string|max:255',
        'experience' => 'nullable|integer|min:0',
        'joining_date' => 'nullable|date',
    ]);

    DB::transaction(function () use ($request) {

        // ✅ 1. Create User first
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->email), // password = email
            'role'     => 'teacher',
        ]);

        // ✅ 2. Create Teacher
        Teacher::create([
            'name'         => $request->name,
            'email'        => $request->email,
            'phone'        => $request->phone,
            'address'      => $request->address,
            'subject'      => $request->subject,
            'qualification'=> $request->qualification,
            'experience'   => $request->experience,
            'joining_date' => $request->joining_date,
            // optional if you want relation later
            // 'user_id'   => $user->id,
        ]);
    });

    return redirect()->route('teachers.index')
        ->with('success', 'Teacher and user account created successfully.');
}


    public function show(Teacher $teacher)
    {
        $teacher->load(['subjects', 'classes']);
        return view('teachers.show', compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email,' . $teacher->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'subject' => 'required|string|max:255',
            'qualification' => 'nullable|string|max:255',
            'experience' => 'nullable|integer|min:0',
            'joining_date' => 'nullable|date',
        ]);

        $teacher->update($request->all());

        return redirect()->route('teachers.index')
            ->with('success', 'Teacher updated successfully.');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->route('teachers.index')
            ->with('success', 'Teacher deleted successfully.');
    }
}