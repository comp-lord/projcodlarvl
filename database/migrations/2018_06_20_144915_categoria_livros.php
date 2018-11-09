<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoriaLivros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_livros', function (Blueprint $table) {
            $table->integer('id_categoria')->index();
            $table->string('categoria');
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
       Schema::dropIfExists('categoria_livros');
       Schema::enableForeignKeyConstraints();
    }
}
