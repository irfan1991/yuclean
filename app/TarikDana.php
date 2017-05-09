<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TarikDana extends Model
{
    
 	protected $table = 'tarikdanas';
    protected $fillable = ['user_id','bank','jumlah'];


}
