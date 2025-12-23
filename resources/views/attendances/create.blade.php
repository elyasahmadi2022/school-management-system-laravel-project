@extends('layouts.app')

@section('title', 'Add New Attendance Record')

@section('page-title', 'Add New Attendance Record')

@section('content')
    <div class="w-full mx-auto">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">
                    Add New Attendance Record
                </h1>
                <a
                    href="{{ route('attendances.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors duration-200"
                >
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to Attendances
                </a>
            </div>

            @if ($errors->any())
                <div
                    class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg"
                >
                    <strong>Whoops!</strong>
                    There were some problems with your input.
                    <br />
                    <br />
                    <ul class="list-disc pl-5 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form
                action="{{ route('attendances.store') }}"
                method="POST"
                class="w-full space-y-3 space-x-3"
            >
                @csrf
                <div class="">
                    <label
                        for="student_id"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        <i class="fas fa-user mr-2"></i>
                        Student
                    </label>
                    <select
                        name="student_id"
                        id="student_id"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required
                    >
                        <option value="">Select Student</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}">
                                {{ $student->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="">
                    <label
                        for="date"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        <i class="fas fa-calendar mr-2"></i>
                        Date
                    </label>
                    <input
                        type="date"
                        name="date"
                        id="date"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required
                    />
                </div>

                <div class="">
                    <label
                        for="status"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        <i class="fas fa-info-circle mr-2"></i>
                        Status
                    </label>
                    <select
                        name="status"
                        id="status"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required
                    >
                        <option value="">Select Status</option>
                        <option value="present">Present</option>
                        <option value="absent">Absent</option>
                        <option value="late">Late</option>
                        <option value="holiday">Holiday</option>
                    </select>
                </div>

                <div class="">
                    <label
                        for="remarks"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        <i class="fas fa-comment mr-2"></i>
                        Remarks (Optional)
                    </label>
                    <textarea
                        name="remarks"
                        id="remarks"
                        rows="3"
                        placeholder="Enter any additional remarks"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    ></textarea>
                </div>

                <div class="flex space-x-4 my-3">
                    <button
                        type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-6 my-2 py-2 rounded-lg transition-colors duration-200"
                    >
                        <i class="fas fa-plus mr-2"></i>
                        Create Attendance Record
                    </button>
                    <a
                        href="{{ route('attendances.index') }}"
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
