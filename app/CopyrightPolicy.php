<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CopyrightPolicy extends Model
{
	protected $fillable = ['is_own_dmca', 'completed'];

    public function company()
    {
    	return $this->hasOne('App\Company');
    }
}
