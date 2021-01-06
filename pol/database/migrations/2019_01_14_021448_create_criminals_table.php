<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriminalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('criminals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fn')->nullable();
            $table->string('ln')->nullable();
            $table->integer('age')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->integer('status')->default(0);
            $table->string('sex')->nullable();
            $table->text('dsc')->nullable();
            $table->string('email')->nullable();
            $table->string('height')->nullable();
            $table->string('eye')->nullable();
            $table->string('skin')->nullable();
            $table->string('address')->nullable();
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
        Schema::dropIfExists('criminals');
    }
}
