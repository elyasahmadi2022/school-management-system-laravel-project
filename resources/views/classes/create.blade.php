@extends('layouts.app')
@section('title', 'classes')
@section('page-title', 'classes')
@section('content')
    <div class="w-full mx-auto">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Add New Class</h1>
                <a
                    href="{{ route('classes.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors duration-200"
                >
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to class
                </a>
            </div>
            <form
                action="{{ route('classes.store') }}"
                method="POST"
                class="w-full space-y-3 space-x-3"
            >
                @csrf
                <div class="">
                    <label
                        for="name"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        <i class="fas fa-user mr-2"></i>
                        Name
                    </label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required
                    />
                </div>
                <div class="">
                    <label
                        for="teacher_id"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        <i class="fas fa-envelope mr-2"></i>
                        teacherName
                    </label>
                    <select
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="teacher_id"
                        name="teacher_id"
                    >
                        <option>1</option>
                        <option>1</option>
                        <option>1</option>
                        <option>1</option>
                    </select>
                </div>
                <di>
                    <label
                        for="academic_year"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        <i class="fas fa-book mr-2"></i>
                        academic Year
                    </label>
                    <input
                        type="text"
                        name="academic_year"
                        id="academic_year"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required
                    />
                </di>
                <div>
                    <label
                        for="capcity"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        <i class="fas fa-book mr-2"></i>
                        Capacity
                    </label>
                    <input
                        type="number"
                        name="capcity"
                        id="capcity"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required
                    />
                </div>
                <div class="flex space-x-4 my-3">
                    <button
                        type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-6 my-2 py-2 rounded-lg transition-colors duration-200"
                    >
                        <i class="fas fa-plus mr-2"></i>
                        Create Teacher
                    </button>
                    <a
                        href="{{ route('teachers.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg my-2 transition-colors duration-200"
                    >
                        <i class="fas fa-times mr-2"></i>
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
