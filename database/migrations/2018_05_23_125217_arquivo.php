<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Arquivo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('arquivo', function (Blueprint $table) {
            $table->increments('id')->unsigned()->index;
            $table->string('username')->unique();
            $table->string('password');
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('facebook');
            $table->string('twitter');
            $table->date('datanascimento');
            $table->string('sexo');
            $table->float('altura');
            $table->string('habilitacoes');
            $table->string('nib1');
            $table->string('nib2');
            $table->binary('fotografia');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `arquivo` CHANGE `fotografia` `fotografia` LONGBLOB NOT NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
