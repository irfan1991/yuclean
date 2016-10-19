<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTableComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('comments',function(Blueprint $table){
           $table->increments('id');
           $table->unsignedInteger('event_id'); 
           $table->string('commenter');
           $table->string('email')->nullable();
           $table->text('comment');
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
        Schema::drop('comments');
    }
}
