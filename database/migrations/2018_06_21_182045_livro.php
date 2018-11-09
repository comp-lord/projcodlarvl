<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Livro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('livro',function (Blueprint $table){
            $table->increments('id_livro')->unsigned()->index;
            $table->integer('id_categoria')->references('id_categoria')->on('categoria');
            $table->binary('livro');
            $table->string('autor');
            $table->string('capa');
            $table->string('titulo');
            $table->string('sinopse');
            $table->timestamps();
        });
        
    DB::statement("ALTER TABLE `livro` CHANGE `livro` `livro` LONGBLOB NOT NULL");
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
    }
}
