<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class AddPermissionLevelToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('permission_level')->default(1); });
    }
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('permission_level'); });
    }
}