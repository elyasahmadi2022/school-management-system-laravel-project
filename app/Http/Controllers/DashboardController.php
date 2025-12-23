<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Student;
use App\Models\Employee;
use App\Models\Fee;
use App\Models\Salary;
use App\Models\Attendance;
use App\Models\Transfer;
use App\Models\Expenditure;
use App\Models\SchoolClass;
use App\Models\Subject;
use App\Models\ParentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Basic statistics
        $totalTeachers = Teacher::count();
        $totalStudents = Student::count();
        $totalEmployees = Employee::count();
        $totalClasses = SchoolClass::count();
        $totalSubjects = Subject::count();
        $totalParents = ParentModel::count();
        $totalFees = Fee::sum('amount');
        $totalSalaries = Salary::sum('amount');
        $totalExpenditures = Expenditure::sum('amount');

        // Students by teacher (top 5)
        $studentsByTeacher = Student::selectRaw('teachers.name as teacher_name, count(students.id) as count')
            ->join('classes', 'students.class_id', '=', 'classes.id')
            ->join('teachers', 'classes.teacher_id', '=', 'teachers.id')
            ->groupBy('teachers.name')
            ->orderBy('count', 'desc')
            ->limit(5)
            ->get();

        // Recent attendances
        $recentAttendances = Attendance::with('student')
            ->orderBy('date', 'desc')
            ->limit(10)
            ->get();

        // Pending fees
        $pendingFees = Fee::where('paid', false)
            ->where('due_date', '>=', now())
            ->sum('amount');

        // Students by age groups
        $studentsByAge = Student::selectRaw("
                CASE
                    WHEN TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE()) < 10 THEN 'Under 10'
                    WHEN TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE()) BETWEEN 10 AND 14 THEN '10-14'
                    WHEN TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE()) BETWEEN 15 AND 18 THEN '15-18'
                    ELSE 'Over 18'
                END as age_group,
                COUNT(*) as count
            ")
            ->groupBy('age_group')
            ->get();

        // Monthly fee collection (last 6 months)
        $monthlyFees = Fee::selectRaw("
                DATE_FORMAT(created_at, '%Y-%m') as month,
                SUM(amount) as total
            ")
            ->where('paid', true)
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return view('dashboard.index', compact(
            'totalTeachers',
            'totalStudents',
            'totalEmployees',
            'totalClasses',
            'totalSubjects',
            'totalParents',
            'totalFees',
            'totalSalaries',
            'totalExpenditures',
            'studentsByTeacher',
            'recentAttendances',
            'pendingFees',
            'studentsByAge',
            'monthlyFees'
        ));
    }
}