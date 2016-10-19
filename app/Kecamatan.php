<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    //
    protected $table = 'wilayah_kecamatans';
protected $fillable = ['id','nama','kabupaten_id'];
    public function desa()
    {
        return $this->hasMany('App\Desa');

            }

public function user()
    {
        return $this->hasMany('App\User','kecamatan');
    }

    public function rw(){
        return $this->hasMany('App\Kelurahan');
    }

    public function kabupaten()
    {
        return $this->belongsTo('App\Kabupaten');
    }
}
