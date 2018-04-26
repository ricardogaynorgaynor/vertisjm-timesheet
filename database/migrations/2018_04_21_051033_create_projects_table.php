<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('project_id')->unsigned();
            $table->integer('project_created_by_id')->unsigned();
            $table->foreign('project_created_by_id')->references('manager_id')->on('managers');
            $table->integer('project_client_id')->unsigned();
            $table->foreign('project_client_id')->references('client_id')->on('clients');
            $table->string('project_name');
            $table->string('status')->nullable();
            $table->timestamp('deadline');
            $table->string('slug');
            $table->softDeletes();
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
        Schema::dropIfExists('projects');
    }
}
