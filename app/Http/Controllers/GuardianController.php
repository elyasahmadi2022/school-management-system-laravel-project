<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use Illuminate\Http\Request;

class GuardianController extends Controller
{
    public function index()
    {
        $parents = Guardian::all();
        return view('guardians.index', compact('parents'));
    }

    public function create()
    {
        return view('guardians.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:parents',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'occupation' => 'nullable|string|max:255',
        ]);

        Guardian::create($request->all());

        return redirect()->route('parents.index')
            ->with('success', 'Parent created successfully.');
    }

    public function show(Guardian $parent)
    {
        $parent->load('students');
        return view('guardians.show', compact('parent'));
    }

    public function edit(Guardian $parent)
    {
        return view('guardians.edit', compact('parent'));
    }

    public function update(Request $request, Guardian $parent)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:parents,email,' . $parent->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'occupation' => 'nullable|string|max:255',
        ]);

        $parent->update($request->all());

        return redirect()->route('parents.index')
            ->with('success', 'Parent updated successfully.');
    }

    public function destroy(Guardian $parent)
    {
        $parent->delete();

        return redirect()->route('parents.index')
            ->with('success', 'Parent deleted successfully.');
    }
}