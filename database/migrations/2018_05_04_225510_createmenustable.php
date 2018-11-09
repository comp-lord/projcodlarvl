<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Createmenustable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('menu', function (Blueprint $table) {
            $table->integer('id')->unsigned()->index;
            $table->string('imagem')->nullable();
            $table->primary('id');
            $table->string('opcao');
            $table->string('href');
            $table->boolean('session');
            $table->timestamps();
        });

        Schema::create('submenu', function (Blueprint $table) {
            $table->increments('id')->unsigned()->index;
            $table->string('imagem')->nullable();
            $table->integer('submenu_id')->unsigned()->index;
            $table->foreign('submenu_id')->references('id')->on('menu');
            $table->string('opcao');
            $table->string('href');
            $table->boolean('ligado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('menu');
        Schema::dropIfExists('submenu');
        Schema::enableForeignKeyConstraints();
    }

}
