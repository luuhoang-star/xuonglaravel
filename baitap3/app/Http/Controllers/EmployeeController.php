<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Employee::query()->latest('id')->paginate(5);
        return view('employees.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $data = $request->except('profile_picture');

        // Lưu ảnh vào storage và lưu đường dẫn vào database
        if ($request->hasFile('profile_picture')) {
            $data['profile_picture'] = Storage::put('employees', $request->file('profile_picture'));
        }

        Employee::create($data); // Gọi create với dữ liệu đã xử lý
        return redirect()->route('employees.index')
            ->with('success', 'Thao tác thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $data = $request->except('profile_picture');

        // Kiểm tra và lưu ảnh mới nếu có
        if ($request->hasFile('profile_picture')) {
            // Xóa ảnh cũ nếu có
            if ($employee->profile_picture && Storage::exists($employee->profile_picture)) {
                Storage::delete($employee->profile_picture);
            }

            // Lưu ảnh mới vào storage và cập nhật đường dẫn
            $data['profile_picture'] = Storage::put('employees', $request->file('profile_picture'));
        }

        $employee->update($data); // Cập nhật dữ liệu nhân viên

        return back()->with('success', 'Thao tác thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        // Xóa nhân viên
        if ($employee->profile_picture && Storage::exists($employee->profile_picture)) {
            Storage::delete($employee->profile_picture); // Xóa ảnh nếu tồn tại
        }

        $employee->delete(); // Xóa bản ghi nhân viên
        return back()->with('success', 'Thao tác thành công');
    }
}
