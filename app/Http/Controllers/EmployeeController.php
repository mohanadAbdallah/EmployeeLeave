<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function index(): View
    {
        $employees = User::with('department')->employees()->get();

        return view('employees.index', compact('employees'));
    }

    public function show(User $employee): View
    {
        return view('employees.show', compact('employee'));
    }

    public function create()
    {
        $departments = Department::all();

        return view('employees.create',compact('departments'));
    }

    public function store(EmployeeRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $validatedData['is_admin'] = false;

        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('image')){
            $image = $request->file('image')->store('images','public');
            $validatedData['image'] = $image;
        }

        User::create($validatedData);

        return redirect()->route('employees.index')
            ->with('success', 'Employee created successfully.');
    }

    public function edit(User $employee): View
    {
        $departments = Department::all();

        return view('employees.edit', compact('employee','departments'));
    }

    public function update(EmployeeRequest $request, User $employee): RedirectResponse
    {
        $validatedData = $request->validated();

        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('image')){
            $image = $request->file('image')->store('images','public');
            $validatedData['image'] = $image;
        }

        $employee->update($validatedData);

        return redirect()->route('employees.index')
            ->with('success', 'Employee updated successfully.');

    }
    public function destroy(User $employee): RedirectResponse
    {
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully.');
    }
}
