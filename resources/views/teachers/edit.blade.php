@extends('layouts.app')

@section('title', 'Edit Teacher - ' . $teacher->name)
@section('page-title', 'Edit Teacher')

@section('content')
    <div class="w-full mx-auto">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">
                    Edit Teacher: {{ $teacher->name }}
                </h1>
                <a
                    href="{{ route('teachers.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors duration-200"
                >
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to Teachers
                </a>
            </div>

            <form
                action="{{ route('teachers.update', $teacher) }}"
                method="POST"
                class="grid grid-cols-1 md:grid-cols-2 gap-4"
            >
                @csrf
                @method('PUT')

                <!-- Name -->
                <div>
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
                        value="{{ $teacher->name }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required
                    />
                </div>

                <!-- Email -->
                <div>
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
                        value="{{ $teacher->email }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required
                    />
                </div>

                <!-- Subject -->
                <div>
                    <label
                        for="subject"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        <i class="fas fa-book mr-2"></i>
                        Subject
                    </label>
                    <input
                        type="text"
                        name="subject"
                        id="subject"
                        value="{{ $teacher->subject }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required
                    />
                </div>

                <!-- Address -->
                <div>
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
                        value="{{ $teacher->address }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    />
                </div>

                <!-- Experience (full width) -->
                <div class="md:col-span-2">
                    <label
                        for="experience"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        <i class="fas fa-briefcase mr-2"></i>
                        Experience
                    </label>
                    <textarea
                        name="experience"
                        id="experience"
                        placeholder="Type the experience"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    >
{{ $teacher->experience }}</textarea
                    >
                </div>

                <!-- Buttons -->
                <div class="md:col-span-2 row-start-4 flex gap-4 mt-4">
                    <button
                        type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition-colors duration-200 flex items-center"
                    >
                        <i class="fas fa-save mr-2"></i>
                        Update Teacher
                    </button>
                    <a
                        href="{{ route('teachers.show', $teacher) }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition-colors duration-200 flex items-center"
                    >
                        <i class="fas fa-times mr-2"></i>
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
