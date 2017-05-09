<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    protected $table = 'barangs';
    protected $fillable = ['names', 'photo', 'model', 'price', 'weight'];
}
