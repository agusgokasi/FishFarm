<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slots', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('price');
            $table->integer('project_id')->unsigned();
            $table->string('project_name');
            $table->string('project_slug', 120);
            $table->smallInteger('status')->default(0); // 0. belum dibeli, 1. dibeli
            $table->integer('investasion_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('user_name')->nullable();
            $table->timestamps();
            
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('investasion_id')->references('id')->on('investasions')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slots');
    }
}
