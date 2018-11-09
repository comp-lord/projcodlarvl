<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Necessidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('necessidades',function (Blueprint $table){
            $table->increments('id_necessidade')->unsigned()->index;
            $table->binary('necessidade');
            $table->integer('numero');
            $table->timestamps();
        }); 
        DB::statement("ALTER TABLE `necessidades` CHANGE `necessidade` `necessidade` LONGBLOB NOT NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::disableForeignKeyConstraints();
       Schema::dropIfExists('necessidades');
       Schema::enableForeignKeyConstraints();
    }
}
