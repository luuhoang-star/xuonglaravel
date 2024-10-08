<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_reports', function (Blueprint $table) {
            $table->bigIncrements('id');  // Tạo khóa chính tự động tăng
            $table->unsignedInteger('month'); // Cột tháng
            $table->unsignedInteger('year'); // Cột năm
            $table->decimal('total_sales', 10, 2); // Cột tổng doanh thu
            $table->decimal('total_expenses', 10, 2); // Cột tổng chi phí
            $table->decimal('profit_before_tax', 10, 2); // Cột lợi nhuận trước thuế
            $table->decimal('tax_amount', 10, 2); // Cột số tiền thuế
            $table->decimal('profit_after_tax', 10, 2); // Cột lợi nhuận sau thuế
            $table->timestamps(); // Tạo cột created_at và updated_at
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('financial_reports'); // Xóa bảng nếu có
    }
}
