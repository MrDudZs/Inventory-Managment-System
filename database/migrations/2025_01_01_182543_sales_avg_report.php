<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales_avg_report', function (Blueprint $table) {
            $table->id();
            $table->date('report_generated');
            $table->time('generation_time');
            $table->string('total_avg_levels');
            $table->string('total_avg_sales');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('stock_reports');
    }
};
