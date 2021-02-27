<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemFunctionModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table_name = config('hemmy_role_manager.database.system_functions');
        Schema::create('system_functions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('function_name');
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
        $table_name = config('hemmy_role_manager.database.system_functions');
        Schema::dropIfExists($table_name);
    }
}
