<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('client_id')->unsigned();
            $table->integer('client_user_id')->unsigned();
            $table->foreign('client_user_id')->references('id')->on('users');
            $table->string('client_company')->nullable();
            $table->string('client_name');
            $table->string('client_email');
            $table->string('client_image');
            $table->softDeletes();
            $table->string('client_home_telephone')->nullable();
            $table->string('client_work_telephone')->nullable();
            $table->string('client_mobile')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
