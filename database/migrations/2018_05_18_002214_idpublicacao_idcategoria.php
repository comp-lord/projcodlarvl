<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IdpublicacaoIdcategoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('idpublicacao_idcategoria', function (Blueprint $table) {
            $table->increments('id_publicacao_idcategoria')->unsigned()->index;
            $table->integer('id_publicacao')->unsigned()->index;
            $table->foreign('id_publicacao')->references('id_publicacao')->on('publicacao');
            $table->integer('id_publicacaocategoria')->unsigned()->index;
            $table->foreign('id_publicacaocategoria')->references('id_publicacaocategoria')->on('publicacaocategoria');
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
        Schema::dropIfExists('user_publicacao');
        Schema::enableForeignKeyConstraints();
    }
}
