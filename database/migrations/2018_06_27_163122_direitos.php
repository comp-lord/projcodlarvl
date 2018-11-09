<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Direitos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('direitos', function (Blueprint $table) {
            $table->increments('id_direito')->unsigned()->index;
            $table->binary('termos');
            
        });
        DB::statement("ALTER TABLE `direitos` CHANGE `termos` `termos` LONGBLOB NOT NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::disableForeignKeyConstraints();
       Schema::dropIfExists('direitos');
       Schema::enableForeignKeyConstraints();
    }
}
