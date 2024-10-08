<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id(); // Khóa chính tự động tăng
            $table->string('description'); // Mô tả chi tiêu
            $table->decimal('amount', 10, 2); // Số tiền chi tiêu
            $table->date('expense_date'); // Ngày chi tiêu
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses'); // Xóa bảng nếu có
    }
}
