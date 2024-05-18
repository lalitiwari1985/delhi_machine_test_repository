<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Mail\EmployeeCreated;
use Illuminate\Support\Facades\Mail;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $countryCodes = [
            '+1' => 'USA (+1)',
            '+44' => 'UK (+44)',
            '+91' => 'India (+91)',
            '+61' => 'Australia (+61)',
        ];
        $departments = Department::all(); // Assuming you have a Department model
        return view('employees.create', compact('countryCodes', 'departments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'country_code' => 'required|string|max:5',
            'mobile_number' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:employees',
            'department_id' => 'required|exists:departments,id',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $validated['avatar'] = $avatarPath;
        }

        $employee = Employee::create($validated);
        //Sending Email Code Through SMTP google
        Mail::to($employee->email)->send(new EmployeeCreated($employee));

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $countryCodes = [
            '+1' => 'USA (+1)',
            '+44' => 'UK (+44)',
            '+91' => 'India (+91)',
            '+61' => 'Australia (+61)',
        ];
        $departments = Department::all(); // Assuming you have a Department model
        return view('employees.edit', compact('countryCodes', 'employee', 'departments'));
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'country_code' => 'required|string|max:5',
            'mobile_number' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:employees,email,' . $employee->id,
            'department_id' => 'required|exists:departments,id',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('avatar')) {
            if ($employee->avatar) {
                Storage::disk('public')->delete($employee->avatar);
            }
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $validated['avatar'] = $avatarPath;
        }

        $employee->update($validated);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        if ($employee->avatar) {
            Storage::disk('public')->delete($employee->avatar);
        }

        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }

    public function getCommaSeparatedValue()
    {
        return view('employees.commaseparatevalue');
    }
}
