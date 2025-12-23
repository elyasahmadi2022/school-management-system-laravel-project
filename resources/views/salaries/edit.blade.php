@extends('layouts.app')

@section('title', 'Edit Salary Record')

@section('page-title', 'Edit Salary Record')

@section('content')
    <div class="w-full mx-auto">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">
                    Edit Salary Record
                </h1>
                <a
                    href="{{ route('salaries.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors duration-200"
                >
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to Salaries
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
                action="{{ route('salaries.update', $salary) }}"
                method="POST"
                class="w-full space-y-3 space-x-3"
            >
                @csrf
                @method('PUT')
                <div class="">
                    <label
                        for="teacher_id"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        <i class="fas fa-user mr-2"></i>
                        Teacher
                    </label>
                    <select
                        name="teacher_id"
                        id="teacher_id"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required
                    >
                        <option value="">Select Teacher</option>
                        @foreach ($teachers as $teacher)
                            <option
                                value="{{ $teacher->id }}"
                                {{ $salary->teacher_id == $teacher->id ? 'selected' : '' }}
                            >
                                {{ $teacher->name }}
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
                        value="{{ old('amount', $salary->amount) }}"
                        placeholder="Enter salary amount"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required
                    />
                </div>

                <div class="">
                    <label
                        for="payment_date"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        <i class="fas fa-calendar mr-2"></i>
                        Payment Date
                    </label>
                    <input
                        type="date"
                        name="payment_date"
                        id="payment_date"
                        value="{{ old('payment_date', $salary->payment_date ? $salary->payment_date->format('Y-m-d') : '') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required
                    />
                </div>

                <div class="">
                    <label
                        for="month"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        <i class="fas fa-calendar-alt mr-2"></i>
                        Month
                    </label>
                    <select
                        name="month"
                        id="month"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required
                    >
                        <option value="">Select Month</option>
                        @php
                            $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                        @endphp

                        @foreach ($months as $monthOption)
                            <option
                                value="{{ $monthOption }}"
                                {{ $salary->month == $monthOption ? 'selected' : '' }}
                            >
                                {{ $monthOption }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="">
                    <label
                        for="year"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        <i class="fas fa-calendar-alt mr-2"></i>
                        Year
                    </label>
                    <input
                        type="text"
                        name="year"
                        id="year"
                        value="{{ old('year', $salary->year) }}"
                        placeholder="e.g., 2024"
                        maxlength="4"
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
                        <option
                            value="paid"
                            {{ $salary->status == 'paid' ? 'selected' : '' }}
                        >
                            Paid
                        </option>
                        <option
                            value="pending"
                            {{ $salary->status == 'pending' ? 'selected' : '' }}
                        >
                            Pending
                        </option>
                        <option
                            value="overdue"
                            {{ $salary->status == 'overdue' ? 'selected' : '' }}
                        >
                            Overdue
                        </option>
                    </select>
                </div>

                <div class="flex space-x-4 my-3">
                    <button
                        type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-6 my-2 py-2 rounded-lg transition-colors duration-200"
                    >
                        <i class="fas fa-save mr-2"></i>
                        Update Salary Record
                    </button>
                    <a
                        href="{{ route('salaries.show', $salary) }}"
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
