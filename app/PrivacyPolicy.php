<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivacyPolicy extends Model
{
    protected $lastStep = 6;
    
    public function company()
    {
    	return $this->hasOne('App\Company');
    }
}
