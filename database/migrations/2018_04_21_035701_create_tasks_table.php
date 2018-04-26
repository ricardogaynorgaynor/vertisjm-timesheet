<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('task_id')->unsigned();
            $table->integer('task_employee_id')->unsigned();
            $table->foreign('task_employee_id')->references('employee_id')->on('employees');
            $table->integer('task_project_id')->unsigned();
            $table->foreign('task_project_id')->references('project_id')->on('projects');
            $table->string('task_name');
            $table->softDeletes();
            $table->string('task_start_date');
            $table->string('task_end_date');
            $table->string('time_taken', 10);
            $table->timestamp('datetime')->nullable();
            $table->longText('task_comment')->nullable();
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
        Schema::dropIfExists('tasks');
    }
}
