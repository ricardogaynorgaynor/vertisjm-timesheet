<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('employee_id')->unsigned();
            $table->integer('employee_user_id')->unsigned();
            $table->foreign('employee_user_id')->references('id')->on('users');
            $table->integer('employee_added_by_id')->unsigned();
            $table->foreign('employee_added_by_id')->references('manager_id')->on('managers');
            $table->string('employee_type');
            $table->softDeletes();
            $table->string('employee_department')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
