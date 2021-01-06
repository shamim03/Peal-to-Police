<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Kk8 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('missings', function (Blueprint $table) {
            $table->string('dob')->nullable();
        });
        Schema::table('wanteds', function (Blueprint $table) {
            $table->string('dob')->nullable();
        });
        Schema::table('criminals', function (Blueprint $table) {
            $table->string('dob')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
