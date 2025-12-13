<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::with('teacher');
        
        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }
        
        // Filter by teacher
        if ($request->has('teacher_id') && $request->teacher_id != '') {
            $query->where('teacher_id', $request->teacher_id);
        }
        
        // Sorting
        $sortBy = $request->get('sort_by', 'name');
        $sortOrder = $request->get('sort_order', 'asc');
        
        switch ($sortBy) {
            case 'name':
                $query->orderBy('name', $sortOrder);
                break;
            case 'email':
                $query->orderBy('email', $sortOrder);
                break;
            case 'age':
                $query->orderBy('age', $sortOrder);
                break;
            case 'teacher':
                $query->join('teachers', 'students.teacher_id', '=', 'teachers.id')
                      ->orderBy('teachers.name', $sortOrder)
                      ->select('students.*');
                break;
            default:
                $query->orderBy('name', 'asc');
        }
        
        $students = $query->paginate(9)->appends($request->except('page'));
        $teachers = Teacher::all();
        
        return view('students.index', compact('students', 'teachers'));
    }

    public function show(Student $student)
    {
        $student->load('teacher');
        return view('students.show', compact('student'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        return view('students.create', compact('teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'age' => 'required|integer|min:1|max:100',
            'teacher_id' => 'required|exists:teachers,id',
        ], [
            'name.required' => 'The student name is required.',
            'email.required' => 'The email address is required.',
            'email.unique' => 'This email address is already taken.',
            'age.required' => 'The age is required.',
            'age.min' => 'The age must be at least 1 year.',
            'age.max' => 'The age must not exceed 100 years.',
            'teacher_id.required' => 'Please select a teacher.',
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Student created successfully!');
    }

    public function edit(Student $student)
    {
        $teachers = Teacher::all();
        return view('students.edit', compact('student', 'teachers'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'age' => 'required|integer|min:1|max:100',
            'teacher_id' => 'required|exists:teachers,id',
        ], [
            'name.required' => 'The student name is required.',
            'email.required' => 'The email address is required.',
            'email.unique' => 'This email address is already taken.',
            'age.required' => 'The age is required.',
            'age.min' => 'The age must be at least 1 year.',
            'age.max' => 'The age must not exceed 100 years.',
            'teacher_id.required' => 'Please select a teacher.',
        ]);

        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}