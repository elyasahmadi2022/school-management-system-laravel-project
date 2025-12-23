@extends('layouts.app')

@section('title', 'Timetable Entry Details')

@section('page-title', 'Timetable Entry Details')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">
                    Timetable Entry Details
                </h1>
                <div class="flex space-x-2">
                    <a
                        href="{{ route('timetables.edit', $timetable) }}"
                        class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-lg transition-colors duration-200"
                    >
                        <i class="fas fa-edit mr-2"></i>
                        Edit
                    </a>
                    <a
                        href="{{ route('timetables.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors duration-200"
                    >
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to Timetables
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">
                        Class & Subject Information
                    </h2>
                    <div class="space-y-4">
                        <div class="flex">
                            <div
                                class="w-1/3 text-sm font-medium text-gray-500"
                            >
                                Class
                            </div>
                            <div class="w-2/3 text-gray-900">
                                {{ $timetable->class->name }}
                            </div>
                        </div>

                        <div class="flex">
                            <div
                                class="w-1/3 text-sm font-medium text-gray-500"
                            >
                                Subject
                            </div>
                            <div class="w-2/3 text-gray-900">
                                {{ $timetable->subject->name }}
                            </div>
                        </div>

                        <div class="flex">
                            <div
                                class="w-1/3 text-sm font-medium text-gray-500"
                            >
                                Teacher
                            </div>
                            <div class="w-2/3 text-gray-900">
                                {{ $timetable->teacher->name }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 p-6 rounded-lg">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">
                        Schedule Information
                    </h2>
                    <div class="space-y-4">
                        <div class="flex">
                            <div
                                class="w-1/3 text-sm font-medium text-gray-500"
                            >
                                Day
                            </div>
                            <div class="w-2/3 text-gray-900">
                                {{ $timetable->day_of_week }}
                            </div>
                        </div>

                        <div class="flex">
                            <div
                                class="w-1/3 text-sm font-medium text-gray-500"
                            >
                                Time
                            </div>
                            <div class="w-2/3 text-gray-900">
                                {{ $timetable->start_time }} -
                                {{ $timetable->end_time }}
                            </div>
                        </div>

                        <div class="flex">
                            <div
                                class="w-1/3 text-sm font-medium text-gray-500"
                            >
                                Room
                            </div>
                            <div class="w-2/3 text-gray-900">
                                {{ $timetable->room ?? 'N/A' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end">
                <form
                    action="{{ route('timetables.destroy', $timetable) }}"
                    method="POST"
                    class="inline"
                >
                    @csrf
                    @method('DELETE')
                    <button
                        type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition-colors duration-200"
                        onclick="
                            return confirm(
                                'Are you sure you want to delete this timetable entry? This action cannot be undone.',
                            );
                        "
                    >
                        <i class="fas fa-trash mr-2"></i>
                        Delete Timetable Entry
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
