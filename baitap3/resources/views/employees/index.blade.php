@extends('master')

@section('title')
    Danh sách Employee
@endsection

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <a href="{{ route('employees.create') }}" class="btn btn-primary">Thêm mới</a>

    <table class="table mt-2 mb-2">
        <tr>
            <th>ID</th>
            <th>First_name</th>
            <th>Last_name</th>
            <th>EMAIL</th>
            <th>PHONE</th>
            <th>Date_of_birth</th>
            <th>Hire_date</th>
            <th>Salery</th>
            <th>IS_active</th>
            <th>Department_id</th>
            <th>manager_id</th>
            <th>Address</th>
            <th>Profile_picture</th>
            <th>CREATED AT</th>
            <th>UPDATED AT</th>
        </tr>

        @foreach ($data as $employee)
            <tr>
                <td>{{ $employee->id }}</td>

                <!-- Hiển thị ảnh của sinh viên, nếu không có thì hiển thị ảnh mặc định -->
             

                <td>{{ $employee->first_name }}</td>
                <td>{{ $employee->last_name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->date_of_birth }}</td>
                <td>{{ $employee->hire_date }}</td>
                <td>{{ $employee->salary }}</td>
                <td>{{ $employee->is_active }}</td>
                <td>{{ $employee->department_id }}</td>
                <td>{{ $employee->manager_id }}</td>
                <td>{{ $employee->address }}</td>
                <td>
                    @if ($employee->profile_picture)
                        <img src="{{ Storage::url($employee->profile_picture) }}" alt="Employee Image" style="width:50px;">
                    @else
                        <img src="{{ asset('images/default-employee.jpg') }}" alt="Default Image" style="width:50px;">
                    @endif
                </td>
                <td>{{ $employee->created_at }}</td>
                <td>{{ $employee->updated_at }}</td>
                <td>
                    <a href="{{ route('employees.show', $employee) }}" class="btn btn-info">Show</a>
                    <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning mt-2 mb-2">Edit</a>
                    <form action="{{ route('employees.destroy', $employee) }}" method="post" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')"
                            class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <!-- Hiển thị các liên kết phân trang -->
    {{ $data->links() }}
@endsection
