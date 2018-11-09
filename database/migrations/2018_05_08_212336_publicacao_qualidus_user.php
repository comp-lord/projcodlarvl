<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PublicacaoQualidusUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('publicacao_qualidus_user', function (Blueprint $table) {
            $table->increments('id_publicacao_qualidus_user')->unsigned()->index;
            $table->integer('id_publicacao')->unsigned()->index;
            $table->foreign('id_publicacao')->references('id_publicacao')->on('publicacao');
            $table->integer('id_user')->unsigned()->index;
            $table->foreign('id_user')->references('id')->on('users');
            $table->integer('qualidus');
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
        Schema::dropIfExists('publicacao_qualidus_user');
        Schema::enableForeignKeyConstraints();
    }
}
