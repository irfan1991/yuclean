<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTarikDana extends Migration
{
   
    public function up()
    {
        Schema::create('tarikdanas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('transfer_id');
            $table->string('sembako_id');
            $table->string('pulsa_id');
            $table->timestamps();  
             });
    }

    public function down()
    {
        Schema::drop('tarikdanas');
    }
}
