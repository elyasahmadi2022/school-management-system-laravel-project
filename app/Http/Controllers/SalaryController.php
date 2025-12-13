<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        $salaries = Salary::with('teacher')->get();
        return view('salaries.index', compact('salaries'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        return view('salaries.create', compact('teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
            'month' => 'required|string|max:20',
            'year' => 'required|string|max:4',
            'status' => 'required|string|in:paid,pending,overdue',
        ]);

        Salary::create($request->all());

        return redirect()->route('salaries.index')
            ->with('success', 'Salary record created successfully.');
    }

    public function show(Salary $salary)
    {
        return view('salaries.show', compact('salary'));
    }

    public function edit(Salary $salary)
    {
        $teachers = Teacher::all();
        return view('salaries.edit', compact('salary', 'teachers'));
    }

    public function update(Request $request, Salary $salary)
    {
        $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
            'month' => 'required|string|max:20',
            'year' => 'required|string|max:4',
            'status' => 'required|string|in:paid,pending,overdue',
        ]);

        $salary->update($request->all());

        return redirect()->route('salaries.index')
            ->with('success', 'Salary record updated successfully.');
    }

    public function destroy(Salary $salary)
    {
        $salary->delete();

        return redirect()->route('salaries.index')
            ->with('success', 'Salary record deleted successfully.');
    }
}