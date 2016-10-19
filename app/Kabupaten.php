<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Kabupaten extends Model
{
    //
    protected $table = 'wilayah_kabupatens';
     protected $fillable = ['id','nama','provinsi_id'];
    public function kecamatan()
    {
        return $this->hasMany('App\Kecamatan');
    }

    
    public function provinsi()
    {
        return $this->belongsTo('App\Provinsi');
    }
}
