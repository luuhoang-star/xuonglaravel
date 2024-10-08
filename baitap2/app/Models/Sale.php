<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    // Nếu bảng không theo quy tắc đặt tên chuẩn, bạn có thể chỉ định tên bảng:
    protected $table = 'sales';

    // Nếu cần thiết, bạn có thể chỉ định các trường fillable:
    protected $fillable = ['total', 'sale_date'];
}
