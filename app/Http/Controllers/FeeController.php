<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Student;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    public function index()
    {
        $fees = Fee::with('student')->get();
        return view('fees.index', compact('fees'));
    }

    public function create()
    {
        $students = Student::all();
        return view('fees.create', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'amount' => 'required|numeric|min:0',
            'due_date' => 'required|date',
            'paid' => 'boolean',
            'paid_date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        Fee::create($request->all());

        return redirect()->route('fees.index')
            ->with('success', 'Fee record created successfully.');
    }

    public function show(Fee $fee)
    {
        return view('fees.show', compact('fee'));
    }

    public function edit(Fee $fee)
    {
        $students = Student::all();
        return view('fees.edit', compact('fee', 'students'));
    }

    public function update(Request $request, Fee $fee)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'amount' => 'required|numeric|min:0',
            'due_date' => 'required|date',
            'paid' => 'boolean',
            'paid_date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        $fee->update($request->all());

        return redirect()->route('fees.index')
            ->with('success', 'Fee record updated successfully.');
    }

    public function destroy(Fee $fee)
    {
        $fee->delete();

        return redirect()->route('fees.index')
            ->with('success', 'Fee record deleted successfully.');
    }
}