@extends('layouts.app')

@section('title', 'Employee Details')

@section('page-title', 'Employee Details')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">{{ $employee->name }}</h1>
            <div class="flex space-x-2">
                <a href="{{ route('employees.edit', $employee) }}" class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-lg transition-colors duration-200">
                    <i class="fas fa-edit mr-2"></i>Edit
                </a>
                <a href="{{ route('employees.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors duration-200">
                    <i class="fas fa-arrow-left mr-2"></i>Back to Employees
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-gray-50 p-6 rounded-lg">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Personal Information</h2>
                <div class="space-y-4">
                    <div class="flex">
                        <div class="w-1/3 text-sm font-medium text-gray-500">Name</div>
                        <div class="w-2/3 text-gray-900">{{ $employee->name }}</div>
                    </div>
                    
                    <div class="flex">
                        <div class="w-1/3 text-sm font-medium text-gray-500">Email</div>
                        <div class="w-2/3 text-gray-900">{{ $employee->email }}</div>
                    </div>
                    
                    <div class="flex">
                        <div class="w-1/3 text-sm font-medium text-gray-500">Phone</div>
                        <div class="w-2/3 text-gray-900">{{ $employee->phone ?? 'N/A' }}</div>
                    </div>
                    
                    <div class="flex">
                        <div class="w-1/3 text-sm font-medium text-gray-500">Address</div>
                        <div class="w-2/3 text-gray-900">{{ $employee->address ?? 'N/A' }}</div>
                    </div>
                </div>
            </div>
            
            <div class="bg-gray-50 p-6 rounded-lg">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Employment Information</h2>
                <div class="space-y-4">
                    <div class="flex">
                        <div class="w-1/3 text-sm font-medium text-gray-500">Position</div>
                        <div class="w-2/3 text-gray-900">{{ $employee->position }}</div>
                    </div>
                    
                    <div class="flex">
                        <div class="w-1/3 text-sm font-medium text-gray-500">Department</div>
                        <div class="w-2/3 text-gray-900">{{ $employee->department }}</div>
                    </div>
                    
                    <div class="flex">
                        <div class="w-1/3 text-sm font-medium text-gray-500">Salary</div>
                        <div class="w-2/3 text-gray-900">${{ number_format($employee->salary, 2) }}</div>
                    </div>
                    
                    <div class="flex">
                        <div class="w-1/3 text-sm font-medium text-gray-500">Joining Date</div>
                        <div class="w-2/3 text-gray-900">{{ $employee->joining_date ? $employee->joining_date->format('F j, Y') : 'N/A' }}</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end">
            <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition-colors duration-200" onclick="return confirm('Are you sure you want to delete this employee? This action cannot be undone.')">
                    <i class="fas fa-trash mr-2"></i>Delete Employee
                </button>
            </form>
        </div>
    </div>
</div>
@endsection