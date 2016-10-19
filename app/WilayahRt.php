<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WilayahRt extends Model
{
    //
    protected $table = 'wilayahrts';
 protected $fillable = ['id','nama','rw_id'];

    public function rw()
    {
        return $this->belongsTo('App\WilayahRw');
    }
}
