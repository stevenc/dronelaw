<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'domain', 'abbreviation', 'completed'];

    public function user()
    {
    	return $this->hasOne('App\User');
    }

    public function address()
    {
        return $this->hasOne('App\Address');
    }

    public function copyrightPolicy()
    {
    	return $this->hasOne('App\CopyrightPolicy');
    }

    public function privacyPolicy()
    {
    	return $this->hasOne('App\PrivacyPolicy');
    }

    public function termsOfUse()
    {
    	return $this->hasOne('App\TermsOfUse');
    }

}
