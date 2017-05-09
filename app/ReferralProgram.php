<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReferralProgram extends Model
{
    //
	protected $table='referral_programs';
    protected $fillable = ['name', 'uri', 'lifetime_minutes'];
}
