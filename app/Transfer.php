<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    
 	protected $table = 'tranfers';
    protected $fillable = [
        'id', 'bank', 'jumlah'
    ];

}
