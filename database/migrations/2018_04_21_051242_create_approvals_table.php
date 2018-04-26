<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approvals', function (Blueprint $table) {
            $table->increments('approval_id')->unsigned();
            $table->integer('approval_task_id')->unsigned();
      //      $table->foreign('approval_task_id')->references('task_id')->on('tasks');
            $table->integer('approval_approve_by_id')->unsigned();
         //   $table->foreign('approval_approve_by_id')->references('manager_id')->on('managers');
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
        Schema::dropIfExists('approvals');
    }
}
