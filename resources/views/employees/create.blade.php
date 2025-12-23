@extends('layouts.app')

@section('title', 'Add New Employee')

@section('page-title', 'Add New Employee')

@section('content')
    <div class="w-full mx-auto">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">
                    Add New Employee
                </h1>
                <a
                    href="{{ route('employees.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors duration-200"
                >
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to Employees
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
                action="{{ route('employees.store') }}"
                method="POST"
                class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2"
            >
                @csrf

                <div>
                    <label
                        for="name"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        Name
                    </label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                        required
                    />
                </div>

                <div class="">
                    <label
                        for="email"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        <i class="fas fa-envelope mr-2"></i>
                        Email
                    </label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                        required
                    />
                </div>

                <div>
                    <label
                        for="phone"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        Phone
                    </label>
                    <input
                        type="text"
                        name="phone"
                        id="phone"
                        value="{{ old('phone') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                    />
                </div>

                <div>
                    <label
                        for="position"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        Position
                    </label>
                    <input
                        type="text"
                        name="position"
                        id="position"
                        value="{{ old('position') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                        required
                    />
                </div>

                <div class="">
                    <label
                        for="department"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        <i class="fas fa-building mr-2"></i>
                        Department
                    </label>
                    <input
                        type="text"
                        name="department"
                        id="department"
                        value="{{ old('department') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                        required
                    />
                </div>

                <div>
                    <label
                        for="salary"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        Salary
                    </label>
                    <input
                        type="number"
                        name="salary"
                        id="salary"
                        value="{{ old('salary') }}"
                        step="0.01"
                        min="0"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                        required
                    />
                </div>

                <div class="">
                    <label
                        for="joining_date"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        <i class="fas fa-calendar mr-2"></i>
                        Joining Date
                    </label>
                    <input
                        type="date"
                        name="joining_date"
                        id="joining_date"
                        value="{{ old('joining_date') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                        required
                    />
                </div>

                <div class="">
                    <label
                        for="address"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        Address
                    </label>
                    <input
                        type="text"
                        name="address"
                        id="address"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                    >
{{ old('address') }}</
                    >
                </div>

                <div class=" row-start-6 col-start-1  flex  gap-4 sm:space-x-4">
                    <button
                        type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg transition-colors duration-200 flex items-center justify-center"
                    >
                        <i class="fas fa-plus mr-2"></i>
                        Create Employee
                    </button>
                    <a
                        href="{{ route('employees.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition-colors duration-200 flex items-center justify-center"
                    >
                        <i class="fas fa-times mr-2"></i>
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
