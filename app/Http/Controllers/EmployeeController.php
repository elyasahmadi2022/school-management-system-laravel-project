<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use DB;
use Hash;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:employees|unique:users,email',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string',
        'position' => 'required|string|max:255',
        'department' => 'required|string|max:255',
        'salary' => 'required|numeric|min:0',
        'joining_date' => 'required|date',
    ]);

    DB::transaction(function () use ($request) {

        // ✅ 1. Create User
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->email), // password = email (temporary)
            'role'     => 'employee',
        ]);

        // ✅ 2. Create Employee
        Employee::create([
            'user_id'      => $user->id,
            'name'         => $request->name,
            'email'        => $request->email,
            'phone'        => $request->phone,
            'address'      => $request->address,
            'position'     => $request->position,
            'department'   => $request->department,
            'salary'       => $request->salary,
            'joining_date' => $request->joining_date,
        ]);
    });

    return redirect()->route('employees.index')
        ->with('success', 'Employee and user account created successfully.');
}


    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:employees,email,' . $employee->id . '|unique:users,email,' . $employee->user_id,
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string',
        'position' => 'required|string|max:255',
        'department' => 'required|string|max:255',
        'salary' => 'required|numeric|min:0',
        'joining_date' => 'required|date',
    ]);

    DB::transaction(function () use ($request, $employee) {

        // update user
        $employee->user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        // update employee
        $employee->update($request->except('user_id'));
    });

    return redirect()->route('employees.index')
        ->with('success', 'Employee updated successfully.');
}


    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully.');
    }
}