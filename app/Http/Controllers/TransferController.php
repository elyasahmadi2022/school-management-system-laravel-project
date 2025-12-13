<?php

namespace App\Http\Controllers;

use App\Models\Transfer;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function index()
    {
        $transfers = Transfer::with(['student', 'vehicle'])->get();
        return view('transfers.index', compact('transfers'));
    }

    public function create()
    {
        return view('transfers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'vehicle_id' => 'nullable|exists:vehicles,id',
            'transfer_date' => 'required|date',
            'type' => 'required|in:pickup,dropoff',
            'status' => 'required|string|max:255',
        ]);

        Transfer::create($request->all());

        return redirect()->route('transfers.index')
            ->with('success', 'Transfer created successfully.');
    }

    public function show(Transfer $transfer)
    {
        $transfer->load(['student', 'vehicle']);
        return view('transfers.show', compact('transfer'));
    }

    public function edit(Transfer $transfer)
    {
        return view('transfers.edit', compact('transfer'));
    }

    public function update(Request $request, Transfer $transfer)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'vehicle_id' => 'nullable|exists:vehicles,id',
            'transfer_date' => 'required|date',
            'type' => 'required|in:pickup,dropoff',
            'status' => 'required|string|max:255',
        ]);

        $transfer->update($request->all());

        return redirect()->route('transfers.index')
            ->with('success', 'Transfer updated successfully.');
    }

    public function destroy(Transfer $transfer)
    {
        $transfer->delete();

        return redirect()->route('transfers.index')
            ->with('success', 'Transfer deleted successfully.');
    }
}
