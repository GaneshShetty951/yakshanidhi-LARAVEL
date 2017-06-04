<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mela extends Model
{
	protected $table="melas";
	protected $fillable=['mela_name','mela_pic','mela_email','contact','village','taluk','district','PINCODE'];
    public function Artist()
    {
    	$this->hasMany('App\Artist');
    }
    public function Show()
    {
    	$this->hasMany('App\Show','mela_id','mela_id');
    }
}
