<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WilayahRw extends Model
{
    //
    protected $table = 'wilayahrws';
    protected $fillable = ['id','nama','kecamatan_id'];

    public function rt(){
    	return $this->hasMany('App\WilayahRt');
    }

    public function kecamatan()
    {
        return $this->belongsTo('App\Kecamatan');
    }
}
