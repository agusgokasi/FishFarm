<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('topup_id')->unsigned()->nullable();
            $table->integer('slot_id')->unsigned()->nullable();
            $table->integer('project_id')->unsigned()->nullable();
            $table->integer('withdraw_id')->unsigned()->nullable();
            $table->string('username')->nullable();
            $table->string('user_name')->nullable();
            $table->string('project_name')->nullable();
            $table->bigInteger('nominal')->unsigned();
            $table->string('phone')->nullable();
            $table->string('transaction_image_topup')->nullable();
            $table->string('transaction_image_withdraw')->nullable();
            $table->bigInteger('nomor_rekening_user')->nullable();
            $table->bigInteger('nomor_rekening_admin')->nullable();
            $table->string('admin_name')->nullable();
            // 1: topup, 2:beli slot, 3:profit, 4:Withdraw, 5: cancel project
            $table->smallInteger('transaction_type')->nullable();
            $table->bigInteger('deposit')->default(0);
            $table->bigInteger('credit')->default(0);
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('topup_id')->references('id')->on('topups')->onDelete('cascade');
            $table->foreign('slot_id')->references('id')->on('slots')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('withdraw_id')->references('id')->on('withdraws')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
