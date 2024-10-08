<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Xác định xem người dùng có được phép gửi yêu cầu này không.
     */
    public function authorize(): bool
    {
        return true; // Cho phép người dùng gửi yêu cầu
    }

    /**
     * Các quy tắc xác thực áp dụng cho yêu cầu này.
     */
    public function rules(): array
    {
        $employeeId = $this->route('employee')->id; // Lấy ID của employee đang cập nhật

        return [
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|unique:employees,email|max:150',
            'phone' => 'nullable|string|max:15',
            'date_of_birth' => 'nullable|date',
            'hire_date' => 'nullable|date',
            'salary' => 'nullable|numeric|min:0',
            'is_active' => 'required|boolean',
            'department_id' => 'nullable|integer',
            'manager_id' => 'nullable|integer|',
            'address' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }
}
