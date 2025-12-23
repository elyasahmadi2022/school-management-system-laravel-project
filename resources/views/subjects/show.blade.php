@extends('layouts.app')

@section('title', 'Subject Details - ' . $subject->name)

@section('page-title', 'Subject Details')

@section('content')
    <div class="space-y-6">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">
                    {{ $subject->name }}
                </h1>
                <div class="flex space-x-2">
                    <a
                        href="{{ route('subjects.edit', $subject) }}"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg transition-colors duration-200"
                    >
                        <i class="fas fa-edit mr-2"></i>
                        Edit
                    </a>
                    <a
                        href="{{ route('subjects.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors duration-200"
                    >
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to Subjects
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-gray-600 mb-2">
                        <i class="fas fa-tag mr-2"></i>
                        <strong>Code:</strong>
                        {{ $subject->code }}
                    </p>
                    <p class="text-gray-600 mb-2">
                        <i class="fas fa-building mr-2"></i>
                        <strong>Class:</strong>
                        {{ $subject->class->name ?? 'N/A' }}
                    </p>
                    <p class="text-gray-600">
                        <i class="fas fa-user mr-2"></i>
                        <strong>Teacher:</strong>
                        {{ $subject->teacher->name ?? 'N/A' }}
                    </p>
                </div>
                <div>
                    <p class="text-gray-600">
                        <i class="fas fa-align-left mr-2"></i>
                        <strong>Description:</strong>
                        {{ $subject->description ?? 'N/A' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
