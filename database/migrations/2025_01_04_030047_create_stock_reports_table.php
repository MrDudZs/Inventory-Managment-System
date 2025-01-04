<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockReportsTable extends Migration
{
    public function up()
    {
        Schema::create('stock_reports', function (Blueprint $table) {
            $table->id();
            $table->date('report_generated');
            $table->time('generation_time');
            $table->string('stock_type');
            $table->integer('stock_level');
            $table->integer('sales_level');
        });
    }

    public function down()
    {
        Schema::dropIfExists('stock_reports');
    }
}
