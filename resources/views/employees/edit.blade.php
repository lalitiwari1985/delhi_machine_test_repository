@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Employee</h1>
        <form action="{{ route('employees.update', $employee) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ old('name', $employee->name) }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob"
                    value="{{ old('dob', $employee->dob) }}">
                @error('dob')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-control" id="gender" name="gender">
                    <option value="male" {{ old('gender', $employee->gender) == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender', $employee->gender) == 'female' ? 'selected' : '' }}>Female
                    </option>
                </select>
                @error('gender')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="country_code" class="form-label">Country Code</label>
                <select class="form-control" id="country_code" name="country_code">
                    @foreach ($countryCodes as $code => $name)
                        <option value="{{ $code }}" {{ $employee->country_code == $code ? 'selected' : '' }}>
                            {{ $name }}</option>
                    @endforeach
                </select>
                @error('country_code')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="mobile_number" class="form-label">Mobile Number</label>
                <input type="text" class="form-control" id="mobile_number" name="mobile_number"
                    value="{{ old('mobile_number', $employee->mobile_number) }}">
                @error('mobile_number')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{ old('email', $employee->email) }}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="department_id" class="form-label">Department</label>
                <select class="form-control" id="department_id" name="department_id">
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}"
                            {{ old('department_id', $employee->department_id) == $department->id ? 'selected' : '' }}>
                            {{ $department->name }}</option>
                    @endforeach
                </select>
                @error('department_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="avatar" class="form-label">Avatar</label>
                <input type="file" class="form-control" id="avatar" name="avatar">
                <div id="avatarPreview" style="margin-top: 10px;">
                    @if ($employee->avatar)
                        <img src="{{ asset('storage/' . $employee->avatar) }}" alt="avatar" style="max-width: 200px;">
                    @endif
                </div>
                @error('avatar')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button style="float: right; margin-bottom:100px;" type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('avatar').addEventListener('change', function(event) {
            const [file] = event.target.files;
            if (file) {
                const preview = document.getElementById('avatarPreview');
                preview.innerHTML = '';
                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                img.style.maxWidth = '200px';
                preview.appendChild(img);
            }
        });
    </script>
@endsection
