<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->nullable();
            $table->string('surname')->nullable();
            $table->date('dob')->nullable();
            $table->string('job_role')->nullable();
            $table->string('name')->nullable();  // Ensure the name field is added and can be null
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['first_name', 'surname', 'dob', 'job_role', 'name']);
        });
    }
}
