<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Loggins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loggins',function (Blueprint $table){
            $table->increments('id_login')->unsigned()->index;
            $table->string('ip');
            $table->integer('isinsession');
            $table->integer('numero');
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
       Schema::disableForeignKeyConstraints();
       Schema::dropIfExists('loggins');
       Schema::enableForeignKeyConstraints();
    }
}
