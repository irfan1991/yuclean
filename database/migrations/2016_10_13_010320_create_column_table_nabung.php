<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnTableNabung extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nabungs', function (Blueprint $table) {
            $table->integer('sampah_id')->unsigned();
            $table->integer('share_id')->unsigned();
            $table->integer('invite_id')->unsigned();
            //$table->timestamps();

            //set PK
           // $table->primary(['sampah_id','share_id','invite_id']);

            //set FK sampah
            $table->foreign('sampah_id')
                ->references('id')
                ->on('sampahs')
                ->onDelete('cascade')
                ->onUpdate('cascade');

                //set FK share
            $table->foreign('share_id')
                ->references('id')
                ->on('shares')
                ->onDelete('cascade')
                ->onUpdate('cascade');

                //set FK invite
            $table->foreign('invite_id')
                ->references('id')
                ->on('invites')
                ->onDelete('cascade')
                ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('nabungs', function (Blueprint $table) {
        $table->dropColumn('share_id');
        $table->dropColumn('invite_id');
        $table->dropColumn('sampah_id');
 });
    }
}
