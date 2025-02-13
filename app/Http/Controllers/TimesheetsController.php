<?php

namespace App\Http\Controllers;

use App\Models\Timesheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimesheetsController extends Controller
{
    // Show all timesheets with pagination
    public function index(Request $request)
    {

        $query = Timesheet::query();

        // Filtering by approved status
        if ($request->has('approved') && $request->approved !== 'all') {
            $query->where('approved', $request->approved === 'approved' ? 1 : 0);
        }

        // Filtering by payment status
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Sorting
        if ($request->has('sort_by')) {
            $sortField = $request->sort_by;
            $query->orderBy($sortField);
        } else {
            $query->orderBy('created_at', 'desc'); // Default sorting
        }

        $timesheets = Timesheet::paginate(10); // Adjust the pagination as needed
        return view('dashboard.pages.timesheets', compact('timesheets'));
    }

    // Show create timesheet form
    public function create()
    {
        return view('timesheets.create');
    }

    // Store a new timesheet
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_name' => 'required|string|max:255',
            'task_id' => 'required|string|max:255',
            'project' => 'nullable|string|max:255',
            'approximated_hours' => 'required|integer',
            'submitted_hours' => 'required|integer'
        ]);

        $validated['user_id'] = Auth::id(); // The logged-in user who is submitting the timesheet

        Timesheet::create($validated);

        return redirect()->route('timesheets.index')->with('success', 'Timesheet created successfully.');
    }

    // Show a single timesheet
    public function show(Timesheet $timesheet)
    {
        return view('dashboard.pages.timesheets', compact('timesheet'));
    }

    // Show edit form for a timesheet
    public function edit(Timesheet $timesheet)
    {
        return view('timesheets.edit', compact('timesheet'));
    }

    // Update an existing timesheet
    public function update(Request $request, Timesheet $timesheet)
    {
        $validated = $request->validate([
            'employee_name' => 'required|string|max:255',
            'task_id' => 'required|string|max:255',
            'project' => 'nullable|string|max:255',
            'approximated_hours' => 'required|integer',
            'submitted_hours' => 'required|integer',
            'approved' => 'nullable|boolean',
            'status' => 'required|in:paid,unpaid',
        ]);

        $timesheet->update($validated);

        return redirect()->route('timesheets.index')->with('success', 'Timesheet updated successfully.');
    }

    // Delete a timesheet
    public function destroy(Timesheet $timesheet)
    {
        $timesheet->delete();

        return redirect()->route('timesheets.index')->with('success', 'Entry deleted successfully.');
    }
}
