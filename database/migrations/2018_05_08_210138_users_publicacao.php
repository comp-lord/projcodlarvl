<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersPublicacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_publicacao', function (Blueprint $table) {
            $table->integer('id_user')->unsigned()->index;
            $table->foreign('id_user')->references('id')->on('users');
            $table->integer('id_publicacao')->unsigned()->index;
            $table->foreign('id_publicacao')->references('id_publicacao')->on('publicacao');
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
