<?php

namespace App\Http\Controllers;

use App\Models\TimetableEntry;
use App\Models\SchoolClass;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    public function index()
    {
        $timetableEntries = TimetableEntry::with(['class', 'subject', 'teacher'])->get();
        return view('timetables.index', compact('timetableEntries'));
    }

    public function create()
    {
        $classes = SchoolClass::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();
        return view('timetables.create', compact('classes', 'subjects', 'teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required|exists:classes,id',
            'subject_id' => 'required|exists:subjects,id',
            'teacher_id' => 'required|exists:teachers,id',
            'day_of_week' => 'required|string|max:20',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'room' => 'nullable|string|max:50',
        ]);

        TimetableEntry::create($request->all());

        return redirect()->route('timetables.index')
            ->with('success', 'Timetable entry created successfully.');
    }

    public function show(TimetableEntry $timetable)
    {
        return view('timetables.show', compact('timetable'));
    }

    public function edit(TimetableEntry $timetable)
    {
        $classes = SchoolClass::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();
        return view('timetables.edit', compact('timetable', 'classes', 'subjects', 'teachers'));
    }

    public function update(Request $request, TimetableEntry $timetable)
    {
        $request->validate([
            'class_id' => 'required|exists:classes,id',
            'subject_id' => 'required|exists:subjects,id',
            'teacher_id' => 'required|exists:teachers,id',
            'day_of_week' => 'required|string|max:20',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'room' => 'nullable|string|max:50',
        ]);

        $timetable->update($request->all());

        return redirect()->route('timetables.index')
            ->with('success', 'Timetable entry updated successfully.');
    }

    public function destroy(TimetableEntry $timetable)
    {
        $timetable->delete();

        return redirect()->route('timetables.index')
            ->with('success', 'Timetable entry deleted successfully.');
    }
}