<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mela extends Model
{
	protected $fillable=['mela_name','mela_pic','mela_email','contact','village','taluk','district','PINCODE'];
    public function artist()
    {
    	$this->hasMany('artist');
    }
}
