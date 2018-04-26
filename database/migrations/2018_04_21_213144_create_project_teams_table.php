<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_teams', function (Blueprint $table) {
            $table->increments('team_id')->unsigned();
            $table->integer('project_employee_user_id')->unsigned();
            $table->foreign('project_employee_user_id')->references('employee_id')->on('employees');
            $table->integer('project_manager_user_id')->unsigned();
            $table->foreign('project_manager_user_id')->references('manager_id')->on('managers');
            $table->integer('project_team_project_id')->unsigned();
            $table->foreign('project_team_project_id')->references('project_id')->on('projects');
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
        Schema::dropIfExists('project_teams');
    }
}
