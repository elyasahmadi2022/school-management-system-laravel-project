@extends('layouts.app')
@section('title', 'Add New Teacher')
@section('page-title', 'Add New Teacher')
@section('content')
    <div class="w-full mx-auto">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">
                    Add New Teacher
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
                action="{{ route('teachers.store') }}"
                method="POST"
                class="w-full grid grid-cols-1 md:grid-cols-2 gap-3"
            >
                @csrf
                <div class="">
                    <label
                        for="name"
                        class="text-sm font-medium text-gray-700 mb-2 flex items-center"
                    >
                        <svg
                            class="w-4 h-4 mr-2 text-gray-500"
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
                        Name
                    </label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        placeholder="type your name here...."
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required
                    />
                </div>
                <div class="">
                    <label
                        for="email"
                        class="text-sm font-medium text-gray-700 mb-2 flex items-center"
                    >
                        <svg
                            class="w-4 h-4 mr-2 text-gray-500"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                            ></path>
                        </svg>
                        email
                    </label>
                    <input
                        type="email"
                        name="email"
                        placeholder="type your email here..."
                        id="email"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required
                    />
                </div>
                <di>
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
                        placeholder="type the subject"
                        id="subject"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required
                    />
                </di>
                <div>
                    <label
                        for="address"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        <i class="fas fa-book mr-2"></i>
                        Address
                    </label>
                    <input
                        type="text"
                        name="address"
                        id="address"
                        placeholder="type the address here..."
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required
                    />
                </div>
                <div class="col-start-1 col-end-3 w-full">
                    <label
                        for="experience"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        <i class="fas fa-book mr-2"></i>
                        experience
                    </label>
                    <textarea
                        placeholder="type the experience"
                        name="experience"
                        id="experience"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required
                    ></textarea>
                </div>

                <div
                    class="row-start-4 col-start-1 flex items-center gap-x-3 w-full"
                >
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
