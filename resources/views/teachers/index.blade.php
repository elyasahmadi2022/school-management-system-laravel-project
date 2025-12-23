@extends('layouts.app')

@section('title', 'Teachers')
@section('page-title', 'Teachers')

@section('content')
    <div class="bg-white rounded-lg shadow-md">
        <!-- Header (sticky at top) -->
        <div
            class="p-4 border-b border-gray-200 flex justify-between items-center sticky top-0 bg-white z-10"
        >
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Teachers</h1>
                <p class="text-gray-600 mt-1">Manage all teacher records</p>
            </div>
            <a
                href="{{ route('teachers.create') }}"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center whitespace-nowrap"
            >
                <svg
                    class="w-5 h-5 mr-2"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                    ></path>
                </svg>
                Add New Teacher
            </a>
        </div>

        <!-- Success message -->
        @if (session('success'))
            <div
                class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg"
            >
                {{ session('success') }}
            </div>
        @endif

        <!-- Table wrapper (scrollable) -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50 sticky top-0 z-5">
                    <tr>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            ID
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Name
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Email
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Phone
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Subject
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Qualification
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Experience
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Joining Date
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($teachers as $teacher)
                        <tr class="hover:bg-gray-50">
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                            >
                                {{ $teacher->id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $teacher->name }}
                            </td>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                            >
                                {{ $teacher->email }}
                            </td>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                            >
                                {{ $teacher->phone ?? 'N/A' }}
                            </td>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                            >
                                {{ $teacher->subject }}
                            </td>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                            >
                                {{ $teacher->qualification ?? 'N/A' }}
                            </td>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                            >
                                {{ $teacher->experience ?? 'N/A' }} years
                            </td>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                            >
                                {{ $teacher->joining_date ? $teacher->joining_date->format('M d, Y') : 'N/A' }}
                            </td>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm font-medium flex gap-2"
                            >
                                <a
                                    href="{{ route('teachers.show', $teacher) }}"
                                    class="text-indigo-600 hover:text-indigo-900"
                                >
                                    View
                                </a>
                                <a
                                    href="{{ route('teachers.edit', $teacher) }}"
                                    class="text-green-600 hover:text-green-900"
                                >
                                    Edit
                                </a>
                                <form
                                    action="{{ route('teachers.destroy', $teacher) }}"
                                    method="POST"
                                    class="inline"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="text-red-600 hover:text-red-900"
                                        onclick="
                                            return confirm('Are you sure?');
                                        "
                                    >
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td
                                colspan="9"
                                class="px-6 py-4 text-center text-sm text-gray-500"
                            >
                                No teachers found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
