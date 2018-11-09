<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ComentarioPublicacaoUtilizador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('comentario_publicacao_utilizador',function (Blueprint $table){
            $table->increments('id_comentario_publicacao_user')->unsigned()->index;
            $table->integer('id_comentario')->unsigned()->references('id_comentario')->on('comentario');
            $table->integer('id_publicacao')->unsigned()->unique()->references('id_publicacao')->on('publicacao');
            $table->integer('id_utilizador')->unsigned()->references('id')->on('users');
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
       Schema::dropIfExists('comentario_publicacao_utilizador');
       Schema::enableForeignKeyConstraints();
    }
}
