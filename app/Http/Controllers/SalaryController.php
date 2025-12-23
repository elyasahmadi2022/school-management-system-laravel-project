<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        $salaries = Salary::with('user')->get();
        return view('salaries.index', compact('salaries'));
    }

  public function create()
{
    $users = User::whereIn('role', ['teacher', 'employee'])->get();

    return view('salaries.create', compact('users'));
}


    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
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
            'user_id' => 'required|exists:users,id',
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