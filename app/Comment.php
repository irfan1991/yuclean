<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
   	public $fillable = ['event_id','commenter','comment','email'];

   	public function event()
   	{
   		return $this->belongsTo('App\Event');
   	}

}
