<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Kabupaten;
use App\Tabungan;
use App\Sampah;
use App\ReferralProgram;
use App\ReferralLink;
use Request;
use App\Uuid;
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    use EntrustUserTrait;
    protected $fillable = [
    'id','name', 'email','username','propinsi','kabupaten','kelurahan','kecamatan','rt','rw','banksampah','alamat','image','pengepul','password', 'saldo_terakhir','api_token'];

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


  function sampah(){
    return $this->belongsTo('App\Sampah');
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

public function hasPassword()
    {
        return $this->password !== '';
    }

   public function addresses()
    {
        return $this->hasMany('App\Addres');
    }
    
    public function orders()
    {
        return $this->hasMany('App\Order');
    }

public function posts(){
        return $this->hasMany(Tabungan::class);
    }

    public function getReferrals()
{
    return ReferralProgram::all()->map(function ($program) {
        return ReferralLink::getReferral($this, $program);
    });
}

public function nabung(){
    return $this->hasMany('App\Tabungan');
}


}
