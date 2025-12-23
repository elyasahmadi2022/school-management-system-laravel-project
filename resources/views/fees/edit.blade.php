@extends('layouts.app')

@section('title', 'Edit Fee Record')

@section('page-title', 'Edit Fee Record')

@section('content')
    <div class="w-full mx-auto">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">
                    Edit Fee Record
                </h1>
                <a
                    href="{{ route('fees.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors duration-200"
                >
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to Fees
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
                action="{{ route('fees.update', $fee) }}"
                method="POST"
                class="w-full space-y-3 space-x-3"
            >
                @csrf
                @method('PUT')
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
                            <option
                                value="{{ $student->id }}"
                                {{ $fee->student_id == $student->id ? 'selected' : '' }}
                            >
                                {{ $student->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="">
                    <label
                        for="amount"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        <i class="fas fa-dollar-sign mr-2"></i>
                        Amount
                    </label>
                    <input
                        type="number"
                        name="amount"
                        id="amount"
                        step="0.01"
                        min="0"
                        value="{{ old('amount', $fee->amount) }}"
                        placeholder="Enter amount"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required
                    />
                </div>

                <div class="">
                    <label
                        for="due_date"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        <i class="fas fa-calendar mr-2"></i>
                        Due Date
                    </label>
                    <input
                        type="date"
                        name="due_date"
                        id="due_date"
                        value="{{ old('due_date', $fee->due_date ? $fee->due_date->format('Y-m-d') : '') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required
                    />
                </div>

                <div class="">
                    <label
                        for="paid"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        <i class="fas fa-check-circle mr-2"></i>
                        Payment Status
                    </label>
                    <select
                        name="paid"
                        id="paid"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    >
                        <option value="0" {{ ! $fee->paid ? 'selected' : '' }}>
                            Pending
                        </option>
                        <option value="1" {{ $fee->paid ? 'selected' : '' }}>
                            Paid
                        </option>
                    </select>
                </div>

                <div class="">
                    <label
                        for="paid_date"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        <i class="fas fa-calendar-check mr-2"></i>
                        Paid Date
                    </label>
                    <input
                        type="date"
                        name="paid_date"
                        id="paid_date"
                        value="{{ old('paid_date', $fee->paid_date ? $fee->paid_date->format('Y-m-d') : '') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    />
                </div>

                <div class="">
                    <label
                        for="description"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        <i class="fas fa-align-left mr-2"></i>
                        Description
                    </label>
                    <textarea
                        name="description"
                        id="description"
                        rows="3"
                        placeholder="Enter description (optional)"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    >
{{ old('description', $fee->description) }}</textarea
                    >
                </div>

                <div class="flex space-x-4 my-3">
                    <button
                        type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-6 my-2 py-2 rounded-lg transition-colors duration-200"
                    >
                        <i class="fas fa-save mr-2"></i>
                        Update Fee Record
                    </button>
                    <a
                        href="{{ route('fees.show', $fee) }}"
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
