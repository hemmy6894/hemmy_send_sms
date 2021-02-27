<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table_name = config('hemmy_role_manager.database.roles');
        Schema::create($table_name, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('color')->default('green');
            $table->integer('status')->default(1);
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
        $table_name = config('hemmy_role_manager.database.roles');
        Schema::dropIfExists($table_name);
    }
}
