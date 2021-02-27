<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRoleModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table_name = 'hemmmy_user_roles';
        Schema::create($table_name, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rid');
            $table->string('role');
            $table->string('function_name');
            $table->string('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table_name = 'hemmmy_user_roles';
        Schema::dropIfExists($table_name);
    }
}
