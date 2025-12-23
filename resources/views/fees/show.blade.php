@extends("layouts.app")

@section("title", "Fee Details")

@section("page-title", "Fee Details")

@section("content")
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div
                class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-6 gap-4"
            >
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800">
                    Fee Record Details
                </h1>
                <div class="flex flex-col sm:flex-row gap-2 sm:space-x-2">
                    <a
                        href="{{ route("fees.edit", $fee) }}"
                        class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center justify-center"
                    >
                        <i class="fas fa-edit mr-2"></i>
                        Edit
                    </a>
                    <a
                        href="{{ route("fees.index") }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center justify-center"
                    >
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to Fees
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">
                        Fee Information
                    </h2>
                    <div class="space-y-4">
                        <div class="flex">
                            <div
                                class="w-1/3 text-sm font-medium text-gray-500"
                            >
                                ID
                            </div>
                            <div class="w-2/3 text-gray-900">
                                {{ $fee->id }}
                            </div>
                        </div>

                        <div class="flex">
                            <div
                                class="w-1/3 text-sm font-medium text-gray-500"
                            >
                                Student
                            </div>
                            <div class="w-2/3 text-gray-900">
                                {{ $fee->student->name }}
                            </div>
                        </div>

                        <div class="flex">
                            <div
                                class="w-1/3 text-sm font-medium text-gray-500"
                            >
                                Amount
                            </div>
                            <div class="w-2/3 text-gray-900">
                                ${{ number_format($fee->amount, 2) }}
                            </div>
                        </div>

                        <div class="flex">
                            <div
                                class="w-1/3 text-sm font-medium text-gray-500"
                            >
                                Due Date
                            </div>
                            <div class="w-2/3 text-gray-900">
                                {{ $fee->due_date->format("F j, Y") }}
                            </div>
                        </div>

                        <div class="flex">
                            <div
                                class="w-1/3 text-sm font-medium text-gray-500"
                            >
                                Status
                            </div>
                            <div class="w-2/3">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full @if ($fee->paid)
                                        bg-green-100
                                        text-green-800
                                    @else
                                        bg-red-100
                                        text-red-800
                                    @endif"
                                >
                                    {{ $fee->paid ? "Paid" : "Pending" }}
                                </span>
                            </div>
                        </div>

                        <div class="flex">
                            <div
                                class="w-1/3 text-sm font-medium text-gray-500"
                            >
                                Paid Date
                            </div>
                            <div class="w-2/3 text-gray-900">
                                {{ $fee->paid_date ? $fee->paid_date->format("F j, Y") : "N/A" }}
                            </div>
                        </div>

                        <div class="flex">
                            <div
                                class="w-1/3 text-sm font-medium text-gray-500"
                            >
                                Description
                            </div>
                            <div class="w-2/3 text-gray-900">
                                {{ $fee->description ?? "N/A" }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 p-6 rounded-lg">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">
                        Student Information
                    </h2>
                    <div class="space-y-4">
                        <div class="flex">
                            <div
                                class="w-1/3 text-sm font-medium text-gray-500"
                            >
                                Name
                            </div>
                            <div class="w-2/3 text-gray-900">
                                {{ $fee->student->name }}
                            </div>
                        </div>

                        <div class="flex">
                            <div
                                class="w-1/3 text-sm font-medium text-gray-500"
                            >
                                Email
                            </div>
                            <div class="w-2/3 text-gray-900">
                                {{ $fee->student->email ?? "N/A" }}
                            </div>
                        </div>

                        <div class="flex">
                            <div
                                class="w-1/3 text-sm font-medium text-gray-500"
                            >
                                Phone
                            </div>
                            <div class="w-2/3 text-gray-900">
                                {{ $fee->student->phone ?? "N/A" }}
                            </div>
                        </div>

                        <div class="flex">
                            <div
                                class="w-1/3 text-sm font-medium text-gray-500"
                            >
                                Class
                            </div>
                            <div class="w-2/3 text-gray-900">
                                {{ $fee->student->class->name ?? "N/A" }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end">
                <form
                    action="{{ route("fees.destroy", $fee) }}"
                    method="POST"
                    class="inline"
                >
                    @csrf
                    @method("DELETE")
                    <button
                        type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition-colors duration-200"
                        onclick="
                            return confirm(
                                'Are you sure you want to delete this fee record? This action cannot be undone.',
                            );
                        "
                    >
                        <i class="fas fa-trash mr-2"></i>
                        Delete Fee Record
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
