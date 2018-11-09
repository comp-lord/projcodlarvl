<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Publicacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('publicacaocategoria', function (Blueprint $table) {
            $table->integer('id_publicacaocategoria')->unsigned()->index;
            $table->primary('id_publicacaocategoria');
            $table->string('descricao');
        });
        
        Schema::create('publicacao', function (Blueprint $table) {
            $table->increments('id_publicacao')->index;
            $table->integer('id_publicacaocategoria')->unsigned()->index;
            $table->foreign('id_publicacaocategoria')->references('id_publicacaocategoria')->on('publicacaocategoria');
            $table->blobl('imagem');
            $table->string('titulo');
            $table->string('mensagem');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `publicacao` CHANGE `imagem` `imagem` LONGBLOB NOT NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('publicacaocategoria');
        Schema::dropIfExists('publicacao');
        Schema::enableForeignKeyConstraints();
    }
}
