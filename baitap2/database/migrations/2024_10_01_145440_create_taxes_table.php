<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('taxes', function (Blueprint $table) {
            $table->id(); // Tạo cột ID tự động tăng
            $table->string('tax_name',100); // Cột tên thuế
            $table->decimal('rate', 5, 2); // Cột tỷ lệ thuế
            $table->timestamps(); // Tạo các cột created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taxes'); // Xóa bảng taxes nếu nó tồn tại
    }
}
