<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Models\LeaveType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EmployeeLeaveRequest extends Controller
{

    public function index($id): View
    {
        $leave_request = auth()->user()->leaveRequests()->get();

        return view('leave_requests.show', compact('leave_request'));
    }

    public function create(): View
    {
        $leaveTypes = LeaveType::all();
        return view('leave_requests.create', compact('leaveTypes'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'leave_type_id' => ['required'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
        ]);

        $user = Auth::user();
        $validatedData['status'] = LeaveRequest::STATUS_PENDING;

        $leaveRequest = new LeaveRequest($validatedData);
        $user->leaveRequests()->save($leaveRequest);

        return redirect()->route('employee-leave-requests', auth()->user()->id)
            ->with('success', 'Leave request submitted successfully.');

    }

    public function destroy(LeaveRequest $leaveRequest): RedirectResponse
    {
        dd($leaveRequest);
        $leaveRequest->delete();

        return redirect()->route('employee-leave-requests',auth()->user()->id)
            ->with('success', 'Leave request deleted successfully.');
    }
}
