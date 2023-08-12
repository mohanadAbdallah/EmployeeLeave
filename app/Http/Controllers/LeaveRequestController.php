<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Models\LeaveType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LeaveRequestController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();
        $leaveRequests = $user->leaveRequests()->latest()->get();
        return view('leave_requests.index', compact('leaveRequests'));
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
            'start_date' => ['required','date'],
            'end_date' => ['required','date'],
        ]);

        $user = Auth::user();

        $leaveRequest = new LeaveRequest($validatedData);
        $user->leaveRequests()->save($leaveRequest);

        return redirect()->route('leave-requests.index')
            ->with('success', 'Leave request submitted successfully.');
    }
    public function approve(Request $request, LeaveRequest $leaveRequest): RedirectResponse
    {
        $leaveRequest->update(['status' => LeaveRequest::STATUS_APPROVED]);
        return back()->with('success', 'Leave Request Approved');
    }

    public function deny(Request $request, LeaveRequest $leaveRequest): RedirectResponse
    {
        $leaveRequest->update(['status' => LeaveRequest::STATUS_DENIED]);
        return back()->with('success', 'Leave Request Denied');
    }

}
