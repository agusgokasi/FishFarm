<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraws', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->nullable();
            $table->string('user_name');
            $table->string('phone')->nullable();
            $table->bigInteger('nominal');
            $table->bigInteger('nomor_rekening_user');
            $table->string('bank');
            $table->string('admin_name')->nullable();
            $table->bigInteger('nomor_rekening_admin')->nullable();
            $table->string('proof_image_withdraw')->nullable();
            $table->smallInteger('status')->default(0);
            $table->dateTime('moderated_at')->nullable();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

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
        Schema::dropIfExists('withdraws');
    }
}
