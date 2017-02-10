<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mela extends Model
{
    public function artist()
    {
    	$this->hasMany('artist');
    }
}
