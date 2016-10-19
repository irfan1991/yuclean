<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Kabupaten;
use App\Tabungan;
use Request;
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    use EntrustUserTrait;
    protected $fillable = [
    'id','name', 'email','username','propinsi','kabupaten','kelurahan','kecamatan','rt','rw','banksampah','alamat','image','pengepul','password', 'saldo_terakhir','api_token'
    ];

    protected $appends = ['photo_path'];

    public function getPhotoPathAttribute()
    {
        if ($this->image !== '') {
            return url('/images/user/' . $this->image);
        } else {
            return 'http://placehold.it/850x618';
        }
    }

  function transaksi(){
    return hasMany('App\Tabungan');
 }

 


    protected $hidden = [
        'password', 'remember_token',
    ];


public function saveData(Request $request){
$tabungan = Tabungan::all();
$harga = $request->jenis_sampah;
$tabungan->saldo = $harga;
$tabungan->save();
}



}
