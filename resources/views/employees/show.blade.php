@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Employee Details</h1>
        <div class="card">
            <div class="card-header">
                <h2>{{ $employee->name }}</h2>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Date of Birth:</strong> {{ $employee->dob }}
                </div>
                <div class="mb-3">
                    <strong>Gender:</strong> {{ ucfirst($employee->gender) }}
                </div>
                <div class="mb-3">
                    <strong>Country Code:</strong> {{ $employee->country_code }}
                </div>
                <div class="mb-3">
                    <strong>Mobile Number:</strong> {{ $employee->mobile_number }}
                </div>
                <div class="mb-3">
                    <strong>Email:</strong> {{ $employee->email }}
                </div>
                <div class="mb-3">
                    <strong>Department:</strong> {{ $employee->department->name }}
                </div>
                <div class="mb-3">
                    <strong>Avatar:</strong><br>
                    @if ($employee->avatar)
                        <img src="{{ asset('storage/' . $employee->avatar) }}" alt="avatar" style="max-width: 200px;">
                    @else
                        No Avatar
                    @endif
                </div>
                <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('employees.destroy', $employee) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
