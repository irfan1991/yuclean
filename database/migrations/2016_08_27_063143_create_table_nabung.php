<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNabung extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nabungs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nasabah_id');
            $table->integer('jumlah');
            $table->integer('saldo')->nullable();
            $table->integer('invite_id')->nullable();
            $table->string('operator',12)->nullable();
            $table->enum('jenis_transaksi',array('kredit','debet'));
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
        Schema::drop('nabungs');
    }
}
