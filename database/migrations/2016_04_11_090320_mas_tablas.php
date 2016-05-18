<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MasTablas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::create('categorias', function(Blueprint $table) {
            $table->increments('id');
            $table->string('NOM_CAT',100);
            $table->string('DES_CAT',100);
            $table->integer('ID_USU')->unsigned();
            $table->foreign('ID_USU')->references('id')->on('users');
            $table->timestamps();
        });
           Schema::create('articulos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('TIT_ART',100);
            $table->string('PRE_ART',100);
            $table->integer('ID_CAT')->unsigned();
            $table->foreign('ID_CAT')->references('id')->on('categorias');
            $table->integer('ID_USU')->unsigned();
            $table->foreign('ID_USU')->references('id')->on('users');
            $table->timestamps();
        });
           Schema::create('paquetes', function(Blueprint $table) {
            $table->increments('id');
            $table->string('NOM_PAQ',100);
            $table->string('DES_PAQ',100);
            $table->integer('ID_USU')->unsigned();
            $table->foreign('ID_USU')->references('id')->on('users');
            $table->timestamps();
        });
           Schema::create('empaquetados', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('ID_PAQ')->unsigned();
            $table->foreign('ID_PAQ')->references('id')->on('paquetes');
            $table->integer('ID_ART')->unsigned();
            $table->foreign('ID_ART')->references('id')->on('articulos');
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
        //
    }
}
