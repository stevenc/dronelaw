<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TermsOfUse extends Model
{
    public function company()
    {
    	return $this->hasOne('App\Company');
    }
}
