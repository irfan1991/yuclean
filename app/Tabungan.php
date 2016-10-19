<?php

namespace App;
use Request;
use App\Sampah;
use Illuminate\Database\Eloquent\Model;

class Tabungan extends Model
{
   protected $table = 'nabungs';
    protected $fillable = [
        'nasabah_id', 'jumlah', 'jenis_transaksi','sampah_id','share_id','invite_id','saldo','operator'
    ];

    public function owner()
    {
    	return belongsTo('App\User');
    		    }

  	public function sampah()
  	{
  		return belongsTo('App\Sampah','sampah_id');
  	}

}
