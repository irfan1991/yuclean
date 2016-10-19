<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30);
            $table->string('email')->nullable()->unique();
            $table->char('password',90);
            $table->string('username')->unique();
            $table->string('alamat',40);
            $table->integer('propinsi')->nullable();
            $table->integer('kabupaten')->nullable();
            $table->integer('kecamatan')->nullable();
            $table->string('kelurahan',20);
            $table->integer('rw')->nullable();
            $table->integer('rt')->nullable();
            $table->string('image',20)->nullable();   
            $table->string('banksampah',20)->nullable();
            $table->string('pengepul',30)->nullable();
            $table->integer('event');
            $table->integer('lokasi');
            $table->double('saldo_terakhir')->nullable();
            $table->integer('hargasampah');
            $table->rememberToken();
            $table->timestamps();

         /* $table->foreign('kabupaten')->references('id')->on('wilayah_kabupatens');
            $table->foreign('propinsi')->references('id')->on('wilayah_provinsis');
            $table->foreign('kecamatan')->references('id')->on('wilayah_kecamatans');
            $table->foreign('kelurahan')->references('id')->on('wilayah_kelurahans'); **/

        });
    }

    /**
     * Reverse the migrations.
     *
     
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
