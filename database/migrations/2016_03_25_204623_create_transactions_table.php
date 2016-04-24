<?php

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

            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('uuid', 128)->unique();
            $table->string('description', 256);
            $table->decimal('amount', 15,2);
            $table->decimal('balance', 15,2);
            $table->enum('type', ['input', 'output']);
            $table->timestamps();
            $table->index('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('account_id')->unsigned();
            $table->foreign('account_id')->references('id')->on('accounts');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transactions');
    }
}
