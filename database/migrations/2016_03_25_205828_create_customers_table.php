<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('firstname', 128);
            $table->string('lastname', 128);
            $table->string('ssn', 128);
            $table->string('street', 256);
            $table->string('street2', 128);
            $table->string('city', 128);
            $table->string('state', 128);
            $table->string('zip', 128);
            $table->string('pin', 128);
            $table->timestamps();

            $table->index('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customers');
    }
}
