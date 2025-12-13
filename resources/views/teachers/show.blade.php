@extends('layouts.app')

@section('title', 'Teacher Details - ' . $teacher->name)

@section('page-title', 'Teacher Details')

@section('content')
    <div class="space-y-6">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">{{ $teacher->name }}</h1>
                <div class="flex space-x-2">
                    <a href="{{ route('teachers.edit', $teacher) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg transition-colors duration-200">
                        <i class="fas fa-edit mr-2"></i>Edit
                    </a>
                    <a href="{{ route('teachers.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors duration-200">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Teachers
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-gray-600 mb-2"><i class="fas fa-envelope mr-2"></i><strong>Email:</strong> {{ $teacher->email }}</p>
                    <p class="text-gray-600"><i class="fas fa-book mr-2"></i><strong>Subject:</strong> {{ $teacher->subject }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Students ({{ $teacher->students->count() }})</h2>
            @if($teacher->students->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($teacher->students as $student)
                        <div class="bg-gray-50 p-6 rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition-shadow duration-200">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $student->name }}</h3>
                            <p class="text-gray-600 mb-1"><i class="fas fa-envelope mr-2"></i>{{ $student->email }}</p>
                            <p class="text-gray-600 mb-4"><i class="fas fa-birthday-cake mr-2"></i>Age: {{ $student->age }}</p>
                            <a href="{{ route('students.show', $student) }}" class="text-blue-500 hover:text-blue-700 transition-colors duration-200">
                                <i class="fas fa-eye mr-1"></i>View Details
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600">No students assigned to this teacher.</p>
            @endif
        </div>
    </div>
@endsection
