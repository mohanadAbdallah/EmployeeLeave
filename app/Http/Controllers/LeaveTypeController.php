<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LeaveTypeController extends Controller
{
    public function index(): View
    {
        $leaveTypes = LeaveType::all();
        return view('leave_types.index', compact('leaveTypes'));
    }

    public function show($id): View
    {
        $leaveType = LeaveType::findOrFail($id);
        return view('leave_types.show', compact('leaveType'));
    }

    public function create(): View
    {
        return view('leave_types.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
        ]);

        LeaveType::create($validatedData);

        return redirect()->route('leave-types.index')
            ->with('success', 'Leave type created successfully.');
    }

    public function edit(LeaveType $leaveType): View
    {
        return \view('leave_types.edit',compact('leaveType'));
    }
    public function update(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
        ]);

        LeaveType::create($validatedData);

        return redirect()->route('leave-types.index')
            ->with('success', 'Leave type updated successfully.');
    }
}
