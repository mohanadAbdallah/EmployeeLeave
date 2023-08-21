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

        $leaveRequests = LeaveRequest::where('status', '!=', 'denied')->latest()->get();

        return view('leave_requests.index', compact('leaveRequests'));
    }


    public function deniedLeaveRequests(): View
    {
        $user = Auth::user();

        $leaveRequests = $user->leaveRequests()->where('status', '=', 'denied')->latest()->get();
        return view('leave_requests.denied', compact('leaveRequests'));
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
