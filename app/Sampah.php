<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tabungan;
class Sampah extends Model
{
    //
	 protected $table = 'sampahs';
    protected $fillable = ['id','nama','satuan','harga','potongan','user_id'];

    public function nabung()
    {
    	return hasMany('App\Tabungan','sampah_id');
    }

}
