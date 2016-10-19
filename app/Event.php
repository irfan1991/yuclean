<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
 	protected $table = 'events';
   	public $fillable = ['judul','konten','image','tanggal','comment_count','read_more'];

   	public function comments()
   	{
   		return $this->hasMany('App\Comment');

    }

    public function delete()
    {
    	foreach ($this->comments as $comment ) {
    		# code...
    		$comment->delete();
    	}

    	return parent::delete();
    }


}