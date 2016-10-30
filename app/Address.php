<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['address_1', 'address_2', 'city', 'company_state', 'desired_state', 'zip', 'preferred_email'];

    public function company()
    {
    	$this->hasOne('App\Company');
    }


}
