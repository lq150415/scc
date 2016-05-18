<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlgunasTablas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('clientes', function(Blueprint $table) {
            $table->increments('id');
            $table->string('NOM_CLI',100);
            $table->string('APA_CLI',100);
            $table->string('AMA_CLI',100);
            $table->integer('TEL_CLI');
            $table->text('DIR_CLI');
            $table->string('EMA_CLI', 60);
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
