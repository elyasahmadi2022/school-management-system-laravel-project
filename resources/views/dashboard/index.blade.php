@extends('layouts.app')

@push('styles')
    <style>
        .bg-gradient-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .bg-gradient-success {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        }
        .bg-gradient-info {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .bg-gradient-warning {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }
    </style>
@endpush

@section('content')
    <div class="w-full py-4">
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4 w-full px-3">
            <div
                style="
                    background: linear-gradient(
                        135deg,
                        #667eea 0%,
                        #764ba2 100%
                    );
                "
                class="rounded-lg transition-all cursor-pointer duration-100 hover:scale-105 border border-gray-200 text-center text-white"
            >
                <div class="p-4">
                    <div class="mb-2">
                        <svg
                            class="w-8 h-8 mx-auto"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"
                            />
                        </svg>
                    </div>
                    <h6 class="text-white/50 mb-1">Teachers</h6>
                    <h2 class="font-bold mb-0">{{ $totalTeachers }}</h2>
                </div>
            </div>

            <div
                style="
                    background: linear-gradient(
                        135deg,
                        #11998e 0%,
                        #38ef7d 100%
                    );
                "
                class="rounded-lg transition-all cursor-pointer duration-100 hover:scale-105 border border-gray-200 text-center bg-gradient-success text-white"
            >
                <div class="p-4">
                    <div class="mb-2">
                        <svg
                            class="w-8 h-8 mx-auto"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M16 4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zm4 18v-6h2.5l-2.54-7.63A2.01 2.01 0 0 0 18.06 7H15V6H9v1H6.94c-.76 0-1.45.43-1.79 1.11L2.5 16H5v6h2v-6h6v6h2zm-9-8.5c0-.28.22-.5.5-.5s.5.22.5.5-.22.5-.5.5-.5-.22-.5-.5zm7 0c0-.28.22-.5.5-.5s.5.22.5.5-.22.5-.5.5-.5-.22-.5-.5z"
                            />
                        </svg>
                    </div>
                    <h6 class="text-white/50 mb-1">Students</h6>
                    <h2 class="font-bold mb-0">{{ $totalStudents }}</h2>
                </div>
            </div>

            <div
                style="
                    background: linear-gradient(
                        135deg,
                        #667eea 0%,
                        #764ba2 100%
                    );
                "
                class="rounded-lg transition-all cursor-pointer duration-100 hover:scale-105 border border-gray-200 text-center bg-gradient-info text-white"
            >
                <div class="p-4">
                    <div class="mb-2">
                        <svg
                            class="w-8 h-8 mx-auto"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M20 6h-4V4c0-1.11-.89-2-2-2h-4c-1.11 0-2 .89-2 2v2H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-6 0h-4V4h4v2z"
                            />
                        </svg>
                    </div>
                    <h6 class="text-white/50 mb-1">Employees</h6>
                    <h2 class="font-bold mb-0">{{ $totalEmployees }}</h2>
                </div>
            </div>

            <div
                style="
                    background: linear-gradient(
                        135deg,
                        #f093fb 0%,
                        #f5576c 100%
                    );
                "
                class="rounded-lg transition-all cursor-pointer duration-100 hover:scale-105 border border-gray-200 text-center bg-gradient-warning text-white"
            >
                <div class="p-4">
                    <div class="mb-2">
                        <svg
                            class="w-8 h-8 mx-auto"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"
                            />
                        </svg>
                    </div>
                    <h6 class="text-white/50 mb-1">Parents</h6>
                    <h2 class="font-bold mb-0">{{ $totalParents }}</h2>
                </div>
            </div>
        </div>

        <!-- ===== Financial Statistics ===== -->
        <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 mb-4 px-3">
            <div class="">
                <div
                    class="bg-gray-50 rounded-lg shadow-lg border border-gray-200"
                >
                    <div class="p-4">
                        <div class="flex items-center mb-2">
                            <div class="mr-3">
                                <svg
                                    class="w-6 h-6 text-green-500"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"
                                    />
                                </svg>
                            </div>
                            <h6 class="text-gray-600 mb-0">
                                Total Fees Collected
                            </h6>
                        </div>
                        <h4 class="font-bold text-green-500 mb-0">
                            ${{ number_format($totalFees) }}
                        </h4>
                    </div>
                </div>
            </div>
            <div class="">
                <div
                    class="bg-gray-50 rounded-lg shadow-lg border border-gray-200"
                >
                    <div class="p-4">
                        <div class="flex items-center mb-2">
                            <div class="mr-3">
                                <svg
                                    class="w-6 h-6 text-blue-500"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"
                                    />
                                </svg>
                            </div>
                            <h6 class="text-gray-600 mb-0">
                                Total Salaries Paid
                            </h6>
                        </div>
                        <h4 class="font-bold text-blue-500 mb-0">
                            ${{ number_format($totalSalaries) }}
                        </h4>
                    </div>
                </div>
            </div>
            <div class="">
                <div
                    class="bg-gray-50 rounded-lg shadow-lg border border-gray-200"
                >
                    <div class="p-4">
                        <div class="flex items-center mb-2">
                            <div class="mr-3">
                                <svg
                                    class="w-6 h-6 text-red-500"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"
                                    />
                                </svg>
                            </div>
                            <h6 class="text-gray-600 mb-0">
                                Total Expenditures
                            </h6>
                        </div>
                        <h4 class="font-bold text-red-500 mb-0">
                            ${{ number_format($totalExpenditures) }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== Charts Section ===== -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
            <div class="w-full">
                <div class="bg-white rounded-lg shadow border border-gray-200">
                    <div class="p-4">
                        <h6 class="mb-3">Students by Age Group</h6>
                        <canvas id="ageChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="bg-white rounded-lg shadow border border-gray-200">
                    <div class="p-4">
                        <h6 class="mb-3">Monthly Fee Collection</h6>
                        <canvas id="feeChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== Tables ===== -->
        <div class="grid grid-cols-1 gap-4">
            <div class="w-full">
                <div
                    class="bg-white rounded-lg shadow-lg border border-gray-200"
                >
                    <div class="bg-blue-500 text-white p-4 rounded-t-lg">
                        <h6 class="mb-0 font-semibold">
                            Top Teachers by Students
                        </h6>
                    </div>
                    <div class="p-4">
                        <div class="overflow-x-auto">
                            <table
                                class="w-full text-sm text-left border-collapse"
                            >
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-4 py-2 border-b border-gray-200"
                                        >
                                            Teacher
                                        </th>
                                        <th
                                            class="px-4 py-2 border-b border-gray-200"
                                        >
                                            Total Students
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($studentsByTeacher as $row)
                                        <tr class="hover:bg-gray-50">
                                            <td
                                                class="px-4 py-2 border-b border-gray-200"
                                            >
                                                {{ $row->teacher_name }}
                                            </td>
                                            <td
                                                class="px-4 py-2 border-b border-gray-200"
                                            >
                                                <span
                                                    class="inline-block px-2 py-1 text-xs font-semibold text-white bg-blue-500 rounded"
                                                >
                                                    {{ $row->count }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full">
                <div
                    class="bg-white rounded-lg shadow-lg border border-gray-200"
                >
                    <div class="bg-yellow-500 text-white p-4 rounded-t-lg">
                        <h6 class="mb-0 font-semibold">Recent Attendance</h6>
                    </div>
                    <div class="p-4">
                        <div class="overflow-x-auto">
                            <table
                                class="w-full text-sm text-left border-collapse"
                            >
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-4 py-2 border-b border-gray-200"
                                        >
                                            Student
                                        </th>
                                        <th
                                            class="px-4 py-2 border-b border-gray-200"
                                        >
                                            Date
                                        </th>
                                        <th
                                            class="px-4 py-2 border-b border-gray-200"
                                        >
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recentAttendances as $attendance)
                                        <tr class="hover:bg-gray-50">
                                            <td
                                                class="px-4 py-2 border-b border-gray-200"
                                            >
                                                {{ $attendance->student->name ?? 'N/A' }}
                                            </td>
                                            <td
                                                class="px-4 py-2 border-b border-gray-200"
                                            >
                                                {{ $attendance->date }}
                                            </td>
                                            <td
                                                class="px-4 py-2 border-b border-gray-200"
                                            >
                                                @if ($attendance->status == 'present')
                                                    <span
                                                        class="inline-block px-2 py-1 text-xs font-semibold text-white bg-green-500 rounded"
                                                    >
                                                        Present
                                                    </span>
                                                @elseif ($attendance->status == 'absent')
                                                    <span
                                                        class="inline-block px-2 py-1 text-xs font-semibold text-white bg-red-500 rounded"
                                                    >
                                                        Absent
                                                    </span>
                                                @else
                                                    <span
                                                        class="inline-block px-2 py-1 text-xs font-semibold text-white bg-gray-500 rounded"
                                                    >
                                                        {{ $attendance->status }}
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ageLabels = @json($studentsByAge->pluck('age_group'));
        const ageData = @json($studentsByAge->pluck('count'));

        new Chart(document.getElementById('ageChart'), {
            type: 'pie',
            data: {
                labels: ageLabels,
                datasets: [
                    {
                        data: ageData,
                        backgroundColor: [
                            '#FF6384',
                            '#36A2EB',
                            '#FFCE56',
                            '#4BC0C0',
                            '#9966FF',
                            '#FF9F40',
                        ],
                        borderWidth: 2,
                    },
                ],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                },
            },
        });

        const feeLabels = @json($monthlyFees->pluck('month'));
        const feeData = @json($monthlyFees->pluck('total'));

        new Chart(document.getElementById('feeChart'), {
            type: 'line',
            data: {
                labels: feeLabels,
                datasets: [
                    {
                        label: 'Fees',
                        data: feeData,
                        fill: true,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        tension: 0.4,
                    },
                ],
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    </script>
@endpush
