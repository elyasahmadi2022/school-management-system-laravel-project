@extends("layouts.app")

@section("title", "Attendances")

@section("page-title", "Attendances")

@section("content")
    <div class="bg-white rounded-lg shadow-md p-4 md:p-6">
        <div
            class="flex flex-col md:flex-row md:justify-between md:items-center mb-6 gap-4"
        >
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800">
                    Attendances
                </h1>
                <p class="text-gray-600 mt-1 text-sm md:text-base">
                    Manage student attendance records
                </p>
            </div>
            <a
                href="{{ route("attendances.create") }}"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center justify-center text-sm md:text-base"
            >
                <svg
                    class="w-4 h-4 md:w-5 md:h-5 mr-2"
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
                Add Attendance
            </a>
        </div>

        @if (session("success"))
            <div
                class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm md:text-base"
            >
                {{ session("success") }}
            </div>
        @endif

        <!-- Mobile Card View -->
        <div class="block md:hidden space-y-4">
            @forelse ($attendances as $attendance)
                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <div
                                    class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center"
                                >
                                    <svg
                                        class="h-6 w-6 text-blue-600"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                        ></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-3">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $attendance->student->name }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ $attendance->date->format("M d, Y") }}
                                </div>
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <a
                                href="{{ route("attendances.show", $attendance) }}"
                                class="text-indigo-600 hover:text-indigo-900 text-sm"
                            >
                                View
                            </a>
                            <a
                                href="{{ route("attendances.edit", $attendance) }}"
                                class="text-green-600 hover:text-green-900 text-sm"
                            >
                                Edit
                            </a>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="font-medium text-gray-500">
                                Status:
                            </span>
                            <span
                                class="text-gray-900 @if ($attendance->status == "present")
                                    text-green-600
                                @elseif ($attendance->status == "absent")
                                    text-red-600
                                @elseif ($attendance->status == "late")
                                    text-yellow-600
                                @else
                                    text-blue-600
                                @endif"
                            >
                                {{ ucfirst($attendance->status) }}
                            </span>
                        </div>
                        <div>
                            <span class="font-medium text-gray-500">
                                Remarks:
                            </span>
                            <span class="text-gray-900">
                                {{ $attendance->remarks ?? "N/A" }}
                            </span>
                        </div>
                    </div>
                    <div class="mt-3 pt-3 border-t border-gray-200">
                        <form
                            action="{{ route("attendances.destroy", $attendance) }}"
                            method="POST"
                            class="inline"
                        >
                            @csrf
                            @method("DELETE")
                            <button
                                type="submit"
                                class="text-red-600 hover:text-red-900 text-sm"
                                onclick="
                                    return confirm(
                                        'Are you sure you want to delete this attendance record?',
                                    );
                                "
                            >
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="text-center py-8 text-gray-500">
                    No attendance records found.
                </div>
            @endforelse
        </div>

        <!-- Desktop Table View -->
        <div class="hidden md:block overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th
                            scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            ID
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Student
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Date
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Status
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Remarks
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($attendances as $attendance)
                        <tr class="hover:bg-gray-50">
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                            >
                                {{ $attendance->id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <div
                                            class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center"
                                        >
                                            <svg
                                                class="h-6 w-6 text-blue-600"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                                ></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div
                                            class="text-sm font-medium text-gray-900"
                                        >
                                            {{ $attendance->student->name }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                            >
                                {{ $attendance->date->format("M d, Y") }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full @if ($attendance->status == "present")
                                        bg-green-100
                                        text-green-800
                                    @elseif ($attendance->status == "absent")
                                        bg-red-100
                                        text-red-800
                                    @elseif ($attendance->status == "late")
                                        bg-yellow-100
                                        text-yellow-800
                                    @else
                                        bg-blue-100
                                        text-blue-800
                                    @endif"
                                >
                                    {{ ucfirst($attendance->status) }}
                                </span>
                            </td>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                            >
                                {{ $attendance->remarks ?? "N/A" }}
                            </td>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm font-medium"
                            >
                                <a
                                    href="{{ route("attendances.show", $attendance) }}"
                                    class="text-indigo-600 hover:text-indigo-900 mr-3"
                                >
                                    View
                                </a>
                                <a
                                    href="{{ route("attendances.edit", $attendance) }}"
                                    class="text-green-600 hover:text-green-900 mr-3"
                                >
                                    Edit
                                </a>
                                <form
                                    action="{{ route("attendances.destroy", $attendance) }}"
                                    method="POST"
                                    class="inline"
                                >
                                    @csrf
                                    @method("DELETE")
                                    <button
                                        type="submit"
                                        class="text-red-600 hover:text-red-900"
                                        onclick="
                                            return confirm(
                                                'Are you sure you want to delete this attendance record?',
                                            );
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
                                colspan="6"
                                class="px-6 py-4 text-center text-sm text-gray-500"
                            >
                                No attendance records found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
