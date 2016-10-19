<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    //
    protected $table = 'wilayah_kelurahans';
    protected $fillable = ['id','nama','kecamatan_id'];

    public function rw(){
    	return $this->hasMany('App\WilayahRw');
    }

     public function user()
    {
        return $this->belongsTo('App\User','kelurahan');
    }

    public function kecamatan()
    {
        return $this->belongsTo('App\Kecamatan');
    }
}
