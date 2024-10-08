@extends('master')

@section('title')
    Cập nhật Employee
@endsection

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employees.update', $employee) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="mb-3 mt-3">
            <label for="first_name" class="form-label">First_name:</label>
            <input type="text" class="form-control" id="first_name" value="{{ old('first_name') }}"
                placeholder="Enter first_name" name="first_name">
        </div>

        <div class="mb-3 mt-3">
            <label for="last_name" class="form-label">Last_name:</label>
            <input type="text" class="form-control" id="name" value="{{ old('last_name') }}"
                placeholder="Enter last_name" name="last_name">
        </div>

        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="Enter email"
                name="email">
        </div>

        <div class="mb-3 mt-3">
            <label for="phone" class="form-label">Phone:</label>
            <input type="text" class="form-control" id="phone" value="{{ old('phone') }}" placeholder="Enter phone"
                name="phone">
        </div>

        <div class="mb-3 mt-3">
            <label for="date_of_birth" class="form-label">Date_of_birth:</label>
            <input type="date" class="form-control" id="date_of_birth" value="{{ old('date_of_birth') }}"
                placeholder="Date_of_birth" name="date_of_birth">
        </div>

        <div class="mb-3 mt-3">
            <label for="hire_date" class="form-label">hire_date:</label>
            <input type="date" class="form-control" id="hire_date" value="{{ old('hire_date') }}" placeholder="Hire_date"
                name="date_of_birth">
        </div>

        <div class="mb-3 mt-3">
            <label for="salary" class="form-label">Salary:</label>
            <input type="number" class="form-control" id="salary" value="{{ old('salary') }}" placeholder="Salary"
                name="salary">
        </div>

        <div class="mb-3 mt-3">
            <label for="is_active" class="form-label">Is_active:</label>
            <input type="number" class="form-control" id="is_active" value="{{ old('is_active') }}"
                placeholder="is_active" name="is_active">
        </div>

        <div class="mb-3 mt-3">
            <label for="department_id" class="form-label">Department_id:</label>
            <input type="number" class="form-control" id="department_id" value="{{ old('department_id') }}"
                placeholder="department_id" name="department_id">
        </div>

        <div class="mb-3 mt-3">
            <label for="manager_id" class="form-label">Manager_id:</label>
            <input type="number" class="form-control" id="manager_id" value="{{ old('manager_id') }}"
                placeholder="manager_id" name="manager_id">
        </div>

        <div class="mb-3 mt-3">
            <label for="address" class="form-label">Address:</label>
            <input type="text" class="form-control" id="address" value="{{ old('address') }}" placeholder="address"
                name="address">
        </div>

        <div class="mb-3 mt-3">
            <label for="profile_picture" class="form-label">Profile_picture:</label>
            <input type="file" class="form-control" id="profile_picture" value="{{ old('profile_picture') }}"
                placeholder="profile_picture" name="profile_picture">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('employees.index') }}" class="btn btn-danger">Back to list</a>
    </form>
@endsection
