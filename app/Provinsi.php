<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Provinsi;
class Provinsi extends Model
{
    //
    protected $table = 'wilayah_provinsis';
	protected $fillable = ['id','nama','kabupaten_id','user_id'];
    public function kabupaten()
    {
        return $this->hasMany('App\Kabupaten');
    }
 public function user()
    {
        return $this->hasMany('App\User','propinsi');
    }
    public function provinsi()
    {
        return $this->belongsTo('App\Provinsi');
    }
}
