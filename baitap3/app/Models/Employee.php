<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employees';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'date_of_birth',
        'hire_date',
        'salary',
        'is_active',
        'department_id',
        'manager_id',
        'address',
        'profile_picture',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'hire_date' => 'datetime',
        'date_of_birth' => 'date',
        'is_active' => 'boolean',
        'salary' => 'decimal:2',
    ];
}
