<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('employees')->insert([
                'first_name' => fake()->firstName(),
                'last_name' => fake()->lastName(),
                'email' => fake()->unique()->safeEmail(),
                'phone' => fake()->phoneNumber(),
                'date_of_birth' => fake()->date(),
                'hire_date' => fake()->dateTime(),
                'salary' => fake()->randomFloat(2, 30000, 100000),
                'is_active' => fake()->boolean(),
                'department_id' => fake()->randomDigitNotNull(),
                'manager_id' => fake()->randomDigitNotNull(),
                'address' => fake()->address(),
                'profile_picture' => null, // Fake dữ liệu ảnh có thể thêm sau nếu cần
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
