<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $fillable = ['user_id', 'barang_id', 'quantity'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function regency()
    {
        return $this->belongsTo('App\Regency');
    }

}
